@extends('layouts.app')

@section('template_title')
    Employed
@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.0/css/dataTables.dateTime.min.css"/>

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
             <strong>{{ Carbon\Carbon::now()->format('d, M Y') }}</strong> 
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h2>{{ __('Access Control Room 911') }}</h2>
                            </span>
                            
                            <div class="float-right">
                                
                                <a href="{{ route('export-pdf') }}" class="btn btn-success btn-sm"> Export to PDF </a>

                                <a class="btn btn-primary btn-sm float-right" data-toggle="modal" id="mediumButton" data-target="#mediumModal" data-attr="{{ route('employeds.create')}}"> {{ __('Create New') }}</a>

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
                                    
									<th>Employed</th>
                                    <th>Department</th>
									<th>First Name</th>
									<th>Middle Name</th>
									<th>Last Name</th>
                                    <th>Last Access</th>
                                    <th>Total Access</th>
                                    <th width="280px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employeds as $employed)
                                    <tr>
										<td>{{ $employed->id_employed }}</td>
                                        <td>{{ $employed->name }}</td>
										<td>{{ $employed->first_name }}</td>
										<td>{{ $employed->middle_name }}</td>
										<td>{{ $employed->last_name }}</td>
                                        <td>{{ $employed->last_date }}</td>
                                        <td>{{ $employed->total_access }}</</td>
                                        <td>
                                        <form action="{{ route('employeds.destroy',$employed->id) }}" class="d-inline" method="POST">               

                                        <a class="btn btn-sm btn-success" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                                        data-attr="{{ route('employeds.edit',$employed->id) }}">Edit
                                        </a>
                                            @if($employed->room_access)
                                            <a class="btn btn-sm btn-primary " onclick="return confirm('Do you disabled access room?')" href="{{ route('employeds.editroom', $employed->id) }}">  
                                            Enable</a>
                                            @endif
                                            @if($employed->room_access==false) 
                                            <a class="btn btn-danger btn-sm" onclick="return confirm('Do you enable access room?')" href="{{ route('employeds.editroom', $employed->id)}}"> 
                                            Disabled</a>
                                            @endif                                             
                                            <a class="btn btn-sm btn-primary " href="{{ route('employeds.show',$employed->id) }}"><i class="fa fa-fw fa-eye"></i>History</a>
                                        
                                            @csrf
                                            @method('DELETE')
                                            <input class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Do you want delete?')" value="Delete">          
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="thead">
                                <tr>
                                    <th>Employed</th>
                                    <th>Department</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Last Access</th>
                                    <th>Total Access</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
                @include('employed.modal')
            </div>
            
        </div>
        
@endsection

@section('javascripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.0/js/dataTables.dateTime.min.js"></script>
    <script src="{{ asset('js/filtersEmployee.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
@endsection