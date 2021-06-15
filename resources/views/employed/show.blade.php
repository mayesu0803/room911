@extends('layouts.app')

@section('template_title')
    {{ $employed->name ?? 'Show Employed' }}
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>

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
                            <a href="{{ route('export-pdf') }}" class="btn btn-success btn-sm"> Export to PDF </a>
                            <a class="btn btn-primary" href="{{ route('employeds.index') }}"> Back</a>
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
                    
                     
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-hover">
                        <thead class="thead">
                            <tr> 
                                <th>Date</th>
                                <th>Message</th>
                                <th>Success</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $record)
                                <tr>
                                    <td>{{ $record->date }}</td>
                                    <td>{{ $record->message }}</td>
                                    <td>{{ $record->success }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                        <tfoot class="tfoot">
                            <tr>
                                <th>Date</th>
                                <th>Message</th>
                                <th>Success</th>
                        </tfoot>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('javascripts')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    
    <script>

    /*$(document).ready( function () {
             
        $('#mitabla').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{route('api.history')}}",
                "columns": [
                    { "data": "date" },
                    { "data": "message" },
                    { "data": "success" }
                ]
            });  
    });*/
    $(document).ready(function () {
            //$('#datatable').DataTable();
            $('#datatable').DataTable( {
            initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
            }
        });
        });
    </script>
@endsection