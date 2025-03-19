@extends('base')

@section('title', 'Details de : ' . $post->title)

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- Titre de l'article -->
            <h1 class="display-4">{{ $post->title }}</h1>

            <!-- Informations sur l'article -->
            <div class="text-muted mb-4">
                <small class="fst-italic">
                    <i class="bi bi-calendar-date-fill"></i> Publié le : {{ $post->created_at->format('d/m/Y') }}
                </small>
                <span class="mx-2">|</span>
                <small class="fst-italic">
                    <i class="bi bi-person-check-fill"></i> Auteur : Nyankoye Daniel FELEMOU (Rédacteur en chef)
                </small>
                <span class="mx-2">|</span>
                <small class="fst-italic">
                    <i class="bi bi-bookmarks-fill"></i> Catégorie : {{ $post->category->name }}
                </small>
            </div>

            <!-- Image de l'article (optionnelle) -->
            {{-- @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid mb-4">
            @endif --}}

            <!-- Contenu de l'article -->
            <div class="card-text">
                {!! nl2br(e($post->content)) !!}
            </div>

            <!-- Tags de l'article -->
            <div class="mt-4">
                @if (!$post->tags->isEmpty())
                    <small class="fst-italic">
                        <i class="bi bi-tags-fill"></i> Tags :
                        @foreach ($post->tags as $tag)
                            <span class="badge rounded-pill text-bg-primary">#{{ $tag->name }}</span>
                        @endforeach
                    </small>
                @endif
            </div>

            <!-- Bouton de retour et Modification -->
            <div class="mt-4">
                <a href="{{ route('blog.index') }}" class="btn btn-sm btn-outline-primary rounded-1">
                    <i class="bi bi-arrow-left"></i> Retour à la liste des articles
                </a>

                {{--  --}}
                <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-sm btn-success rounded-1">
                    <i class="bi bi-pencil"></i> Modifier
                </a>
            </div>
        </div>
    </div>
@endsection
