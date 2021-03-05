<x-admin-master>

    @section('content')

        <div class="row">
            <div class="col-sm-12 col-md-1 col-lg-2"></div>
            <div class="col-sm-12 col-md-10 col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h5 class="font-weight-bold text-primary mt-3">CREATE POST</h5>
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
                                <textarea class="form-control" name="body" id="body" cols="30" rows="7"></textarea>
                            </div>
                            <input class="btn btn-primary" type="submit" name="save" value="SUBMIT">
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-1 col-lg-2"></div>
        </div>

    @endsection

</x-admin-master>
