@php
    $postCount = DB::table('posts')->count();
    $categoriesCount = DB::table('categories')->count();
    $tagsCount = DB::table('tags')->count();
    $usersCount = DB::table('users')->count();
@endphp
<div class="row">
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 text-white bg-primary">
            <div class="card-body">
                <div class="fs-4 fw-semibold">{{$postCount}}</div>
                <div>Posts</div>
                {{-- <div class="progress progress-white progress-thin my-2">
                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div> --}}
                <small class="text-medium-emphasis-inverse">Total Number of Posts</small>
            </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 text-white bg-warning">
            <div class="card-body">
                <div class="fs-4 fw-semibold">{{$categoriesCount}}</div>
                <div>Categories</div>
                {{-- <div class="progress progress-white progress-thin my-2">
                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div> --}}
                <small class="text-medium-emphasis-inverse">Total Number of Categories</small>
            </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 text-white bg-danger">
            <div class="card-body">
                <div class="fs-4 fw-semibold">{{$tagsCount}}</div>
                <div>Tags</div>
                {{-- <div class="progress progress-white progress-thin my-2">
                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div> --}}
                <small class="text-medium-emphasis-inverse">Total Number of Tags</small>
            </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 text-white bg-info">
            <div class="card-body">
                <div class="fs-4 fw-semibold">{{$usersCount}}</div>
                <div>Users</div>
                {{-- <div class="progress progress-white progress-thin my-2">
                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div> --}}
                <small class="text-medium-emphasis-inverse">Total Registered Users</small>
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>
<!-- /.row-->
