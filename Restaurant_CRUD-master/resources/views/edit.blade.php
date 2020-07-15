@extends('layouts.app')

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
    <div class="row">
    <form method="post" action="{{action('MenuController@update', $id)}}" >
        {{csrf_field()}}
        <input name="_method" type="hidden" value="POST">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="name">Name :</label>
            <input type="text" value='{{$menu->name}}' class="form-control" name="name"/>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" value='{{$menu->price}}' class="form-control" name="price"/>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection