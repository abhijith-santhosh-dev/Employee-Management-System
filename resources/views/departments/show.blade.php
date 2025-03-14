@extends('adminlte::page')

@section('title', 'Department Details')

@section('content_header')
    <h1>Department Details</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Department Information</h3>
            <div class="card-tools">
                <a href="{{ route('departments.index') }}" class="btn btn-default">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $department->id }}</p>
            <p><strong>Name:</strong> {{ $department->name }}</p>
            <p><strong>Created At:</strong> {{ $department->created_at->format('Y-m-d H:i:s') }}</p>
            <p><strong>Updated At:</strong> {{ $department->updated_at->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>
@stop