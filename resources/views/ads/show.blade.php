@extends('layouts.app_two_column')

@section('content')
    <div class="d-flex">
        <div class="col-8">
            <bread-crumbs
                v-bind:crumbs="{{ json_encode([ ['name' => 'Ads' , 'link' => '/ads', 'active' => false], ['name' =>  $ad->name, 'link' => '', 'active' => true] ]) }}"
            >
            </bread-crumbs>

            <p style="color: #ff0000; ">{{ $ad->start_date_time }} - {{ $ad->start_date_time }}</p>

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

            <div class="mt-5 col-6">
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
                            <div class="m-2">
                                <input type="hidden" name="reply_to_id" value="{{$comment->id}}">
                                <input type="text" class="form-control" name="body">
                            </div>
                            <button type="submit" class="btn btn-primary">reply</button>
                        </form>
                    @empty
                    @endforelse
                </ul>

                <form method="POST" action="{{$ad->path()}}/comments">
                    @csrf
                    <div class="form-group">
                        <label for="body">Write a comment...</label>
                        <input type="text" class="form-control" name="body">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="col-4">
            <google-map
                v-bind:ad="{{ json_encode($ad) }}"
            >
            </google-map>
        </div>
    </div>

@endsection
