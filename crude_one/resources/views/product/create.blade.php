@extends('master')
@section('title', 'Product-page!')
@section('content')
    <div class="row">
        <div class="col-8 m-auto my-5">
            @if (session()->has('store'))
                <div class="alert alert-success">{{ session('store') }}</div>
            @endif
            <a href="{{ route('index.product') }}" class="btn btn-success">All Product</a>
            <div class="card">
                <div class="card-header">
                    {{ 'Add New Product' }}
                </div>
                <div class="card-body">
                    <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="category_name" class="form-labe">Category Name</label>
                            <select name="category_name" class="form-select" >
                                @foreach ($categories as $category)

                                <option value="{{ $category->id }}">{{ $category->name }}</option>

                                @endforeach
                              </select>
                              @error('category_name')
                                <p class="text-danger">{{ $message }}</p>
                              @enderror
                        </div>

                        <div class="mb-3">
                            <label for="subcategory_name" class="form-labe">SubCategory Name</label>
                            <select name="subcategory_name" class="form-select" >
                                @foreach ($subcategories as $subcategory)

                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>

                                @endforeach
                              </select>
                              @error('subcategory_name')
                                <p class="text-danger">{{ $message }}</p>
                              @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" name="name" id="" class="form-control">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                              @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Product Price</label>
                            <input type="number" name="price" id="" class="form-control" min="0">
                            @error('price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Product Description</label>
                            <textarea name="description" id="" cols="" rows="5" class="form-control"></textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Product Image</label>
                            <input type="file" name="image" id="" class="form-control">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror()
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active">
                                <label class="form-check-label" for="is_active">
                                    IsActive/InActive
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Add new product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
