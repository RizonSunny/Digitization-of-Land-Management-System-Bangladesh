@include('layouts.app')
@include('officetahsildar.sidebar')
<div class="container" style="margin-left:250px">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-success">
                        Tax Information of Your Land has added successfully.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
