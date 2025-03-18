@extends('base')

@section('title', 'Details de : ' . $post->title)

@section('content')

    <div class="bg-body-tertiary p-4 rounded">
        <h1>Details liés à un article</h1>
        <p class="lead">Dans cette partie vous retrouverez tous les détails liées à un
            <a href="{{ route('blog.index') }}" class="font-weight-bolder text-primary">article</a>.
        </p>
        {{-- <a class="btn btn-sm btn-primary" href="/docs/5.3/components/navbar/" role="button">Les articles</a> --}}
    </div>


    <hr class="border-top border-default">


    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card rounded-1">
                <div class="card-header">
                    <h4 class="card-title">{{ $post->title }}</h4>
                </div>
                <div class="card-body">
                    <p>{{ $post->content }}</p>

                    <a href="{{ route('blog.index') }}" class="btn btn-sm btn-outline-primary">Retour à l'accueil</a>
                </div>
            </div>
        </div>
    </div>
@endsection
