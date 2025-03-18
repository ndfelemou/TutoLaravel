@extends('base')

@section('title', 'Accueil du blog')

@section('content')

    <div class="bg-body-tertiary p-4 rounded">
        <h1>Mon Blog</h1>
        <p class="lead">Dans cette partie vous retrouverez tous les articles liées à notre
            <span class="font-weight-bolder text-primary">Blog</span>.
        </p>
        {{-- <a class="btn btn-sm btn-primary" href="/docs/5.3/components/navbar/" role="button">Les articles</a> --}}
    </div>


    <hr class="border-top border-default">

    <div class="row mt-3">

        @foreach ($posts as $post)
            <div class="col-md-4 col-sm-12 col-lg-3 mt-2">
                <div class="card rounded-1">
                    <div class="card-header">
                        <h5 class="card-title">{{ $post->title }}</h5>
                    </div>
                    <div class="card-body">
                        <p>{{ $post->content }}</p>

                        <a href="{{ route('blog.show', ['slug' => $post->slug, 'id' => $post->id]) }}"
                            class="btn btn-sm btn-outline-primary">Lire la suite</a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-sm-12 mt-3 mb-3">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
