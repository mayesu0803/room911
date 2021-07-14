@extends('layouts.app')

@section('template_title')
    Department
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Department') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('departments.create') }}" class="btn float-right"  data-placement="left"><i class="fas fa-2x fa-plus-square"></i>
                                  
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                                <span aria-hidden="true"> &times;</span>
                            </button>
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Name</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $department)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $department->name }}</td>

                                            <td>
                                                <form action="{{ route('departments.destroy',$department->id) }}" method="POST">
                                                    <a class="btn" href="{{ route('departments.show',$department->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    
                                                    <a class="btn btn-sm" href="{{ route('departments.edit',$department->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn"><i class="fa fa-fw fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $departments->links() !!}
            </div>
        </div>
    </div>
@endsection
