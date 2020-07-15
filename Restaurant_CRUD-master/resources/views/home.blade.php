@extends('layouts.app')

@section('content')
    @if(\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
    @endif
   
    <a href="{{url('/menus')}}" class="btn btn-topleft">Menu</a>      
    <a href="{{url('/categories')}}" class="btn btn-topright">Category</a>
    <button class="btn btn-downleft">Orders</button>
    <a href="{{url('/clients')}}" class="btn btn-downright">Users</a>
<style>
.btn-topleft {
    background-color: pink;
    padding: 50px 50px;
    font-size: 20px;
    border-radius: 50px;
    position: absolute;
    top: 150px;
    left: 500px;
}
.btn-topright {
    background-color: pink;
    padding: 50px 50px;
    font-size: 20px;
    border-radius: 50px;
    position: absolute;
    top: 150px;
    right: 500px;
}
.btn-downleft {
    background-color: pink;
    padding: 50px 50px;
    font-size: 20px;
    border-radius: 50px;
    position: absolute;
    bottom: 200px;
    left: 500px;
}
.btn-downright {
    background-color: pink;
    padding: 50px 50px;
    font-size: 20px;
    border-radius: 50px;
    position: absolute;
    bottom: 200px;
    right: 500px;
}
</style>
@endsection