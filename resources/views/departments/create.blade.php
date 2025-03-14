<!-- resources/views/departments/create.blade.php -->
@extends('adminlte::page')

@section('title', 'Create Department')

@section('content_header')
    <h1>Create Department</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Department</h3>
        </div>
        <form action="{{ route('departments.store') }}" method="POST">
            @csrf
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
                  
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter department name" value="{{ old('name') }}" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('departments.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
@stop