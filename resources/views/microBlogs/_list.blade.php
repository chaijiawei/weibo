@if(count($microBlogs) > 0)
    <ul class="list-unstyled">
        @foreach($microBlogs as $microBlog)
            <li class="media my-4">
                <div class="media-body">
                    <h6>
                        <a href="{{ route('users.show', $microBlog->user) }}">
                            {{ $microBlog->user->name }}
                        </a>
                        /
                        <span title="{{ $microBlog->created_at }}">
                            {{ $microBlog->created_at->diffForHumans() }}
                        </span>
                    </h6>
                    {{ $microBlog->content }}
                </div>
                @can('destroy', $microBlog)
                    <form action="{{ route('microBlogs.destroy', $microBlog) }}" method="post" onsubmit="return confirm('确认删除？')">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm">删除</button>
                    </form>
                @endcan
            </li>
        @endforeach
        <div class="my-4">
            {{ $microBlogs->links() }}
        </div>
    </ul>
@else
    <div class="my-4">
        暂无数据～。。。
    </div>
@endif
