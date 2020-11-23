@extends('layouts.app')

@section('title')
    Todo: {{ $todo->name }}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default my-5">
                <div class="card-header text-center">
                    {{ $todo->name }}
                </div>
                <div class="card-body text-justify">
                    {{ $todo->description }}
                </div>

                <div class="card-footer">

                        Completed: @if ($todo->completed != false)
                            <i class="fas fa-check-circle"></i>
                        @else
                            <i class="fas fa-times-circle"></i>
                        @endif

                    <div class="row">
                        <a href="/todos/{{ $todo->id }}/edit" class="btn btn-info my-1 mr-1">Edit</a>
                        <a href="/todos/{{ $todo->id }}/delete" class="btn btn-danger my-1">Delete</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
