
    <section class="content container-fluid">
        <div class="card card-default">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Employee</span>
                        <div class="float-right">
                            <a class="btn" href="{{ route('employeds.index') }}"> <i class="fas fa-2x fa-home"></i></a>
                        </div>
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
