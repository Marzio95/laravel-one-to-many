@extends('admin.templates.base')
@section('pageTitle', $post->title)

@section('pageMain')
    <div class="d-flex justify-content-center align-items-center flex-column">
        <div class="card m-5" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text mb-3">{{ $post->postText }}.</p>
                <h5 class="card-title">{{ $post->user->name }}</h5>
                {{-- <h5 class="card-title">{{ $post->user->userInfo->phone_number }}</h5> --}}

                @if (Auth::user()->id === $post->user_id)
                    <a class="tasto_show bg-green mt-3" href="{{ route('admin.posts.edit', $post->slug) }}">Modifica
                        Post</a>
                @endif

                @if (Auth::user()->id === $post->user_id)
                    <button data-id="{{ $post->slug }}" onclick="event.stopPropagation()"
                        class="btn-delete bg-danger text-white p-1 mt-4">ELIMINA POST</button>
                @endif
            </div>
        </div>

        <div class="d-flex">
            <div class="m-5">
                <a class="text-white bg-black p-2" href="{{ url()->previous() }}">Torna indietro</a>
            </div>
            <div class="m-5">
                <a class="text-white bg-black p-2" href="{{ route('admin.posts.index', 'PostController') }}">Torna alla
                    lista</a>
            </div>
        </div>

        <section id="confirmation-overlay" class="overlay d-none">
            <div class="popup">
                <h2>Se continui l'elemento verrà eliminato</h2>
                <div class="d-flex justify-content-evenly mt-5">
                    <form method="POST" data-base="{{ route('admin.posts.index') }}">
                        @csrf
                        @method('DELETE')
                        <button onclick="event.stopPropagation()" class="bg-danger text-white p-2 ">ELIMINA
                            POST</button>
                    </form>
                    <button id="btn-no" class="btn bg-primary">NO</button>
                </div>
            </div>

        </section>


    </div>
@endsection
