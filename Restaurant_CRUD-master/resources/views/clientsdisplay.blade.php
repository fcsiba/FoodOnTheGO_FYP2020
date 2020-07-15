@extends('layouts.app')


@section('content')
    @if(\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
    @endif
<div class="container">
<br /> <br />
    <table class="table table-striped">
        <thead>
            <tr>
              <td>Name</td>
              <td>Email</td>
              <td>Contact Number</td>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{$client->name}}</td>
                <td>{{$client->email}}</td>
                <td>{{$client->contact}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endsection