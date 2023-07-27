@extends('master')
@section('title', 'Category Page')
@section('content')
    <div class="row">
        <div class="col-md-6 m-auto py-4">
            <h1>{{ 'Create Category' }}</h1>
            <hr>
            <div class="my-3">
                @if(session()->has('store'))
                    <div class="alert alert-success">{{ session('store') }}</div>
                @endif
                <a href="{{ route('index.category') }}" class="btn btn-success">All Category</a>
                <div class="card">
                    <div class="card-header">{{ 'Create Category' }}</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('store.category') }}">
                            @csrf
                            <div class="form-group">
                                <label for="caregory_name">Category Name</label>
                                <input type="text" name="caregory_name" class="form-control"placeholder="Enter Category Name">
                                @error('caregory_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-check my-3">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active">
                                <label class="form-check-label" for="is_active">IsActive/InActive</label>
                            </div>
                            <button type="submit" class="btn btn-success">Add Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
