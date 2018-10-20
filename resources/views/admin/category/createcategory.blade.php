@extends('admin.master')


@section('dashboardContent')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 col-lg-8">
                    <h1 class="page-header">Add Category</h1>
                    <h4 class="text-success">
                            {{Session::get('massage')}}
                    </h4>

{!! Form::open(['url' =>'/category/save', 'method' => 'POST']) !!}
<div class="panel panel-success">
        
    <div class="panel-body"> 
    <div class="form-group">
            <div class="input-group has-success col-md-12">  
                    <label for="catname">Category Name</label>
                    <input type="text" id="catname" name="categoryName" class="form-control" placeholder="Enter Category Name" > 
            </div>      
            <strong class="text-danger">{{$errors->has('categoryName') ? $errors->first('categoryName'): "" }}</strong>
    </div>
        <div class="form-group">
            <div class="input-group has-success col-md-12">  
                    <label for="catdescription">Category Description</label>
                    <textarea name="categoryDescription" id="catdescription" cols="16" rows="4"  class="form-control" placeholder="Category Description" ></textarea>  
            </div>     
            <strong class="text-danger">{{$errors->has('categoryDescription') ? $errors->first('categoryDescription'): "" }}</strong> 
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
           <input type="submit" name="submit" class="btn btn-success" value="Save Category Info">
        {!! Form::close() !!}
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection

