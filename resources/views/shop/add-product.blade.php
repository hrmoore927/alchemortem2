@extends('layouts.account')

@section('title')
ADMIN - Add Product - Alchemortem
@endsection

@section('account-content')
    <h2>ADMIN - Add Product</h2>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form action="{{ route('add-product') }}" method="post" id="add-product">
        <div class="form-group">
            <label for="productName">Product Name</label>
            <input type="text" id="productName" name="productName" class="form-control">
        </div>
        <div class="form-group">
            <label for="image1">Image 1 (Imgur.com direct link for image)</label>
            <input type="text" id="image1" name="image1" class="form-control">
        </div>
        <div class="form-group">
            <label for="image2">Image 2</label>
            <input type="text" id="image2" name="image2" class="form-control">
        </div>
        <div class="form-group">
            <label for="image3">Image 3 (optional)</label>
            <input type="text" id="image3" name="image3" class="form-control">
        </div>
        <div class="form-group">
            <label for="image4">Image 4 (optional)</label>
            <input type="text" id="image4" name="image4" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="textbox" id="description" name="description" class="form-control">
        </div>
        <div class="form-group">
            <label for="materials">Materials</label>
            <input type="text" id="materials" name="materials" class="form-control">
        </div>
        <div class="form-group">
            <label for="dimensions">Dimensions (mm or in)</label>
            <input type="text" id="dimensions" name="dimensions" class="form-control">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" id="category" name="category" class="form-control">
        </div>
        <div class="form-group">
            <label for="price">Price (number only)</label>
            <input type="text" id="price" name="price" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
        {{ csrf_field() }}
    </form>
@endsection