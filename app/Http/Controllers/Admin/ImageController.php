<?php

namespace App\Http\Controllers\Admin;
use App\http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //
    public function index($id)
    {
        $product = Product::find($id);
        $images =$product->images()->orderBy('featured','desc')->get();
        return view('admin.products.images.index')->with(compact('product','images'));
    }

    public function store(Request $request, $id)
    {
        //validar
        
       //guardar imagen en nuestro proyecto
       $file=$request->file('foto');
       $path= public_path().'/images/products';
       $fileName=uniqid().$file->getClientOriginalName();
       $moved = $file->move($path,$fileName);
       
       //crear q registro en la bd, tabla product_image
       if($moved){
           $productImage=  new ProductImage();
       $productImage -> image = $fileName;
        //$productImage -> featured = ;
       $productImage -> product_id = $id;
       $productImage -> save(); //Inserta imagen en la bd 
       }
       return back();
    }

    public function destroy( Request $request, $id)
    {
        //eliminar el archivo
        $productImage = ProductImage::find($request->image_id);
        if(substr($productImage->image ,0,4) === "http"){
                $deleted=true;
        } else {
               $fullPath = public_path().'/images/products/'.$productImage->image;
               $deleted = File::delete($fullPath);
        }
        //eliminar el registro en la bd
        if($deleted ){
            $productImage->delete();
        }
        return back();
    }

    public function select($id,$image){

        ProductImage::where('product_id',$id)->update([
            'featured'=> false
        ]);

        $productImage = ProductImage::find($image);
        $productImage->featured= true;
        $productImage->save();
        return back();
    }
}
