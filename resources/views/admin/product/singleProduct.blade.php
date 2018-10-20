@extends('admin.master')


@section('dashboardContent')
	 <div id="page-wrapper">
	        <div class="container-fluid"> 
	        	<div class="alert-info text-center single"><h3>Single Product Information</h3></div>
<table class="table table-bordered table-hover">
	<tr>
		<th>Product Id</th>
		<th>{{$singleProduct->id}}</th>
	</tr>
	<tr>
		<th>Product Name</th>
		<th>{{$singleProduct->productName}}</th>
	</tr>
	<tr>
		<th>Product Image</th>
		<th>
			<img height="30px" width="60px" class="img img-thumbnail" src="{{asset($singleProduct->productImage)}}" alt="Product Image">
		</th>
	</tr>
	<tr>
		<th>Category Name</th>
		<th>{{$singleProduct->categoryName}}</th>
	</tr>
	<tr>
		<th>Manufacturer Name</th>
		<th>{{$singleProduct->manufacturerName}}</th>
	</tr>
	<tr>
		<th>Product Price</th>
		<th>
			<?php 
				echo  'TK: '.number_format($singleProduct->productPrice,2)
			?> 
		</th>
	</tr>
	<tr>
		<th>Product Quantity</th>
		<th>Quantity: {{$singleProduct->productQuantity}}Ps</th>
	</tr>
	<tr>
		<th>Product Short Description</th>
		<th>{!! $singleProduct->productShortDescription !!}</th>
	</tr>
	<tr>
		<th>Product Long Description</th>
		<th>{!!$singleProduct->productLongDescription !!}</th>
	</tr> 
	<tr>
		<th>Product Publication Status</th>
		<th>{{$singleProduct->publicationStatus == 1? 'Published':'Unpublished'}}</th>
	</tr>
	<tr>
		<th></th>
		<th><a href="{{url('product/manage/')}}" class="btn btn-info"><span class="glyphicon glyphicon-chevron-left"></span>Back To Manage</a></th>
	</tr>
</table>
 <!-- /Page Content -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection