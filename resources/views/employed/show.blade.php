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
                            <strong>Date Deleted:</strong>
                            {{ $employed->date_deleted }}
                        </div>
                        <div class="form-group">
                            <strong>Id Department:</strong>
                            {{ $employed->id_department }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                <div class="custom-file text-left">
                    <input type="file" name="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <button class="btn btn-primary">Import data</button>
        </form>
    </section>
@endsection
