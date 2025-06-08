@extends('layouts.main')

@section('content')
    @php /** @var \App\Models\BlogPost $item */ @endphp
    <div class="container">
        @include('blog.admin.posts.includes.result_messages')

        @if ($item->exists)
            <form method="POST" action="{{ route('blog.admin.posts.update', $item->id) }}">
                @method('PATCH')
                @else
                    <form method="POST" action="{{ route('blog.admin.posts.store') }}">
                        @endif
                        @csrf

                        {{-- Головна частина форми --}}
                        <div class="mb-4">
                            @include('blog.admin.posts.includes.post_edit_main_col')
                        </div>

                        {{-- Додаткові параметри --}}
                        <div class="mb-4">
                            @include('blog.admin.posts.includes.post_edit_add_col')
                        </div>
                    </form>

                    {{-- Форма видалення --}}
                    @if ($item->exists)
                        <form method="POST" action="{{ route('blog.admin.posts.destroy', $item->id) }}">
                            @method('DELETE')
                            @csrf
                            <div class="mb-4">
                                <button type="submit" class="btn btn-danger">Видалити</button>
                            </div>
                        </form>
        @endif
    </div>
@endsection
