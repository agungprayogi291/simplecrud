@extends('layouts.app')
@section('title','product')
@section('content')
<div>
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
</div>
<div class="d-flex justify-content-end mb-4">
    <a href="{{route('product.create')}}" class="btn-primary px-2 py-2 rounded-circle">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>   
    </a>
</div>
<div >
<table class="table table-bordered table-hover  ">
        <thead class="bg-light">
            <tr>
                <th>Produk Name</th>
                <th>price</th>
                <th>quantity</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->product_name}}</td>
                <td>{{$product->product_price}}</td>
                <td>{{$product->product_qty}}</td>
                <td class="text-center"><a href="{{route('product.edit',Crypt::Encrypt($product->id))}}" class="px-4 btn btn-primary">edit</a>
                <form action="{{route('product.destroy',Crypt::Encrypt($product->id))}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit"  class="btn btn-danger">remove</button>
                </form></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
@endsection