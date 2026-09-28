<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ $article->title }}</title>
</head>
<body>
    <h1>{{ $article->title }}</h1>

    <p>{{ $article->description }}</p>

    <p>
        На сайте опубликована новая статья.
    </p>

    <p>
        <a href="{{ route('articles.show', $article) }}">
            Читать статью
        </a>
    </p>
</body>
</html>