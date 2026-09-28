@extends('layouts.app')

@section('title', 'Добавление статьи')

@section('content')
    <section class="content-section">
        <p class="section-label">Статьи</p>

        <h1>Добавление статьи</h1>

        <form
            action="{{ route('articles.store') }}"
            method="POST"
            class="auth-form"
        >
            @include('articles._form', [
                'buttonText' => 'Создать статью',
            ])
        </form>
    </section>
@endsection