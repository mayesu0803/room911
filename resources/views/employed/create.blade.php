
    <section class="content container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <span class="card-title">Create employees from file .csv</span>
            </div>
            
            @if (session()->has('failures'))

                        <table class="table table-danger">
                            <tr>
                                <th>Row</th>
                                <th>Attribute</th>
                                <th>Errors</th>
                                <th>Value</th>
                            </tr>

                            @foreach (session()->get('failures') as $validation)
                                <tr>
                                    <td>{{ $validation->row() }}</td>
                                    <td>{{ $validation->attribute() }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($validation->errors() as $e)
                                                <li>{{ $e }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        {{ $validation->values()[$validation->attribute()] }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    @endif
            @if($errors->first('file'))

            <div class="alert alert-danger" role="alert" >
                <ul>
                    <li>{{$errors->first('file')}}</li>
                   
                </ul>

                
            </div>
            @endif
            @includeif('partials.errors')
            
            <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="card-body" >
                    <div class="custom-file text-left">
                        <input type="file" name="file" class="custom-file-input" id="file" required>
                        <label class="custom-file-label" for="file">Choose file</label>
                    </div>
                    <button class="btn btn-primary">Import data</button>
                </div>
                
            </form>

        </div>

        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Employed</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('employeds.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('employed.form',['mode' => 'Create'])

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@section('javascripts')
    <script src="{{ asset('js/uploadfile.js') }}"></script>
@endsection
