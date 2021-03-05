<x-admin-master>

    @section('content')

        <div class="card shadow mb-4">
            <div class="card-header">
                <h4 class="font-weight-bold text-primary mt-2">Edit Post</h4>
            </div>
            <div class="card-body">

                <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" type="text" name="title" id="title" placeholder="Enter Title" value="{{ $post->title }}">
                    </div>
                    <div class="form-group">
                        <div><img src="{{ $post->post_image }}" alt="" width="40px"></div>
                        <label for="post_image">Picture</label>
                        <input class="form-control" type="file" name="post_image" id="post_image">
                    </div>
                    <div class="form-group">
                        <label for="body">Description</label>
                        <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{ $post->body }}</textarea>
                    </div>
                    <input class="btn btn-primary" type="submit" name="save" value="UPDATE">
                </form>

            </div>
        </div>

    @endsection

</x-admin-master>
