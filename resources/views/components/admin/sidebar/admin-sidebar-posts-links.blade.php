<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa fa-fw fa-pen-alt"></i>
        <span>POST</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Post:</h6>
            <a class="collapse-item" href="{{ route('post.create') }}">Create</a>
            <a class="collapse-item" href="{{ route('post.index') }}">Manage</a>
        </div>
    </div>
</li>
