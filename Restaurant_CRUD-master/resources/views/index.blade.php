@extends('layouts.app')


@section('content')
    @if(\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
    @endif
<div class="container">

<br /> <br />
   
@foreach($categories as $category)
    <table class="table table-striped">
    <thead>{{$category->category_name}}</thead>
    <a href="{{action('MenuController@create',$category->id)}}" class="btn btn-success float-right">Add Item</a>
            <tr>
              <td>Item </td>
              <td>Price</td>
              <td colspan="2">Action</td>
            </tr>
        <tbody>
        @foreach($category->menus as $menu)
            <tr>
                <td>{{$menu->name}}</td>
                <td>{{$menu->price}}</td>
                <td><a href="{{action('MenuController@edit',$menu->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{action('MenuController@destroy', $menu->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br /> <br />
    @endforeach
<div>
@endsection
