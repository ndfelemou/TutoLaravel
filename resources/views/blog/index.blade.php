@extends('base')

@section('title', 'Accueil du blog')

@section('content')

    <div class="bg-body-tertiary p-4 rounded">
        <h1>Mon Blog</h1>
        <p class="lead">Dans cette partie vous retrouverez tous les articles liées à notre
            <a href="{{ route('blog.index') }}" class="link font-weight-bolder text-primary">Blog</a>.
        </p>
        {{-- <a class="btn btn-sm btn-primary" href="/docs/5.3/components/navbar/" role="button">Les articles</a> --}}
    </div>


    <hr class="border-top border-default">

    <div class="row mt-3">

        @foreach ($posts as $post)
            <!-- Début de la carte -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <!-- Titre de l'article -->
                        <h5 class="card-title">{{ $post->title }}</h5>

                        <!-- Séparateur -->
                        <hr class="border border-dark">

                        <!-- Contenu de l'article -->
                        <p class="card-text">{{ $post->content }}</p>

                        <!-- Catégorie -->
                        <p class="card-text">
                            @if ($post->category)
                                <small class="text-muted fst-italic">
                                    <strong class="fw-bold"><i class="bi bi-bookmarks-fill"></i> Catégorie : </strong>
                                    {{ $post->category?->name }}
                                </small>
                            @endif
                        </p>

                        <!-- Tags -->
                        <p class="card-text">
                            @if (!$post->tags->isEmpty())
                                <small class="text-muted fst-italic">
                                    <strong class="fw-bold"><i class="bi bi-tags-fill"></i> Tags : </strong>
                                    <!-- Boucle pour afficher les tags dynamiquement -->
                                    @foreach ($post->tags as $tag)
                                        <span class="badge rounded-pill text-bg-primary">#{{ $tag->name }}</span>
                                    @endforeach
                                </small>
                            @endif
                        </p>

                        <!-- Date de création -->
                        <p class="card-text">
                            <small class="text-muted fst-italic">
                                <strong class="fw-bold"><i class="bi bi-calendar-date-fill"></i> Date de création :
                                </strong> 19 mars 2025
                            </small>
                        </p>

                        <!-- Auteur -->
                        <p class="card-text">
                            <small class="text-muted fst-italic">
                                <strong class="fw-bold"><i class="bi bi-person-check-fill"></i> Auteur : </strong>
                                Nyankoye Daniel FELEMOU (Rédacteur en chef)
                            </small>
                        </p>

                        <!-- Bouton "Lire la suite" -->
                        <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}"
                            class="btn btn-sm btn-outline-primary">
                            Lire la suite <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Fin de la carte -->
        @endforeach
        <div class="col-sm-12 mt-3 mb-3">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
