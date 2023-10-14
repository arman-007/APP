<x-admin.layouts.admin_master>

    <h1 class="h3 mb-3"> categories</h1>

    <div class="card-header">
        Create blogs <a class="btn btn-info" href="{{route('blogs.index')}}">List</a>
    </div>

    <div class="card-body">
        <form action="{{route('blogs.store')}}" method="post" enctype="multipart/form-data">

            @csrf
            <div class="mb-3">
                <label for="title" class="col-sm-3 col-form-label">Title</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="title" name="title" value="">
                </div>
            </div>
            <div class="mb-3 ">
                <label for="category_id" class="col-sm-3 col-form-label">Category id</label>
                <div class="col-sm-8">
                    <select name="category_id" id="category_id" class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="author_name" class="col-sm-3 col-form-label">Author Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="author_name" name="author_name" value="">

                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="col-sm-3 col-form-label">Description</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="description" name="description" value="">

                </div>
            </div>
            <div class="mb-3">
                <label for="inputPicture" class="col-sm-3 col-form-label">Picture</label>
                <div class="col-8">
                    <input type="file" class="form-control" id="inputPicture" name="image" value="">
                </div>
            </div>
            <div class="mb-3 ">

                <div class="col-1">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="status" value="1" id="flexCheckDefault">
                        <label for="flexCheckDefault" class="form-check-label">Status</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="col-sm-8">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>

            </div>

        </form>
    </div>

</x-admin.layouts.admin_master>