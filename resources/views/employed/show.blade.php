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
                            <strong>Frstname:</strong>
                            {{ $employed->FrstName }}
                        </div>
                        <div class="form-group">
                            <strong>Middlename:</strong>
                            {{ $employed->MiddleName }}
                        </div>
                        <div class="form-group">
                            <strong>Lastname:</strong>
                            {{ $employed->LastName }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
