<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class EcomController extends Controller
{ 
    public function index()
    {
      $allProduct = Product::where('publicationStatus',1)->get();
      return view('layouts.home.homeContent',compact('allProduct'));
    }
    public function category($id)
    { 
      $publishedCategoryProduct = Product::where('categoryId',$id)
                                           ->where('publicationStatus',1)
                                           ->get();
      return view('layouts.category.categoryContent',compact('publishedCategoryProduct'));
    }
    public function contact()
    {
      return view('layouts.contact.contactContent');
    }
    public function productDetails($id)
    {
      $singeProduct = Product::where('id',$id)->first();
      return view('layouts.productDetails.productContent',compact('singeProduct'));
    }  
}
