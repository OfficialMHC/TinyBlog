<x-admin-master>

    @section('content')

{{--        <h1>All Posts</h1>--}}

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
