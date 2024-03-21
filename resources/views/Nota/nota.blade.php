@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">List of Nota</div>

                    <div class="card-body">
                        <div style="margin-bottom: 20px;">
                            <a href="{{ route('upload.nota') }}" class="btn btn-success">Add Nota</a>
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
                                    <th>Tanggal</th>
                                    <th>Nota</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection