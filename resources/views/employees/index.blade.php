@extends('adminlte::page')

@section('title', 'Employees')

@section('content_header')
    <h1>Employees</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Employees List</h3>
            <div class="card-tools">
                <a href="{{ route('employees.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Employee
                </a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($employee->photo)
                                    <img src="{{ asset('storage/'.$employee->photo) }}" alt="{{ $employee->name }}" width="50">
                                @else
                                    <img src="{{ asset('img/default-avatar.png') }}" alt="Default Avatar" width="50">
                                @endif
                            </td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->department->name }}</td>
                            <td>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-default">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No employees found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $employees->links() }}
        </div>
    </div>
@stop
