@extends('layouts.app')

@section('template_title')
    {{ $employed->name ?? 'Show Employed' }}
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.0/css/dataTables.dateTime.min.css"/>

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
                        <a href="{{ route('export-pdf-records', $employed->id_employed) }}" class="btn btn-success btn-sm"> Export to PDF </a>
                        <a class="btn btn-primary btn-sm" href="{{ route('employeds.index') }}"> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="form-group">
                        <strong>Id Employed:</strong>
                        {{ $employed->id_employed }}
                    </div>
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $employed->first_name }} {{ $employed->middle_name }} {{ $employed->last_name }}
                    </div>
                    <div>
                        <table border="0" cellspacing="5" cellpadding="5">
                            <tbody>
                                <tr>
                                    <td>From:</td>
                                    <td><input type="text" id="min" name="min"></th>
                                    <td>To:</td>
                                    <td><input type="text" id="max" name="max"></td>
                                </tr>
                            </tbody>
                        </table>
                    <div>                 
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-hover">
                            <thead class="thead">
                                <tr> 
                                    <th>Date: </th>
                                    <th>Message: </th>
                                    <th>Success: </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($records as $record)
                                <tr>
                                    <td>{{ $record->date }}</td>
                                    <td>{{ $record->message }}</td>
                                    @if ($record->success)
                                            <td>Yes</td>
                                            @else
                                            <td>No</td>
                                            @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('javascripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.0/js/dataTables.dateTime.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/history.js') }}"></script>
@endsection