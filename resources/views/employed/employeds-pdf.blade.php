<!doctype html>
<html lang="en">
  <head>
    <title>Laboratorios XYZ - Access ROOM-911</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table {
            font-size: 12px;
        }
    </style>
</head>
  <body>
      <div >
          <div >
              <div >
                    <h5 >Laboratorios XYZ - Access ROOM-911</h5>
              </div>
              <div>
                  <table class="table table-bordered">
                      <thead>
                        <tr> 
                            <th>Date deleted</th>
                            <th>Id Employee</th>
                            <th>Department</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Room Access</th>

                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($employeds as $employed)
                        <tr>    
                            <td>{{ $employed->date_deleted }}</td>    
                            <td>{{ $employed->id_employed }}</td>
                            <td>{{ $employed->department->name}}</td>
                            <td>{{ $employed->first_name }}</td>
                            <td>{{ $employed->middle_name }}</td>
                            <td>{{ $employed->last_name }}</td>
                            @if ($employed->room_access)
                                <td>Enable</td>
                                @else
                                <td>Disabled</td>
                                @endif
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </body>
</html>