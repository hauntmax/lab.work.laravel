<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Max lab works')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
</head>

<body>

<header>
    <div id="date"></div>
    <div id="authorization">
        @guest
            <a class="btn btn-primary" href="{{route('login')}}">Войти</a>
            <a class="btn btn-primary" href="{{route('register')}}">Зарегистрироваться</a>
        @else
            <a class="btn btn-secondary" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                {{ __('Выход') }}
            </a>
            @if(Auth::user()->hasRole('admin'))
                <a class="btn btn-primary" href="{{route('admin')}}">Администратор</a>
            @endif
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
    </div>
</header>

<section id="main_block">
    <nav>
        <div class="logo"><a href="{{route('main')}}">MAX</a></div>
        <ul class="menu">
            <li class="menu_item">
                <a href="{{route('main')}}" class="menu_link">Главная</a>
            </li>
            <li class="menu_item">
                <a href="{{route('guestBook')}}" class="menu_link">Гостевая книга</a>
            </li>
            <li class="menu_item">
            <a href="{{route('blog')}}" class="menu_link">Мой блог</a>
            </li>
        </ul>
    </nav>


    @yield('content')
</section>


<script type="text/javascript" src="{{asset('js/Date.js')}}"></script>
</body>
</html>