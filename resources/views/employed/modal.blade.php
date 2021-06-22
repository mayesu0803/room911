 <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mediumBody">
                  <section class="content container-fluid">    
        <div class="card card-default">
            <div class="card-header">
                <span class="card-title">Create employees from file .csv</span>
            </div>
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
                        <input type="file" name="file" class="custom-file-input" id="file">
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

                            @include('employed.form')
                            @if($errors->all())
                              <script type="text/javascript">
                                  $('#mediumModal').modal("show");
                                  $('#mediumBody').html(result).show();
                              </script>
                              @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
                </div>
            </div>
        </div>
    </div>
