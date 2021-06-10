@extends('layouts.app')

@section('template_title')
    {{ $employed->name ?? 'Show Employed' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Employed</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('employeds.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Employed:</strong>
                            {{ $employed->id_employed }}
                        </div>
                        <div class="form-group">
                            <strong>First Name:</strong>
                            {{ $employed->first_name }}
                        </div>
                        <div class="form-group">
                            <strong>Middle Name:</strong>
                            {{ $employed->middle_name }}
                        </div>
                        <div class="form-group">
                            <strong>Last Name:</strong>
                            {{ $employed->last_name }}
                        </div>
                        <div class="form-group">
                            <strong>Room Access:</strong>
                            {{ $employed->room_access }}
                        </div>
                        <div class="form-group">
                            <strong>Id Department:</strong>
                            {{ $employed->id_department }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
