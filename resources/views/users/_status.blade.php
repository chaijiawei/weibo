<div class="row text-center">
    <div class="col-md-4">
        <a href="{{ route('users.show', $user) }}" class="text-body text-decoration-none">
            <h3>{{ $user->microBlogs()->count() }}</h3>
            微博
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('users.followings', $user) }}" class="text-body text-decoration-none">
            <h3>{{ $user->followings()->count() }}</h3>
            关注
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('users.followers', $user) }}" class="text-body text-decoration-none">
            <h3>{{ $user->followers()->count() }}</h3>
            粉丝
        </a>
    </div>
</div>
