@extends('admin.master')
@section('dashboardContent')
<!-- Page Content -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row">
   <div class="col-md-2"></div>
   <div class="col-md-8 col-lg-8">
      <h1 class="page-header">Add Product</h1>
      <h4 class="text-success">
         {{Session::get('massage')}}
      </h4>
      {!! Form::open(['url' =>'/product/save', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
      <div class="panel panel-success">
         <div class="panel-body">
            <div class="form-group">
               <div class="input-group has-success col-md-12">  
                  <label for="catname">Product Name</label>
                  <input type="text" id="catname" name="productName" class="form-control" placeholder="Enter Product Name" > 
               </div>
               <strong class="text-danger">{{$errors->has('productName') ? $errors->first('productName'): "" }}</strong>
            </div>
             <div class="form-group">
               <div class="input-group has-success col-md-12">
                  <label for="status">Category Name</label>
                  <select id="status" name="categoryId"  class="form-control">
                     <option>Select Category </option>
                     @foreach($categories as $category)
                     <option value="{{$category->id}}">{{$category->categoryName}}</option> 
                     @endforeach
                  </select>
               </div>
            </div>
             <div class="form-group">
               <div class="input-group has-success col-md-12">
                  <label for="status">Manufacturer Name</label>
                  <select id="status" name="manufacturerId"  class="form-control">
                     <option>Select Manufacturer </option>
                     @foreach($manufacturers as $manufacturer)
                     <option value="{{$manufacturer->id}}">{{$manufacturer->manufacturerName}}</option> 
                     @endforeach
                  </select>
               </div>
            </div>
             <div class="form-group">
               <div class="input-group has-success col-md-12">  
                  <label for="catname">Product Price</label>
                  <input type="number" id="catname" name="productPrice" class="form-control" placeholder="Enter Product Price" > 
               </div>
               <strong class="text-danger">{{$errors->has('productPrice') ? $errors->first('productPrice'): "" }}</strong>
            </div> <div class="form-group">
               <div class="input-group has-success col-md-12">  
                  <label for="catname">Product Quantity</label>
                  <input type="number" id="catname" name="productQuantity" class="form-control" placeholder="Enter Product Quantity" > 
               </div>
               <strong class="text-danger">{{$errors->has('productQuantity') ? $errors->first('productQuantity'): "" }}</strong>
            </div> 
            <div class="form-group">
               <div class="input-group has-success col-md-12">  
                  <label for="manufacturerDescription">Product Short Description</label>
                  <textarea name="productShortDescription" id="catdescription" cols="16" rows="4"  class="form-control" placeholder="Enter Short Description" ></textarea>  
               </div>
               <strong class="text-danger">{{$errors->has('productShortDescription') ? $errors->first('productShortDescription'): "" }}</strong> 
            </div>
            <div class="form-group">
               <div class="input-group has-success col-md-12">  
                  <label for="manufacturerDescription">Product Long Description</label>
                  <textarea name="productLongDescription" id="catdescription" cols="16" rows="4"  class="form-control" placeholder="Enter Long Description" ></textarea>  
               </div>
               <strong class="text-danger">{{$errors->has('productLongDescription') ? $errors->first('productLongDescription'): "" }}</strong> 
            </div>
            <div class="form-group">
               <div class="input-group has-success col-md-12">  
                  <label for="catname">Product Image</label>
                  <input type="file" id="catname" name="productImage" class="form-control"> 
               </div>
               <strong class="text-danger">{{$errors->has('productImage') ? $errors->first('productImage'): "" }}</strong>
            </div>
            <div class="form-group">
               <div class="input-group has-success col-md-12"> 
               <label for="status">Publications Status</label>
               <select id="status" name="publicationStatus"  class="form-control">
                  <option>Select Publications </option>
                  <option value="1">Publish</option>
                  <option value="0">Unpublish</option> 
               </select>
               </div>
            </div> 

           
            <input type="submit" name="submit" class="btn btn-success" value="Save Product Info">
            {!! Form::close() !!}
         </div>
         <!-- /.col-lg-12 -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
@endsection