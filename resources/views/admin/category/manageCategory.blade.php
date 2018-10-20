@extends('admin.master')


@section('dashboardContent')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid"> 

               <table class="table table-bordered table-hover">
                    <h3 class="text-success updatemsg ">{{Session::get('msg')}}</h3>
                   <thead>
                       <tr class="text-center">
                           <th>Id</th>
                           <th>Category Name</th>
                           <th>Category Details</th>
                           <th>Category Status</th>
                           <th>Action</th>
                       </tr>
                   </thead>
                   <tbody> 
                    <?php $i=1 ?>
                    @foreach ($categories as $category) 
                       <tr>
                           <td>{{$i++}}</td>
                           <td>{{$category->categoryName}}</td>
                           <td>{{$category->categoryDescription}}</td>
                           <td>{{$category->publicationStatus == 1 ? 'Published' : 'Unpublished' }}</td>
                           <td class="text-center"> 
                                <a class="btn btn-success" href="{{url('/category/edit/'.$category->id)}}">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <a onclick="return confirm('Are you sure to delete records??')" class="btn btn-danger"href="{{url('/category/delete/'.$category->id)}}">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                           </td>
                       </tr>                 
                    @endforeach     
                   </tbody>
               </table>
    <!-- /Page Content -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection

