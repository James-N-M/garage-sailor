@extends('layouts.app')

@section('content')
    <bread-crumbs
        v-bind:crumbs="{{ json_encode([ ['name' => 'Ads' , 'link' => '/ads', 'active' => false], ['name' =>  $ad->name, 'link' => '', 'active' => true] ]) }}"
    >
    </bread-crumbs>

    <p style="color: red; ">OCT 30 AT 7 PM EDT – NOV 1 AT 10 PM EDT</p>

    <h1>{{ $ad->name }}</h1>

    <p>{{ $ad->address }}</p>

    <hr>

    <h2>Items</h2>

    <ul>
        @forelse($ad->items as $item)
            <li><a href="{{$item->path()}}">{{ $item->name }}</a></li>
        @empty
            <p>No Items listed</p>
        @endforelse
    </ul>

    <p>
        {{ $ad->description }}
    </p>

    <button class="btn btn-success">Add to planner</button>


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
