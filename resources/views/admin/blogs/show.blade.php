<x-admin.layouts.admin_master>


    <div class="col-12 col-lg-12 col-xxl-9 d-flex">
        <div class="card flex-fill">
            <div class="card-header">

                show Blog <a class="btn btn-info" href="{{route('blogs.index')}}">List</a>
            </div>

            <h2> Title:{{$blog->title}}</h2>
            <h2> <img src="/storage/blog/{{$blog->image}}" width="200px" height="300"></h2>


        </div>
    </div>


</x-admin.layouts.admin_master>


