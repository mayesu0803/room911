@extends('layouts.app')

@section('template_title')
    Employed
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Id Employed</th>
										<th>First Name</th>
										<th>Middle Name</th>
										<th>Last Name</th>
										<th>Room Access</th>
                                        <th>Date Deleted</th>
										<th>Id Department</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employeds as $employed)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $employed->id_employed }}</td>
											<td>{{ $employed->first_name }}</td>
											<td>{{ $employed->middle_name }}</td>
											<td>{{ $employed->last_name }}</td>
											<td>{{ $employed->room_access }}</td>
                                            <td>{{ $employed->date_deleted }}</td>
											<td>{{ $employed->id_department }}</td>

                                            <td>
                                                <form action="{{ route('employeds.destroy',$employed->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('employeds.show',$employed->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
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
                {!! $employeds->links() !!}
            </div>
        </div>
    </div>
@endsection
