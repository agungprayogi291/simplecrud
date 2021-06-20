<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('product.index',compact('products'));
    }
    public function requestForm()
    {
        $data = request()->validate([
            'product_name' => 'required',
            'product_price'=>'required',
            'product_qty' => 'required',
            'category_id' => 'required'
        ]);
        return $data;
    }
    public function create(){
        $categories = Category::all();
        return view('product.create',['categories'=>$categories]);
    }
    public function store()
    {
        $data = $this->requestForm();
        $data['category_id'] = Crypt::Decrypt($data['category_id']);
        Product::create($data);
        return redirect()->route('product.index')->with('success','new category');
    }
    public function edit($id)
    {
        $id = Crypt::Decrypt($id);
        $product = Product::findorfail($id);
        $categories = Category::all();
        return view('product.edit',compact('product'),['categories' => $categories]);
    }
    public function update($id)
    {
        $id = Crypt::Decrypt($id);
        $data =$this->requestForm();
        $data['category_id'] = Crypt::Decrypt($data['category_id']);
        Product::where(['id' => $id])->update($data);
        return redirect()->route('product.index')->with('success','product update success');
    }
    public function destroy($id)
    {
        $id = Crypt::Decrypt($id);
        Product::destroy($id);
        return redirect()->route('product.index')->with('success','deleting data success');
    }
}
