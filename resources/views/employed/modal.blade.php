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
                        <div class="">
                            <div class="col-md-12">

                                @includeif('partials.errors')

                                <div class="card card-default">
                                    <div class="card-header">
                                        <span class="card-title">Update Employed</span>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('employeds.update', $employed->id) }}"  role="form" enctype="multipart/form-data">
                                            {{ method_field('PATCH') }}
                                            @csrf

                                            @include('employed.form',['mode' => 'Edit'])
                                            @if($errors->all())
                                              <script type="text/javascript">
                                                  $('#mediumModal').modal("show");
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
