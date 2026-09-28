@extends('layouts.app')

@section('title', 'Редактирование статьи')

@section('content')
    <section class="content-section">
        <p class="section-label">Статьи</p>

        <h1>Редактирование статьи</h1>

        <form
            action="{{ route('articles.update', $article) }}"
            method="POST"
            class="auth-form"
        >
            @method('PUT')

            @include('articles._form', [
                'buttonText' => 'Сохранить изменения',
            ])
        </form>
    </section>
@endsection