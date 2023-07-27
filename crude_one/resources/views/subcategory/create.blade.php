@extends('master')
@section('title', 'Sub Category')
@section('content')
    <div class="row">
        <div class="col-md-6 m-auto py-4">
            <h1>{{ 'Create Sub Category' }}</h1>
            <hr>
            <div class="my-3">
                @if (session()->has('store'))
                    <div class="alert alert-success">{{ session('store') }}</div>
                @endif
                <a href="{{ route('index.subcategory') }}" class="btn btn-success">All SubCategory</a>
                <div class="card">
                    <div class="card-header">{{ 'Create Sub Category' }}</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('store.subcategory') }}">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <select name="category_name" class="form-select">
                                    @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                  </select>
                                  @error('category_name')
                                    <p class="text-danger">{{ $message }}</p>
                                  @enderror
                            </div>
                            <div class="form-group">
                                <label for="subcaregory_name">Sub Category Name</label>
                                <input type="text" name="subcaregory_name"
                                    class="form-control"placeholder="Enter sub Category Name">
                                @error('subcaregory_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-check my-3">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active">
                                <label class="form-check-label" for="is_active">IsActive/InActive</label>
                            </div>
                            <button type="submit" class="btn btn-success">Add SubCategory</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
