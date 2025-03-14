@extends('adminlte::page')

@section('title', 'Employee Details')

@section('content_header')
    <h1>Employee Details</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Employee Information</h3>
            <div class="card-tools">
                <a href="{{ route('employees.index') }}" class="btn btn-default">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if($employee->photo)
                        <img src="{{ asset('storage/'.$employee->photo) }}" alt="{{ $employee->name }}" class="img-thumbnail" style="max-height: 250px;">
                    @else
                        <img src="{{ asset('img/default-avatar.png') }}" alt="Default Avatar" class="img-thumbnail" style="max-height: 250px;">
                    @endif
                </div>
                <div class="col-md-8">
                    <p><strong>ID:</strong> {{ $employee->id }}</p>
                    <p><strong>Name:</strong> {{ $employee->name }}</p>
                    <p><strong>Department:</strong> {{ $employee->department->name }}</p>
                    <p><strong>Created At:</strong> {{ $employee->created_at->format('Y-m-d H:i:s') }}</p>
                    <p><strong>Updated At:</strong> {{ $employee->updated_at->format('Y-m-d H:i:s') }}</p>
                </div>
            </div>
        </div>
    </div>
@stop