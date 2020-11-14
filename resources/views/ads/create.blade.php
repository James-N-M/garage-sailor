@extends('layouts.app')

@section('content')
    <bread-crumbs
        v-bind:crumbs="{{ json_encode([ ['name' => 'Ads' , 'link' => '/ads', 'active' => false], ['name' => 'Create Ad' , 'link' => '', 'active' => true] ]) }}"
    >
    </bread-crumbs>

    <form method="POST" action="/ads" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Ad Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">description</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="description">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">start_date_time</label>
            <input type="datetime-local" class="form-control" id="exampleInputPassword1" name="start_date_time">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">end_date_time</label>
            <input type="datetime-local" class="form-control" id="exampleInputPassword1" name="end_date_time">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">address</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="address">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Image</label>
            <input type="file" class="form-control" id="exampleInputPassword1" name="image">
        </div>

        <create-items></create-items>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
