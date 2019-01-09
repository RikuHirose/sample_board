@extends('layouts.app')

@section('content')
<div class="card-header">Board</div>
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <h5 class="card-title">
                カテゴリー:{{ $post->category->category_name }}
            </h5>
            <h5 class="card-title">
                投稿者:{{ $post->user->name }}
            </h5>
            <p class="card-text">{{ $post->content }}</p>
            <img src="{{ asset('storage/image/'.$post->image) }}">
          </div>
        </div>

       <div class="p-3">
        <h3 class="card-title">コメント一覧</h3>
        @foreach($post->comments as $comment)
            <div class="card">
                <div class="card-body">
                    <p class="card-text">{{ $comment->comment }}</p>
                    <p class="card-text">
                        投稿者:
                        <a href="{{ route('users.show', $comment->user->id) }}">
                            {{ $comment->user->name }}
                        </a>
                    </p>
                </div>
            </div>
        @endforeach
        <a href="{{ route('comments.create', ['post_id' => $post->id]) }}" class="btn btn-primary">コメントする</a>
    </div>
</div>
@endsection
