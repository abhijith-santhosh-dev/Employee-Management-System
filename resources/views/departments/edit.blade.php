@extends('adminlte::page')

@section('title', 'Edit Department')

@section('content_header')
    <h1>Edit Department</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Department</h3>
        </div>
        <form action="{{ route('departments.update', $department->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="name">Department Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter department name" value="{{ old('name', $department->name) }}" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('departments.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
@stop
