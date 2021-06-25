
    <section class="content container-fluid">
        <div class="card card-default">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Employee</span>
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
