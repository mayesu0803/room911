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
      <div class="container py-5">
          <div class="card mt-4">
              <div class="card-header">
                    <h5 class="card-title font-weight-bold">Laboratorios XYZ - Access ROOM-911</h5>
              </div>
              <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="thead">
                                <tr>
                                        
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
                                            
                                    <td>{{ $employed->id_employed }}</td>
                                    <td>{{ $employed->first_name }}</td>
                                    <td>{{ $employed->middle_name }}</td>
                                    <td>{{ $employed->last_name }}</td>
                                    <td>{{ $employed->room_access }}</td>
                                    <td>{{ $employed->date_deleted }}</td>
                                    <td>{{ $employed->id_department }}</td>

                              </tr>
                                    @endforeach
                                </tbody>
                            </table>
              </div>
          </div>
      </div>
  </body>
</html>