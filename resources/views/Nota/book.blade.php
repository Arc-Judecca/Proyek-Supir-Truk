@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Book Nota</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('upload.nota') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="supir" class="col-md-4 col-form-label text-md-right">Nama Supir</label>

                                <div class="col-md-6">
                                    <select id="supir" class="form-control @error('supir_id') is-invalid @enderror" name="supir_id" required autocomplete="supir_id" autofocus>
                                        <option value="">Pilih Supir</option>
                                        @foreach($supirs as $supir)
                                            <option value="{{ $supir->id }}">{{ $supir->nama }}</option>
                                        @endforeach
                                    </select>

                                    @error('supir_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tanggal" class="col-md-4 col-form-label text-md-right">Tanggal</label>

                                <div class="col-md-6">
                                    <input type="date" id="datepicker" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" required autocomplete="tanggal">
                                    @error('tanggal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nota" class="col-md-4 col-form-label text-md-right">Upload Nota</label>

                                <div class="col-md-6">
                                    <input id="nota" type="file" class="form-control-file @error('nota') is-invalid @enderror" name="nota" required>

                                    @error('nota')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Upload
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
@endpush
