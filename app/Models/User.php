<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function microBlogs()
    {
        return $this->hasMany(MicroBlog::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    public function follow($userId)
    {
        return $this->followings()->syncWithoutDetaching($userId);
    }

    public function unfollow($userId)
    {
        return $this->followings()->detach($userId);
    }

    public function isFollow($userId)
    {
        if($userId instanceof \Illuminate\Database\Eloquent\Model) {
            $userId = $userId->getKey();
        }
        return $this->followings()->where('user_id', $userId)->exists();
    }

    public function feed()
    {
        $followingIds = $this->followings->modelKeys();
        $userIds = array_merge([$this->id], $followingIds);
        $microBlogs = MicroBlog::query()->whereIn('user_id', $userIds)->latest()->paginate();
        return $microBlogs;
    }
}
