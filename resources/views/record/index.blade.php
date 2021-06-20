@extends('layouts.app')

@section('template_title')
    Record
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.0/css/dataTables.dateTime.min.css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Access Simulation') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('records.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
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
                        </div>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No: 
                                        <th>Id Employed: </th>
                                        <th>Date: </th>
										<th>Success: </th>
										<th>Message: </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($records as $record)
                                        <tr>
                                            <td>{{  $record->id }}</td>
                                            <td>{{ $record->id_employed }}</td>
											<td>{{ $record->date }}</td>
											<td>{{ $record->success }}</td>
											<td>{{ $record->message }}</td>
											
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
    <script src="{{ asset('js/filtersRecords.js') }}" type="text/javascript"></script>
    
@endsection