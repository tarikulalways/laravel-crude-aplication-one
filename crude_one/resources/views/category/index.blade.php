@extends('master')
@section('title', 'All Category Page')
@section('content')
    <div class="row">
        <h1>{{ 'Edit Category' }}</h1>
        <hr>
        @if(session()->has('update'))
            <div class="alert alert-success">{{ session('update') }}</div>
            @elseif(session()->has('destroy'))
            <div class="alert alert-danger">{{ session('destroy') }}</div>
        @endif
        <div class="col-md-10 my-3 m-auto">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Updated_at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->slug }}</td>
                        <td>
                            @if ($item->is_active)
                                {{ 'Active' }}
                                @else{{ 'InActive' }}
                            @endif
                        </td>
                        <td>{{ $item->created_at->diffForHumans() }}</td>
                        <td>{{ $item->updated_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('edit.category', ['category' => $item->id]) }}" class="btn btn-success">Edit</a>
                            <a href="" class="btn btn-info">Show</a>
                            <a href="{{ route('destroy.category', ['category' => $item->id]) }}" class="btn btn-danger" onclick="alert('Are Your Delete Data?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
