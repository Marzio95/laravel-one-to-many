@extends('admin.templates.base')
@section('pageTitle')
    Posts
@endsection

@section('pageMain')

    <body>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Text</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->postText }}</td>
                        <td><a href="{{ route('admin.posts.show', $post->slug) }}">Post</a></td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <div class="text-center d-flex justify-content-center mt-4">
            {{ $posts->links() }}
        </div>

    </body>

    </html>
@endsection
