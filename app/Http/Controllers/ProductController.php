<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category; 
use App\Manufacturer;
use App\Product;
use DB;

class ProductController extends Controller
{ 
   public function createProduct(){
   	$category = Category::where('publicationStatus','1')->orderBy('id','DESC')->get();
   	$manufacturer = Manufacturer::where('publicationStatus','1')->orderBy('id','DESC')->get();
   	return view('admin.product.createProduct',['categories'=>$category, 'manufacturers'=>$manufacturer]);
   }
   public function storeProduct(Request $request){
   	$this->validate($request,[
   		'productName' => 'required',
   		'categoryId' => 'required',
   		'manufacturerId' => 'required',
   		'productPrice' => 'required',
   		'productQuantity' => 'required',
   		'productShortDescription' => 'required',
   		'productLongDescription' => 'required',
   		'productImage' => 'required'
   		]);
   	$productImage=$request->file('productImage'); 
      $filetype=$productImage->getClientOriginalExtension();
      $fileName=rand(1,1000).date('dmyhis').".".$filetype;
   	$uploadPath='public/ProductImage/';
   	$productImage->move($uploadPath,$fileName);
   	$imageUrl= $uploadPath.$fileName; 
   	$this->saveProductInfo($request,$imageUrl);
   	return redirect('product/add/')->with('massage','Product Item Added Successfully');
   }
   protected function saveProductInfo($request, $imageUrl){
   	$data = array();
   	$data = array(
   		'productName' => $request->productName,
   		'categoryId' => $request->categoryId,
   		'manufacturerId' => $request->manufacturerId,
   		'productPrice' => $request->productPrice,
   		'productQuantity' => $request->productQuantity,
   		'productShortDescription' => $request->productShortDescription,
   		'productLongDescription' => $request->productLongDescription,
   		'productImage' => $imageUrl,
   		'publicationStatus' => $request->publicationStatus
   	); 
   	DB::table('products')->insert($data);
   }
   public function manageProduct(){
   		$product = DB::table('products')
   		->join('categories', 'products.categoryId', '=', 'categories.id')
   		->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
   		->select('products.*', 'categories.categoryName', 'manufacturers.manufacturerName')
        ->get(); 
	   	return view('admin.product.manageProduct',compact('product'));

   }

   public function viewProduct($id){
   		$singleProduct = DB::table('products')
   		->join('categories', 'products.categoryId', '=', 'categories.id')
   		->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
   		->select('products.*', 'categories.categoryName', 'manufacturers.manufacturerName')
   		->where('products.id',$id)
        ->first(); 
   		return view('admin.product.singleProduct',compact('singleProduct'));
   }
   public function editProduct($id){
		//$product = Product::where('id',$id)->first();
		$category = Category::where('publicationStatus','1')->get();
		$manufacturer = Manufacturer::where('publicationStatus','1')->get();
      $products = DB::table('products')->where('id', $id)->first();

		return view('admin.product.editProduct',['products'=>$products, 'categories'=>$category, 'manufacturers'=>$manufacturer]);
   }
   public function updateProduct(Request $request){
     $this->ifImageExists($request);
     return redirect('product/manage');
   }
   private function ifImageExists($request){
      $productById = Product::where('id',$request->id)->first();
   	$productImage = $request->file('productImage');
      if($productImage){ 
         unlink($productById->productImage);
         $filetype=$productImage->getClientOriginalExtension();
         $fileName=rand(1,1000).date('dmyhis').".".$filetype;
         $uploadPath='public/ProductImage/';
         $productImage->move($uploadPath,$fileName);
         $imageUrl= $uploadPath.$fileName; 
       $product = Product::find($request->id);
       $product->productName = $request->productName;
       $product->categoryId = $request->categoryId;
       $product->manufacturerId = $request->manufacturerId;
       $product->productPrice = $request->productPrice;
       $product->productQuantity = $request->productQuantity;
       $product->productShortDescription = $request->productShortDescription;
       $product->productLongDescription = $request->productLongDescription;
       $product->productImage = $imageUrl; 
       $product->publicationStatus = $request->publicationStatus; 
       $product->save();
      }else{
       $product = Product::find($request->id);
       $product->productName = $request->productName;
       $product->categoryId = $request->categoryId;
       $product->manufacturerId = $request->manufacturerId;
       $product->productPrice = $request->productPrice;
       $product->productQuantity = $request->productQuantity;
       $product->productShortDescription = $request->productShortDescription;
       $product->productLongDescription = $request->productLongDescription; 
       $product->publicationStatus = $request->publicationStatus;
       $product->save();
      } 
   }
   public function destroyProduct($id){
	 	DB::table('products')->delete($id);
	 	return redirect('/product/manage')->with('msg','Item Deleted Successfuly');  	
   }
}
