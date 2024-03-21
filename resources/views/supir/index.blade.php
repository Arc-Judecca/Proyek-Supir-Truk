@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">List of Drivers</div>

                    <div class="card-body">
                        <div style="margin-bottom: 20px;">
                            <a href="{{ route('supir.create') }}" class="btn btn-success">Add Driver</a>
                        </div>

                        @if (session('status_success'))
                            <p style="color: green"><strong>{{ session('status_success') }}</strong></p>
                        @else
                            <p style="color: red"><strong>{{ session('status_error') }}</strong></p>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID Supir</th>
                                    <th>Nama Supir</th>
                                    <th>Username</th>
                                    <th>Actions</th> <!-- Tambah kolom Actions -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supirs as $supir)
                                    <tr>
                                        <td>{{ $supir->id }}</td>
                                        <td>{{ $supir->nama }}</td>
                                        <td>{{ $supir->username }}</td>
                                        <td>
                                            <a href="{{ route('supir.edit', $supir->id) }}" class="btn btn-primary">Update</a>
                                            <form action="{{ route('supir.destroy', $supir->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
