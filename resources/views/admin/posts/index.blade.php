<x-admin-master>

    @section('content')

{{--        <h1>All Posts</h1>--}}
        @if(session('create-message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('create-message') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session('update-message'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ session('update-message') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session('delete-message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('delete-message') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h4 class="font-weight-bold text-primary mt-1">All Posts List :</h4>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <a class="btn btn-primary float-right" href="{{ route('post.create') }}"><i class="fa fa-plus-square"></i> CREATE</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Owner</th>
                            <th>Title</th>
                            <th>Picture</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Owner</th>
                            <th>Title</th>
                            <th>Picture</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->title }}</td>
                                <td><img src="{{$post->post_image}}" alt="Post Image" height="40"></td>
                                <td>{{ $post->created_at->diffForHumans() }}</td>
                                <td>{{ $post->updated_at->diffForHumans() }}</td>
                                <td>
{{--                                    can function is use for individual user can permission to see their action button--}}
{{--                                    @can('view', $post)--}}
                                    <div class="btn-group">
                                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-success rounded-0 mr-2"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('post.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are You Sure To DELETE This?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger rounded-0"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
{{--                                    @endcan--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <div class="d-flex">
        <div class="mx-auto">
            {{ $posts->links() }}
        </div>
    </div>

    @endsection

    @section('scripts')

    <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
{{--        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>--}}

    @endsection

</x-admin-master>
