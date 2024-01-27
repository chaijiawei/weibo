<li class="list-group-item">
  {{ $microBlog->content }}
  <small class="ms-2 text-secondary">
    <span class="me-2">
      作者：
      <a class="text-decoration-none text-secondary" href="{{ route('users.show', $microBlog->user) }}">
        {{ $microBlog->user->name}}
      </a>
    </span>
    <span class="me-2">
      发布时间：
      {{ $microBlog->created_at->diffForHumans() }}
    </span>
    @can('delete', $microBlog)
      <form onsubmit="if(!confirm('确认删除')) return false;" class="float-end" action="{{ route('micro-blogs.destroy', $microBlog) }}" method="post">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-sm btn-danger">删除</button>
      </form>
    @endcan
  </small>
</li>