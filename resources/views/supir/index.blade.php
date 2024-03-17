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
                            <a href="{{ route('supir.register') }}" class="btn btn-primary">Register Driver</a>
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
                                    <th>Status</th>
                                    @auth
                                        <th>Actions</th>
                                    @endauth
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($supirs as $supir)
                                <tr>
                                    <td>{{ $supir->id_supir }}</td>
                                    <td>{{ $supir->nama_supir }}</td>
                                    <td>{{ $supir->printed ? 'Printed' : 'Not Printed' }}</td>
                                    <td>
                                        @if ($supir->nota_path)
                                        <a href="{{ asset('storage/' . $supir->nota_path) }}" download>Lihat Nota</a>
                                        @else
                                            Nota belum diunggah
                                        @endif
                                    </td>
                                    @auth
                                        <td>
                                            <form action="{{ route('supir.destroy', $supir->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    @endauth
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
