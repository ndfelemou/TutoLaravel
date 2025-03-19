@extends('base')
@section('title', 'Modifié un article')
@section('content')

    {{-- formulaire --}}
    <div class="row mt-2">
        <div class="col-md-3"></div>
        <div class="card col-md-6">

            <div class="card-header">
                <h4 class="card-title text-center text-uppercase mt-2 mb-1 "><strong>@yield('title')</strong></h4>
            </div>
            <div class="card-body">
                <form action="" method="post" class="form-group">
                    @csrf
                    @method($post->id ? 'PATCH' : 'POST')

                    {{-- Titre --}}
                    <div class="col-md-12 mt-2 form-group">
                        <label for="title"><strong>Titre</strong></label>
                        <input type="text" name="title" id="title" class="form-control rounded-0"
                            value="{{ old('title', $post->title) }}">

                        @error('title')
                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                        @enderror
                    </div>

                    {{-- Slug --}}
                    <div class="col-md-12 mt-2 ">
                        <label for="slug"><strong>Slug</strong></label>
                        <input type="text" name="slug" id="slug" class="form-control rounded-0"
                            value="{{ old('slug', $post->slug) }}">

                        @error('slug')
                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                        @enderror
                    </div>

                    {{-- Categories --}}
                    <div class="col-md-12 mt-2">
                        <label for="category"><strong>Catégorie</strong></label>
                        <select name="category_id" id="category" class="form-control rounded-0">
                            <option value="">Sélectionner une catégorie</option>
                            @foreach ($categories as $category)
                                <option @selected(old('category_id', $post->category_id) == $category->id) value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                        @enderror
                    </div>

                    @php
                        $tagsIds = $post->tags()->pluck('id');
                    @endphp

                    {{-- Tags --}}
                    <div class="col-md-12 mt-2">
                        <label for="tag"><strong>Tags</strong></label>
                        <select name="tags[]" id="tag" class="form-control rounded-0" multiple>
                            @foreach ($tags as $tag)
                                <option @selected($tagsIds->contains($tag->id) ) value="{{ $tag->id }}">
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('tags')
                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                        @enderror
                    </div>

                    {{-- Contenue --}}
                    <div class="col-md-12 mt-2 form-group">
                        <label for="content"><strong>Contenu</strong></label>
                        <textarea name="content" id="content" rows="5"class="form-control resize-none rounded-0"
                            style="resize: none !important">{{ old('content', $post->content) }}</textarea>

                        @error('content')
                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                        @enderror
                    </div>

                    {{-- Bouttons --}}
                    <div class="col-md-12 mt-2 form-group">
                        <button type="submit" class="btn btn-outline-primary form-control rounded-0">
                            @if ($post->id)
                                <i class="bi bi-pencil-fill"></i> Modifier l'article
                            @else
                                <i class="bi bi-save"></i> Enregistrer l'article
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
