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

    <form method="post" action="{{action('MenuController@store', $category_id)}}" >
        {{csrf_field()}}
        <input name="_method" type="hidden" value="POST">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="name">Name :</label>
            <input type="text" class="form-control" name="name"/>
        </div>
        <div class="form-group">
            <label for="price">Price :</label>
            <input type="number" class="form-control" name="price"/>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection
