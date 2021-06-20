@extends('layouts.app')
@section('title', 'Products List')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">Category List</h4>
            </div>
            <div class="card-body">
                <a href="{{route('category.create')}}" class="my-2 btn btn-primary float-left">Create</a>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-light">
                            <tr>
                                <th>No</th>
                                <th>Category Name</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->category_name}}</td>
                                <td>
                                    <a href="{{route('category.edit', $item->id)}}"
                                        class="btn btn-primary my-2 mx-2">edit</a>
                                    <form action="{{route('category.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger my-2 mx-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
