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
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h1>{{ __('Access Control Room 911') }}</h1>
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
                                    <td>Minimum date:</td>
                                    <td><input type="text" id="min" name="min"></td>
                                </tr>
                                <tr>
                                    <td>Maximum date:</td>
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
            <br><script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" defer></script>
            <br><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js" defer></script>
            <br><script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.0/js/dataTables.dateTime.min.js" defer></script>
        </div>
        
@endsection

@section('javascripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.0/js/dataTables.dateTime.min.js"></script>
    <script>

        // display a modal (medium modal)
        $(document).on('click', '#mediumButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            console.log(href);
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#mediumModal').modal("show");
                    $('#mediumBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

    </script>

    <script>
    var minDate, maxDate;
 
    // Custom filtering function which will search data in column four between two values
    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date( data[5] );
     
            if (
                ( min === null && max === null ) ||
                ( min === null && date <= max ) ||
                ( min <= date   && max === null ) ||
                ( min <= date   && date <= max )
            ) {
                return true;
            }
            return false;
        }
    );
    $(document).ready(function () {
      
      minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        });
     
        // DataTables initialisation
      var table = $('#datatable').DataTable({
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
      $('#min, #max').on('change', function () {
      table.draw();
      });

    });
    </script>
@endsection