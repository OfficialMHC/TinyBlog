<x-admin-master>

    @section('content')

        @if(session('update-message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('update-message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">

            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h5 class="font-weight-bold text-primary mt-3">ROLE UPDATE</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('roles.update', $role->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ $role->name }}">

                                <div class="text-danger">
                                    @error('name')
                                    <span><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary btn-block">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6"></div>

        </div>

    @endsection


</x-admin-master>
