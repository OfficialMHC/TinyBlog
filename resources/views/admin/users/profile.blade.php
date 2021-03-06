<x-admin-master>

    @section('content')

        @if(session('update-message'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('update-message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col-sm-12 col-md-1 col-lg-2"></div>
            <div class="col-sm-12 col-md-10 col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h5 class="font-weight-bold text-primary mt-3">PROFILE OF : {{ $user->name }}</h5>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('user.profile.update', $user) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="mb-2" style="width: 164px; height: 164px; margin: auto">
                                        <img class="img-thumbnail" src="{{ $user->avatar }}" style="width: 100%; height: 100%;">
                                    </div>
                                    <div class="form-group">
                                        <label for="avatar">Picture</label>
                                        <input class="form-control" type="file" name="avatar" id="user_image">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" id="username" value="{{ $user->username }}">

                                        @error('username')
                                        <div class="invalid-feedback mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ $user->name }}">

                                        @error('name')
                                        <div class="invalid-feedback mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="email" name="email" id="email" value="{{ $user->email }}">

                                        @error('email')
                                        <div class="invalid-feedback mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password">

                                        @error('password')
                                        <div class="invalid-feedback mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" id="password_confirmation">

                                        @error('password_confirmation')
                                        <div class="invalid-feedback mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-primary btn-block" type="submit" name="save" value="UPDATE">
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-1 col-lg-2"></div>
        </div>

        @if(session('role-attach'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('role-attach') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session('role-detach'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('role-detach') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
                <div class="col-sm-12 col-md-1 col-lg-2"></div>
                <div class="col-sm-12 col-md-10 col-lg-8">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <h5 class="font-weight-bold text-primary mt-3">USER ROLE TABLE</h5>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered" id="roleDataTable" width="100%" cellspacing="0">
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
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        @foreach($user->roles as $user_role)
                                                            @if($user_role->slug == $role->slug)
                                                                checked
                                                            @endif
                                                        @endforeach
                                                    >
                                                </div>
                                            </td>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->slug }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{ route('user.role.attach', $user) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="role" value="{{ $role->id }}">
                                                        <button type="submit" class="btn btn-sm btn-info rounded-0 mr-2"
                                                            @if($user->roles->contains($role))
                                                                disabled
                                                            @endif
                                                        >
                                                            Attach
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('user.role.detach', $user) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="role" value="{{ $role->id }}">
                                                        <button type="submit" class="btn btn-sm btn-danger rounded-0"
                                                            @if(!$user->roles->contains($role))
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
                <div class="col-sm-12 col-md-1 col-lg-2"></div>
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
