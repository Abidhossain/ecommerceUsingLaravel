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
                           <th>Product Name</th>
                           <th>Category Name</th>
                           <th>Manufacturer Name</th>
                           <th>Product Price</th>
                           <th>Product Quantity</th>
                           <th>Publication Status</th>
                           <th>Action</th>
                       </tr>
                   </thead>
                   <tbody> 
                    <?php $i=1 ?>
                    @foreach ($product as $products) 
                       <tr>
                           <td>{{$i++}}</td>
                           <td>{{$products->productName}}</td>
                           <td>{{$products->categoryName}}</td>
                           <td>{{$products->manufacturerName}}</td>
                           <td>
                             <?php 
                                echo  'TK '.number_format($products->productPrice,2)
                             ?>  
                           </td>
                           <td>{{$products->productQuantity}}</td>
                           <td>{{$products->publicationStatus == 1 ? 'Published':'Unpublished'}}</td>
                           <td class="text-center"> 
                             <a class="btn btn-info" title="Product View" href="{{url('/product/view/'.$products->id)}}">
                                    <i class="glyphicon glyphicon-info-sign"></i>
                                </a>
                                <a class="btn btn-success" title="Product Edit" href="{{url('/product/edit/'.$products->id)}}">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <a onclick="return confirm('Are you sure to delete records?')" title="Product Delete" class="btn btn-danger"href="{{url('/product/delete/'.$products->id)}}">
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

