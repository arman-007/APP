<x-admin.layouts.admin_master>

<div class="row">
<div class="col-12 col-lg-12 col-xxl-12 d-flex">
    <div class="card flex-fill">
    <div class="card-header">
        <h2 class="card-title mb-0">Create Category</h2>
        <div class="pull-right">
            <a class=" btn btn-info" href="{{route('blogs.create')}}">Create New Blog</a>
        </div>
    </div>
   <div class="card-body">

       @if(session('message'))
           <div class="alert alert-success">
               <span class="close" data-dismiss="alert"></span>
               <strong>{{session('message')}}</strong>
           </div>
       @endif
       <table class="table table-hover my-0">
               <thead>
               <tr>
                   <th>SL</th>
                   <th class="d-none d-xl-table-cell">Category Name</th>
                   <th class="d-none d-xl-table-cell">Picture</th>
                   <th>Status</th>
               </tr>
               </thead>
               <tbody>
               @foreach( $blogs as $key =>$blogs)
                   <tr>
                       <td>{{$key+1}}</td>
                       <td class="d-none d-xl-table-cell">{{$blogs->title}}</td>
                       <td> <img src="/storage/blog/{{$blogs->image}}" style="width: 70px;height: 40px"></td>

                       <td>
                           <a class="btn btn-info btn-sm" href="{{route('blogs.show',['blog' =>$blogs->id])}}">show</a>
                           <a class="btn btn-warning btn-sm" href="{{route('blogs.edit',['blog' =>$blogs->id])}}">Edit</a>
                           <form style="display: inline" action="{{route('blogs.destroy',['blog'=>$blogs->id])}}"
                                 method="post">
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('are you sure want to delete?')">Delete</button>

                           </form>

                       </td>

                   </tr>

               @endforeach

               </tbody>
           </table>
   </div>

</div>
</div>

    </div>



</x-admin.layouts.admin_master>

