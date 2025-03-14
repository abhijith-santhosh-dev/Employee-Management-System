@extends('adminlte::page')

@section('title', 'Edit Employee')

@section('content_header')
    <h1>Edit Employee</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Employee</h3>
        </div>
        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
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
                    <label for="name">Employee Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter employee name" value="{{ old('name', $employee->name) }}" required>
                </div>
                
                <div class="form-group">
                    <label for="department_id">Department</label>
                    <select class="form-control" id="department_id" name="department_id" required>
                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="photo">Photo</label>
                    @if($employee->photo)
                        <div class="mb-2">
                            <img src="{{ asset('storage/'.$employee->photo) }}" alt="{{ $employee->name }}" width="100">
                        </div>
                    @endif
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo" name="photo">
                            <label class="custom-file-label" for="photo">Choose file</label>
                        </div>
                    </div>
                    <small class="text-muted">Leave blank to keep current photo. Accepted formats: jpeg, png, jpg, gif (max: 2MB)</small>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('employees.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
@stop