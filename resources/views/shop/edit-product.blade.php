@extends('layouts.master')

@section('title')
ADMIN - Edit Product - Alchemortem
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>ADMIN - Edit Product</h1>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        @if (\Session::has('success'))
          <div class="alert alert-success">
              <p>{{ \Session::get('success') }}</p>
          </div><br />
          @endif
        <form method="post" action="{{action('ProductController@updateProduct', $id)}}" >
            {{csrf_field()}}
            {{ method_field('PATCH') }}
            <input name="_method" type="hidden" value="PATCH">
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" value="{{$product->productName}}" name="productName" class="form-control">
            </div>
            <div class="form-group">
                <label for="image1">Image 1 (Imgur.com direct link for image)</label>
                <input type="text" value="{{$product->image1}}" name="image1" class="form-control">
            </div>
            <div class="form-group">
                <label for="image2">Image 2</label>
                <input type="text" value="{{$product->image2}}" name="image2" class="form-control">
            </div>
            <div class="form-group">
                <label for="image3">Image 3 (optional)</label>
                <input type="text" value="{{$product->image3}}" name="image3" class="form-control">
            </div>
            <div class="form-group">
                <label for="image4">Image 4 (optional)</label>
                <input type="text" value="{{$product->image4}}" name="image4" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="textbox" value="{{$product->description}}" name="description" class="form-control">
            </div>
            <div class="form-group">
                <label for="materials">Materials</label>
                <input type="text" value="{{$product->materials}}" name="materials" class="form-control">
            </div>
            <div class="form-group">
                <label for="dimensions">Dimensions (mm or in)</label>
                <input type="text" value="{{$product->dimensions}}" name="dimensions" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" value="{{$product->category}}" name="category" class="form-control">
            </div>
            <div class="form-group">
                <label for="price">Price (number only)</label>
                <input type="text" value="{{$product->price}}" name="price" class="form-control">
            </div>
            <div class="form-group">
                <label for="status">Status (available or sold)</label>
                <input type="text" value="{{$product->status}}" name="status" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection