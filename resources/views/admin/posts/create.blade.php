<x-admin-master>

    @section('content')

        <div class="card shadow mb-4">
            <div class="card-header">
                <h4 class="font-weight-bold text-primary mt-2">Create Post</h4>
            </div>
            <div class="card-body">

                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" type="text" name="title" id="title" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="post_image">Picture</label>
                        <input class="form-control" type="file" name="post_image" id="post_image">
                    </div>
                    <div class="form-group">
                        <label for="body">Description</label>
                        <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
                    </div>
                    <input class="btn btn-primary" type="submit" name="save" value="SUBMIT">
                </form>

            </div>
        </div>

    @endsection

</x-admin-master>
