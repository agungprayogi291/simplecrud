@extends('layouts.app')
@section('title','product-new')
@section('content')
<div class="card col-md-8  m-auto">
        <div class="card-header">
            Porduct-Update
        </div>
        <div class="body p-4">
            <form action="{{route('product.store')}}" class="form p-2 lh-lg" method="post">
                @csrf
                <div class="form-group ">
                    <label for="product_name" class="text-secondary form-control border-0">product name</label>
                    <input type="text" name="product_name"  class="form-control">
                </div>
                <div class="form-group ">
                    <label for="product_price" class="form-control text-secondary border-0">product price</label>
                    <input type="number" name="product_price"  class="form-control" >
                </div>
                <div class="form-group">
                    <label for="product_quantity" class="form-control text-secondary border-0">quantity</label>
                    <input type="number" name="product_qty"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="category" class="form-control text-secondary border-0">product category</label>
                    <select name="category_id" id="category" class="form-select">
                        
                        @foreach($categories as $category)
                        <option value="{{Crypt::Encrypt($category->id)}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary btn-md px-4 py-1">Save</button>
            </form>
        </div>
    </div>
@endsection