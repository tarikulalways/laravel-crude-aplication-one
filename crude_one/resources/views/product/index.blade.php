@extends('master')
@section('title', 'all-product-page')

@section('content')
    <div class="row">
        <div class="col-10 my-3">
            <table class="table table-bordered table-hover table-responsive">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">slug</th>
                    <th scope="col">CategoryName</th>
                    <th scope="col">SubCategoryName</th>
                    <th scope="col">ProductImage</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Create_at</th>
                    <th scope="col">Update_at</th>
                    <th class="text-center" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                  <tr>
                    <th>{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->slug }}</td>
                    <td>{{ $product->category->name  }}</td>
                    <td>{{ $product->subcategory->name }}</td>
                    <td>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('product-img/'.$product->image) }}" alt="Card image cap">
                          </div>
                    </td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        @if ($product->is_active)
                            {{ 'Active' }}
                            @else{{ 'InActive' }}
                        @endif
                    </td>
                    <td>{{ $product->created_at->diffForHumans() }}</td>
                    <td>{{ $product->updated_at->diffForHumans() }}</td>
                    <td>
                        <a href="" class="btn btn-success">Edit</a>
                        <a href="" class="btn btn-info">Show</a>
                        <a href="" class="btn btn-danger" onclick="alert('Are Sure Delete Data?')">Delete</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
