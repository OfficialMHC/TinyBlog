<x-admin-master>

    @section('content')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <h5 class="font-weight-bold text-primary mt-3">ALL USERS LIST :</h5>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <a class="btn btn-primary float-right mt-1" href="{{ route('post.create') }}"><i class="fa fa-plus-square"></i> CREATE</a>
                        </div>
                    </div>
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
                                        {{--                                    can function is use for individual user can permission to see their action button--}}
                                        {{--                                    @can('view', $post)--}}
{{--                                        <div class="btn-group">--}}
{{--                                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-success rounded-0 mr-2"><i class="fa fa-edit"></i></a>--}}
{{--                                            <form action="{{ route('post.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are You Sure To DELETE This?')">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button type="submit" class="btn btn-sm btn-danger rounded-0"><i class="fa fa-trash"></i></button>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
                                        {{--                                    @endcan--}}
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
