<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') — News Site</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="site-header">
        <div class="container header-inner">
            <a href="{{ route('home') }}" class="site-logo">
                News Site
            </a>

            <nav class="site-nav">
                <a href="{{ route('home') }}">Главная</a>
                <a href="{{ route('about') }}">О нас</a>
                <a href="{{ route('contacts') }}">Контакты</a>
                <a href="{{ route('articles.index') }}">Новости из БД</a>

                @guest
                    <a href="{{ route('signin') }}">Регистрация</a>
                    <a href="{{ route('login') }}">Войти</a>
                @endguest

                @can('moderator')
                    <a href="{{ route('moderation.comments') }}">
                        Модерация
                    </a>
                @endcan

                @auth
                    <form
                        action="{{ route('logout') }}"
                        method="POST"
                        class="logout-form"
                    >
                        @csrf

                        <button type="submit" class="logout-button">
                            Выйти
                        </button>
                    </form>
                @endauth
            </nav>
        </div>
    </header>

    <main class="site-main">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>Князевская, гр 243-321</p>
        </div>
    </footer>
</body>
</html>