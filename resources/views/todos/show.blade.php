@extends('layouts.app')

@section('title')

    Single Todo: {{$todo->name}}

@endsection('title')

@section('content')

    <h1 class="text-center my-5"> {{$todo->name}} </h1>

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card card-deault">
                <div class="card-header">
                    Details
                </div>
                <div class="card-body">
                    {{$todo->description}}
                </div>
            </div>

            <a href="/todos/{{$todo->id}}/edit" class="btn btn-info my-2">Edit</a>
            <a href="/todos/{{$todo->id}}/delete" class="btn btn-danger my-2">Delete</a>

        </div>
    </div>
    
@endsection('content')