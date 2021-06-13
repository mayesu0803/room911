@extends('layouts.app')

@section('template_title')
    Employed
@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Employed') }}
                            </span>
                            
                            <div class="float-right">
                                

                                <a href="{{ route('export-pdf') }}" class="btn btn-success btn-sm">Export to PDF</a>
                                <a href="{{ route('employeds.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        
										<th>Id Employed</th>
                                        <th>Department</th>
										<th>First Name</th>
										<th>Middle Name</th>
										<th>Last Name</th>
                                        <th>Last Access</th>
                                        <th>Total Access</th>
                                        <th>Actions</th>
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
                                                <form action="{{ route('employeds.destroy',$employed->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('employeds.show',$employed->id) }}"><i class="fa fa-fw fa-eye">
                                                    </i> @if                                                  ($employed->room_access) 
                                                    Enable 
                                                    @endif
                                                    @if($employed->room_access==false) 
                                                    Disabled
                                                    @endif

                                                    </a>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('employeds.show',$employed->id) }}"><i class="fa fa-fw fa-eye"></i> History</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('employeds.edit',$employed->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        })
    </script>


@endsection