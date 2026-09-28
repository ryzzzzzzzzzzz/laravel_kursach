@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')
    <section class="content-section">
        <p class="section-label">Пользователь</p>

        <h1>Авторизация</h1>

        @if (session('success'))
            <p class="success-message">
                {{ session('success') }}
            </p>
        @endif

        <form
            action="{{ route('login') }}"
            method="POST"
            class="auth-form"
        >
            @csrf

            <div class="form-field">
                <label for="email">Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                >

                @error('email')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-field">
                <label for="password">Пароль</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                >

                @error('password')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="form-button">
                Войти
            </button>
        </form>
    </section>
@endsection