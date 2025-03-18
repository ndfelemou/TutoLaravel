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

                    <div class="col-md-12 mt-2 form-group">
                        <label for="title"><strong>Titre</strong></label>
                        <input type="text" name="title" id="title" class="form-control rounded-0"
                            value="{{ old('title', $post->title) }}">
                        @error('title')
                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                        @enderror
                    </div>

                    <div class="col-md-12 mt-2 form-group">
                        <label for="slug"><strong>Slug</strong></label>
                        <input type="text" name="slug" id="slug" class="form-control rounded-0"
                            value="{{ old('slug', $post->slug) }}">
                        @error('slug')
                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                        @enderror
                    </div>

                    <div class="col-md-12 mt-2 form-group">
                        <label for="content"><strong>Contenu</strong></label>
                        <textarea name="content" id="content" rows="5"class="form-control resize-none rounded-0"
                            style="resize: none !important">{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                        @enderror
                    </div>

                    <div class="col-md-12 mt-2 form-group">
                        <button type="submit" class="btn btn-outline-primary form-control rounded-0">
                            @if ($post->id)
                                Modifier l'article
                            @else
                                Enregistrer l'article
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
