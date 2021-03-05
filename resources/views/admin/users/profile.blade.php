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

    @endsection

</x-admin-master>
