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
                           <th>User Name</th>
                           <th>User Email Id</th>
                           <th>User Address</th>
                           <th>Action</th>
                       </tr>
                   </thead>
                   <tbody> 
                    <?php $i=1 ?>
                    @foreach ($allUser as $user) 
                       <tr>
                           <td>{{$i++}}</td>
                           <td>{{$user->name}}</td>
                           <td>{{$user->email}}</td>
                           <td>{{$user->address}}</td>
                           <td class="text-center"> 
                                <a class="btn btn-success" href=" ">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <a onclick="return confirm('Are you sure to delete records??')" class="btn btn-danger"href=" ">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                           </td>
                       </tr>                 
                    @endforeach     
                   </tbody>
               </table>
     <!--Pagination -->
        <div>
          {{ $allUser->links() }}
        </div>
     <!--/Pagination -->
    <!-- /Page Content -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection

