@extends('layouts.app')

@section('content')
    <h1>Create Ad</h1>

    <form method="POST" action="/ads">
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
            <label for="exampleInputPassword1">item name</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="items[0][name]">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
