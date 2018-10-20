<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;
class CategoryController extends Controller
{  
    
    public function createCategory()
    { 
        return view('admin.category.createCategory');
    }
   
    public function storeCategory(Request $request)
    { 
        $this->validate($request, [
            'categoryName' => 'required',
            'categoryDescription' => 'required'
        ]);
        //Insert With Query Builders

        // DB::table('categories')->insert([
        //     'categoryName'         =>$request->categoryName,
        //     'categoryDescription'  =>$request->categoryDescription,  
        //     'publicationStatus'    =>$request->publicationStatus  
        // ]);
        // return "Category Saved Successfully";

        //Insert With Eloquent ORM
        // $category = new Category();
        // $category->categoryName        = $request->categoryName;
        // $category->categoryDescription = $request->categoryDescription;
        // $category->publicationStatus   = $request->publicationStatus;
        // $category->save(); 

        

        Category::create($request->all());
        return redirect('/category/add')->with('massage','Category Added Successfully');
    }
 
    public function manageCategory()
    {
       $categories = Category::orderBy('id','DESC')->get();
       return view('admin.category.manageCategory', ['categories' => $categories ]);
    }
 
    public function editCategory($id)
    {
        $category= Category::where('id',$id)->first();
        return view('admin.category.editCategory',compact('category'));
    }
 
    public function updateCategory(Request $request)
    {
       $category = Category::find($request->categoryId);
       $category->categoryName = $request->categoryName;
       $category->categoryDescription = $request->categoryDescription;
       $category->publicationStatus = $request->publicationStatus;
       $category->update();
       return redirect('category/manage')->with('msg','Category Updated');
    }
 
    public function destroyCategory($id)
    {
        DB::table('categories')->delete($id);
        return redirect('category/manage');
    }
}
