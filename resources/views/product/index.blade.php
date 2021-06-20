@extends('layouts.app')
@section('content')
<div>
    <h1>{{$title}}</h1>
</div>
    <table class="table table-bordered table-hover  ">
        <thead class="bg-light">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>sda</td>
                <td><a href="" class="text-info">edit</a>|<a href="" class="text-danger">remove</a></td>
            </tr>
        </tbody>
    </table>
@endsection