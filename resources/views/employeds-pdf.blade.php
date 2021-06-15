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
                <div class="form-group">
                    <strong>Id Employed:</strong>
                    {{ $employed->id_employed }}
                </div>
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $employed->first_name }} {{ $employed->middle_name }} {{ $employed->last_name }}
                </div>
              </div>
              <div>
                    <table class="table table-bordered">
                        <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Success</th>
                                    <th>Message</th>
                                </tr>
                        </thead>
                        <tbody>
                                @foreach ($records as $record)
                               <tr>
                                            
                                    <td>{{ $record->date }}</td>
                                    <td>{{ $record->success}}</td>
                                    <td>{{ $record->message}}</td>
                              </tr>
                                    @endforeach
                        </tbody>
                    </table>
              </div>
          </div>
      </div>
  </body>
</html>