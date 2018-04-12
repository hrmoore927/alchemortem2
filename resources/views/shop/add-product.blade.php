@extends('layouts.account')

@section('title')
ADMIN - Add Product - Alchemortem
@endsection

@section('account-content')
<div class="row">
    <div class="col-md-12">
        <h2>ADMIN - Add Product</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <form action="{{ route('add-product') }}" method="post" id="add-product">
        <div class="form-group">
            <label for="productName">Product Name</label>
            <input type="text" id="productName" name="productName" class="form-control" value="{{ old('productName') }}">
        </div>
        <div class="form-group">
            <label for="image1">Image 1 (Imgur.com direct link for image)</label>
            <input type="text" id="image1" name="image1" class="form-control" value="{{ old('image1') }}">
        </div>
        <div class="form-group">
            <label for="image2">Image 2</label>
            <input type="text" id="image2" name="image2" class="form-control" value="{{ old('image2') }}">
        </div>
        <div class="form-group">
            <label for="image3">Image 3 (optional)</label>
            <input type="text" id="image3" name="image3" class="form-control" value="{{ old('image3') }}">
        </div>
        <div class="form-group">
            <label for="image4">Image 4 (optional)</label>
            <input type="text" id="image4" name="image4" class="form-control" value="{{ old('image4') }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" value="{{ old('description') }}"></textarea>
        </div>
        <div class="form-group">
            <label for="materials">Materials</label>
            <input type="text" id="materials" name="materials" class="form-control" value="{{ old('materials') }}">
        </div>
        <div class="form-group">
            <label for="dimensions">Dimensions (mm or in)</label>
            <input type="text" id="dimensions" name="dimensions" class="form-control" value="{{ old('dimensions') }}">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" id="category" name="category" class="form-control" value="{{ old('category') }}">
        </div>
        <div class="form-group">
            <label for="price">Price (number only)</label>
            <input type="text" id="price" name="price" class="form-control" value="{{ old('price') }}">
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
        {{ csrf_field() }}
    </form>
    </div>
</div>
@endsection