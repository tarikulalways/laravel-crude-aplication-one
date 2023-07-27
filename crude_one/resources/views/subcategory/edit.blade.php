@extends('master')
@section('title', 'Edit Sub Category')
@section('content')
    <div class="row">
        <div class="col-md-6 m-auto py-4">
            <h1>{{ 'Edit Sub Category' }}</h1>
            <hr>
            <div class="my-3">
                <div class="card">
                    <div class="card-header">{{ 'Edit Sub Category' }}</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('update.subcategory', ['subCategory' => $subCategory->id]) }}">
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
                                    class="form-control" value="{{ $subCategory->name }}">
                                @error('subcaregory_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-check my-3">
                                <input type="checkbox" @if($subCategory->is_active) checked @endif class="form-check-input" id="is_active" name="is_active">

                                <label class="form-check-label" for="is_active">IsActive/InActive</label>
                            </div>
                            <button type="submit" class="btn btn-success">Update SubCategory</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
