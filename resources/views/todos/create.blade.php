@extends('layouts.app')
@section('content')
    <h1 class="text-center">Create Todos</h1>
    <div class="row jusify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                    Create new todos
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-group">
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    @endif
                    <form action="/store-todos" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" placeholder="Name" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <textarea name="description" cols="8" rows="5" class="form-control"
                                placeholder="Description"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
