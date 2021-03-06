<x-admin-master>

    @section('content')

        <div class="row">

            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h5 class="font-weight-bold text-primary mt-3">ROLES CREATE</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('roles.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name">

                                <div class="text-danger">
                                    @error('name')
                                        <span><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary btn-block">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h5 class="font-weight-bold text-primary mt-3">ROLES LIST</h5>
                    </div>
                    <div class="card-body">

                        @if(session('create-message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('create-message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered" id="roleDataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->slug }}</td>
                                        <td>
{{--                                            <div class="btn-group">--}}
{{--                                                <form action="{{ route('user.role.attach', $user) }}" method="POST">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('PUT')--}}
{{--                                                    <input type="hidden" name="role" value="{{ $role->id }}">--}}
{{--                                                    <button type="submit" class="btn btn-sm btn-info rounded-0 mr-2"--}}
{{--                                                            @if($user->roles->contains($role))--}}
{{--                                                            disabled--}}
{{--                                                        @endif--}}
{{--                                                    >--}}
{{--                                                        Attach--}}
{{--                                                    </button>--}}
{{--                                                </form>--}}
{{--                                                <form action="{{ route('user.role.detach', $user) }}" method="POST">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('PUT')--}}
{{--                                                    <input type="hidden" name="role" value="{{ $role->id }}">--}}
{{--                                                    <button type="submit" class="btn btn-sm btn-danger rounded-0"--}}
{{--                                                            @if(!$user->roles->contains($role))--}}
{{--                                                            disabled--}}
{{--                                                        @endif--}}
{{--                                                    >--}}
{{--                                                        Detach--}}
{{--                                                    </button>--}}
{{--                                                </form>--}}
{{--                                            </div>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    @endsection

    @section('scripts')

        <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

    @endsection

</x-admin-master>
