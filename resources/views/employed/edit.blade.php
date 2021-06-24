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

