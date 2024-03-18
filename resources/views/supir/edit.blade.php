@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Driver</div>

                    <div class="card-body">
                        {!! form_start($form) !!}
                        <div class="form-group row">
                            <div class="col-md-6">
                                {!! form_row($form->id_supir) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                {!! form_row($form->nama_supir) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                {!! form_row($form->email) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                {!! form_row($form->password) !!}
                            </div>
                        </div>

                        <!-- Tambahkan input lainnya sesuai kebutuhan -->

                        
                        {!! form_end($form) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
