@if(Auth::user()->isFollow($user))
    <form action="{{ route('followers.destroy', $user) }}" method="post">
        @csrf
        @method('delete')

        <button class="btn btn-outline-primary btn-lg">取消关注</button>
    </form>
@else
    <form action="{{ route('followers.store') }}" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <button class="btn btn-primary btn-lg">关注</button>
    </form>
@endif
