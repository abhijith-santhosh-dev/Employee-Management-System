@extends('adminlte::page')

@section('title', 'Create Employee')

@section('content_header')
    <h1>Create Employee</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Employee</h3>
        </div>
        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="name">Employee Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter employee name" value="{{ old('name') }}" required>
                </div>
                
                <div class="form-group">
                    <label for="department_id">Department</label>
                    <select class="form-control" id="department_id" name="department_id" required>
                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo" name="photo">
                            <label class="custom-file-label" for="photo">Choose file</label>
                        </div>
                    </div>
                    <small class="text-muted">Accepted formats: jpeg, png, jpg, gif (max: 2MB)</small>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('employees.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
@stop