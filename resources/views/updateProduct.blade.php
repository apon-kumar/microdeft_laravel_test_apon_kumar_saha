@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-4">
            <form action="{{ '/product/'.$product->id.'/edit' }}" method="post" class="border rounded bg-secondary-subtle">
                @csrf
                <h2 class="m-2">Update Product</h2>
                @if (session('status'))
                    <div class="alert alert-success m-2">
                        <p>{{ session('status') }}</p>
                    </div>
                @endif
                <div class="mb-3 mx-2">
                    <label for="p_name">Product Name</label>
                    <input type="text" id="p_name" name="p_name" value="{{ $product->name }}" class="form-control">
                    @if($errors->has('p_name'))
                    <p class="text-danger">{{ $errors->first('p_name') }}</p>
                    @endif
                </div>
                <div class="mb-3 mx-2">
                    <label for="p_id">Product ID</label>
                    <input type="text" id="p_id" name="p_id" value="{{ $product->p_id }}" class="form-control">
                    @if($errors->has('p_id'))
                    <p class="text-danger">{{ $errors->first('p_id') }}</p>
                    @endif
                </div>
                <div class="mb-3 mx-2">
                    <label for="p_quantity">Quantity</label>
                    <input type="number" id="p_quantity" name="p_quantity" value="{{ $product->quantity }}" class="form-control">
                    @if($errors->has('p_quantity'))
                    <p class="text-danger">{{ $errors->first('p_quantity') }}</p>
                    @endif
                </div>
                <div class="mb-3 mx-2">
                    <label for="p_id">Product Description</label>
                    <input type="text" id="p_description" name="p_description" value="{{ $product->description }}" class="form-control">
                    @if($errors->has('p_description'))
                    <p class="text-danger">{{ $errors->first('p_description') }}</p>
                    @endif
                </div>
                <div class="mb-3 mx-2 d-flex justify-content-center">
                    <input type="submit" value="UPDATE" class="btn btn-primary w-100">
                </div>
            </form>                
        </div>
    </div>
</div>   
@endsection