@extends('layouts.app')

@section('title', 'Контакты')

@section('content')
    <section class="content-section">
        <p class="section-label">Связь</p>

        <h1>Контакты</h1>

        <div class="contacts-list">
            @foreach ($contacts as $contact)
                <div class="contact-item">
                    <h2>{{ $contact['title'] }}</h2>
                    <p>{{ $contact['value'] }}</p>
                </div>
            @endforeach
        </div>
    </section>
@endsection