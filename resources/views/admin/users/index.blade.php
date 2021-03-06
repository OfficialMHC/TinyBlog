<x-admin-master>

    @section('content')

        @if(session('create-message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('create-message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session('update-message'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('update-message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session('delete-message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('delete-message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="font-weight-bold text-primary mt-3">ALL USERS LIST :</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="postDataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Registered At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Registered At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td><img src="{{$user->avatar}}" alt="User Image" height="40"></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('user.profile.show', $user->id) }}" class="btn btn-sm btn-primary rounded-0 mr-2"><i class="fa fa-eye"></i></a>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are You Sure To DELETE This?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger rounded-0"><i class="fa fa-trash"></i></button>
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

    @endsection

    @section('scripts')

        <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

    @endsection

</x-admin-master>
