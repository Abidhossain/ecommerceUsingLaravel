<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
use DB;

class ManufacturerController extends Controller
{ 

    
    public function createManufacturer()
    {
        return view('admin.manufacturer.createManufacturer');
    }

    
    public function storeManufacturer(Request $request)
    {
       $this->validate($request, [
            'manufacturerName' => 'required',
            'manufacturerDescription' => 'required' 
        ]);
        $data = array();
        $data = array(
                    'manufacturerName' => $request->manufacturerName,
                    'manufacturerDescription' => $request->manufacturerDescription,
                    'publicationStatus' => $request->publicationStatus, 
                    ); 
        DB::table('manufacturers')->insert($data);
        return redirect('/manufacturer/add')->with('massage','Manufacturer Created Successfully');       
    }

   
    public function manageManufacturer()
    {
       $manufacturer = Manufacturer::orderBy('id','DESC')->get();
       return view('admin.manufacturer.manageManufacturer', ['manufacturers' => $manufacturer ]);
    }

   
    public function editManufacturer($id)
    {
        $manufacturer = Manufacturer::where('id',$id)->first();
        return view('admin.manufacturer.editManufacturer',compact('manufacturer'));
    }

   
    public function updateManufacturer(Request $request)
    {
       $manufacturer = Manufacturer::find($request->id);
       $manufacturer->manufacturerName = $request->manufacturerName;
       $manufacturer->manufacturerDescription = $request->manufacturerDescription;
       $manufacturer->publicationStatus = $request->publicationStatus;
       $manufacturer->save();
       return redirect('manufacturer/manage')->with('msg','Manufacturer Updated');
    }

    
    public function destroyManufacturer($id)
    { 
       DB::table('manufacturers')->delete($id);
       return redirect('/manufacturer/manage');
    }
}
