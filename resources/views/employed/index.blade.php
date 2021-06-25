@extends('layouts.app')

@section('template_title')
    Employee
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
                                
                                <a href="{{ route('export-pdf') }}" class="btn float-right"><i class="fas fa-2x fa-file-pdf"></i></a>

                                <a href="{{ route('employeds.import') }}" class="btn float-right"><i class="fas fa-2x fa-file-csv"></i></a>

                                <a class="btn float-right" data-toggle="modal" id="mediumButton" data-target="#mediumModal" data-attr="{{ route('employeds.create')}}"><i class="fa fa-fw fa-2x fa-plus-square"></i></a> 

                            </div>

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="input-group">
                                <div class="form-group">
                                    <strong>From:</strong>
                                    <input type="text" id="min" name="min">
                                </div>
                                <div class="form-group">
                                    <strong> To:</strong>
                                    <input type="text" id="max" name="max">
                                </div>
                                
                            </div> 

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    
									<th>Employee</th>
                                    <th>Department</th>
									<th>First Name</th>
									<th>Middle Name</th>
									<th>Last Name</th>
                                    <th>Last Access</th>
                                    <th>Total Access</th>
                                    <th width="300px">Actions</th>
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
                                            <a class="btn" data-toggle="modal" id="mediumButton" data-target="#mediumModal" data-attr="{{ route('employeds.edit',$employed->id)}}"><i class="fa fa-fw fa-lg fa-edit"></i></a>               

                                            @if($employed->room_access)
                                            <a class="btn" onclick="return confirm('Do you disabled access room?')" href="{{ route('employeds.editroom', $employed->id)}}"><i class="fa fa-fw fa-lg fa-toggle-on"></i>  
                                            </a>
                                            @else
                                            <a class="btn" onclick="return confirm('Do you enable access room?')" href="{{ route('employeds.editroom', $employed->id)}}"> 
                                            <i class="fa fa-fw fa-lg fa-toggle-off"></i></a>
                                            @endif
                                            
                                            <a class="btn" href="{{ route('employeds.show',$employed->id) }}"><i class="fa fa-fw fa-lg fa-eye"></i></a>
                                        
                                            @csrf
                                            @method('DELETE')
                                            
                                            <button type="submit" onclick="return confirm('Do you want delete?')" class="btn"><i class="fa fa-fw fa-lg fa-trash"></i></button>

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