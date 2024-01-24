<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('bootstrap.css') }}">
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">微博</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link 
              @if(request()->routeIs('home')) active @endif" 
              href="{{ route('home') }}">
              首页
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link 
              @if(request()->routeIs('micro-blogs.index')) active @endif" 
              href="{{ route('micro-blogs.index') }}">
              列表
            </a>
          </li>
        </ul>

        <ul class="navbar-nav mb-2 mb-lg-0">
          @guest
            <li class="nav-item">
              <a class="nav-link 
                @if(request()->routeIs('users.login')) active @endif" 
                href="{{ route('users.login') }}">
                登录
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link 
                @if(request()->routeIs('users.create')) active @endif" 
                href="{{ route('users.create') }}">
                注册
              </a>
            </li>
          @endguest

          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('users.show', Auth::user()) }}">个人主页</a></li>
                <li><a class="dropdown-item" href="{{ route('users.edit', Auth::user()) }}">修改资料</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <a class="dropdown-item" href="javascript:;" onclick="
                    if(confirm('确认登出？')) {
                      document.getElementById('logoutForm').submit();
                    }
                    return false;
                    ">登出</a>
                  <form method="post" id="logoutForm" action="{{ route('users.logout') }}" class="d-none">
                    @csrf
                    @method('delete')
                  </form>
                </li>
              </ul>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>

  <div class="container my-4">
    @include('layouts.message')

    @yield('content')
  </div>

  <script src="{{ asset('bootstrap.bundle.js') }}"></script>
</body>
</html>