@extends('app')

@section('content')

<div class="container-fluid">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-8">
            @if (session('status'))
                <div class="alert alert-success">
                    <p>{{ session('status') }}</p>
                </div>
            @endif
            <div class="float-end mt-5 mb-4">
                <a href="{{ route('product.add') }}" style="width:30px; height:20px; padding:7px; background-color:green; text-decoration:none; color:white">Add Product</a>
            </div>
            <table class="table border">
                <tr>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Description</th>
                </tr>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->p_id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->description }}</td>
                    <td><a href="{{ '/product/'.$product->id.'/update' }}" style="width:30px; height:20px; padding:5px; background-color:darkcyan; text-decoration:none; color:white">Update</a></td> 
                    <td><a href="{{ '/product/'.$product->id.'/delete' }}" style="width:30px; height:20px; padding:5px; background-color:crimson; text-decoration:none; color:white">Delete</a></td>                 
                </tr>
                
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection