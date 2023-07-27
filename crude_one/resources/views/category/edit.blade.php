@extends('master')
@section('title', 'Edit Category Page')
@section('content')
    <div class="row">
        <div class="col-md-6 m-auto py-4">
            <h1>{{ 'Edit Category' }}</h1>
            <hr>
            @if (session()->has('update'))
                <div class="alert alert-success">{{ session('update') }}</div>
            @endif
            <div class="my-3">
                <div class="card">
                    <div class="card-header">{{ 'Edit Category' }}</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('update.category', ['category' => $category->id]) }}">
                            @csrf
                            <div class="form-group">
                                <label for="caregory_name">Category Name</label>
                                <input type="text" name="caregory_name" class="form-control" value="{{ $category->name }}">
                                @error('caregory_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-check my-3">
                                <input type="checkbox" @if($category->is_active) checked @endif class="form-check-input" id="is_active" name="is_active">
                                <label class="form-check-label" for="is_active">IsActive/InActive</label>
                            </div>
                            <button type="submit" class="btn btn-success">Edi Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
