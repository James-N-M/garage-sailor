@extends('layouts.app')

@section('content')
    <h1>Ad Detail Page</h1>
    Name: {{ $ad->name }}
    Description: {{ $ad->description }}

    <a href="/ads">Back to ads</a>

    <h2>Ad Comments</h2>
    <form method="POST" action="{{$ad->path()}}/comments">
        @csrf
        <div class="form-group">
            <label for="body">body</label>
            <input type="text" class="form-control" name="body">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <ul>
        @forelse ($ad->comments as $comment)
            <li>{{ $comment->body }}</li>
            <ul>
                @forelse ($comment->replies as $reply)
                <li>{{$reply->body}}</li>
                @empty
                    <p>No comment replies yet.</p>
                @endforelse
            </ul>
            <form method="POST" action="{{$ad->path()}}/comments">
                @csrf
                <div>
                    <label for="body">reply to comment</label>
                    <input type="hidden" name="reply_to_id" value="{{$comment->id}}">
                    <input type="text" class="form-control" name="body">
                </div>
                <button type="submit" class="btn btn-primary">reply</button>
            </form>
        @empty
            <p>No Comments yet.</p>
        @endforelse
    </ul>

@endsection
