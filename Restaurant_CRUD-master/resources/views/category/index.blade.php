@extends('layouts.app')

@section('content')
    @if(\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
    @endif
<div class="container">
<a href="{{url('/create/category')}}" class="btn btn-success">Add Category</a>
<br /> <br />
    <table class="table table-striped">
        <thead>
            <tr>
              <td>Category</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->category_name}}</td>
                <td><a href="{{action('CategoryController@edit',$category->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{action('CategoryController@destroy', $category->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endsection