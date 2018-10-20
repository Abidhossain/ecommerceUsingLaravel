@extends('admin.master')


@section('dashboardContent')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 col-lg-8">
                    <h1 class="page-header">Add Manufacturer</h1>
                    <h4 class="text-success">
                            {{Session::get('massage')}}
                    </h4>

{!! Form::open(['url' =>'/manufacturer/update', 'method' => 'POST', 'name'=>'manufacturer']) !!}
<div class="panel panel-success">
        
    <div class="panel-body"> 
    <div class="form-group">
            <div class="input-group has-success col-md-12">  
                    <label for="catname">Manufacturer Name</label>
                    <input type="text" id="catname" name="manufacturerName" class="form-control" value="{{$manufacturer->manufacturerName}}" >
                    <input type="hidden" name="id" value="{{$manufacturer->id}}"> 
            </div>      
            <strong class="text-danger">{{$errors->has('manufacturerName') ? $errors->first('manufacturerName'): "" }}</strong>
    </div>
        <div class="form-group">
            <div class="input-group has-success col-md-12">  
                    <label for="manufacturerDescription">Manufacturer Description</label>
                    <textarea name="manufacturerDescription" id="catdescription" cols="16" rows="4"  class="form-control">{{$manufacturer->manufacturerDescription}}
                    </textarea>  
            </div>     
            <strong class="text-danger">{{$errors->has('manufacturerDescription') ? $errors->first('manufacturerDescription'): "" }}</strong> 
    </div>     
    <div class="form-group">
            <div class="input-group has-success col-md-12"> 
                <label for="status">Manufacturer Status</label>
                <select id="status" name="publicationStatus"  class="form-control">
                        <option>Select Manufacturer </option>
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option> 
                        </select>
            </div>
        </div> 
           <input type="submit" name="submit" class="btn btn-success" value="Save Manufacturer Info">
        {!! Form::close() !!}
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <script type="text/javascript">
        document.forms['manufacturer'].elements['manufacturerStatus'].value={{$manufacturer->manufacturerStatus}}
    </script>
@endsection

