@extends('layouts.app')
@section('title', 'Products Edit')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Create a New Category
                </div>
                <div class="card-body">
                    <form action="{{route('category.update', $data->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="text" class="form-control @error('category_name') is-invalid @enderror"
                                placeholder="Category Name" name="category_name" value="{{$data->category_name}}">
                            @error('category_name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary my-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
