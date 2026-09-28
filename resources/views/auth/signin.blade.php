@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <section class="content-section">
        <p class="section-label">Пользователь</p>

        <h1>Регистрация</h1>

        <form
            action="{{ route('signin') }}"
            method="POST"
            class="auth-form"
        >
            @csrf

            <div class="form-field">
                <label for="name">Имя</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required
                >

                @error('name')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

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
                Зарегистрироваться
            </button>
        </form>
    </section>
@endsection