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

            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h5 class="font-weight-bold text-primary mt-3">ROLE EDIT : {{ $role->name }}</h5>
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

            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h5 class="font-weight-bold text-primary mt-3">PERMISSION LIST</h5>
                    </div>
                    <div class="card-body">

                        @if(session('permission-attach'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('permission-attach') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @elseif(session('permission-detach'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('permission-detach') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered" id="rolePermissionDataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Option</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Option</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                       @foreach($role->permissions as $role_permission)
                                                       @if($role_permission->slug == $permission->slug)
                                                       checked
                                                    @endif
                                                    @endforeach
                                                >
                                            </div>
                                        </td>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->slug }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <form action="{{ route('role.permission.attach', $role) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="role" value="{{ $permission->id }}">
                                                    <button type="submit" class="btn btn-sm btn-info rounded-0 mr-2"
                                                        @if($role->permissions->contains($permission))
                                                            disabled
                                                        @endif
                                                    >
                                                        Attach
                                                    </button>
                                                </form>
                                                <form action="{{ route('role.permission.detach', $role) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="role" value="{{ $permission->id }}">
                                                    <button type="submit" class="btn btn-sm btn-danger rounded-0"
                                                            @if(!$role->permissions->contains($permission))
                                                            disabled
                                                        @endif
                                                    >
                                                        Detach
                                                    </button>
                                                </form>
                                            </div>
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
