@csrf

<div class="form-field">
    <label for="title">Заголовок</label>

    <input
        type="text"
        id="title"
        name="title"
        value="{{ old('title', $article->title ?? '') }}"
    >

    @error('title')
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>

<div class="form-field">
    <label for="description">Описание</label>

    <textarea
        id="description"
        name="description"
        rows="4"
    >{{ old('description', $article->description ?? '') }}</textarea>

    @error('description')
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>

<div class="form-field">
    <label for="content">Содержание</label>

    <textarea
        id="content"
        name="content"
        rows="10"
    >{{ old('content', $article->content ?? '') }}</textarea>

    @error('content')
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>

<div class="form-field">
    <label for="image">Изображение</label>

    <input
        type="text"
        id="image"
        name="image"
        value="{{ old('image', $article->image ?? '') }}"
    >

    @error('image')
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>

<button type="submit" class="form-button">
    {{ $buttonText }}
</button>