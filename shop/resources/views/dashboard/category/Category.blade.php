@extends('layouts.dashboard')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-3"></div>
            <div class="shadow col p-3">
                <strong>Categories</strong>
                <hr>
                <small><strong>Add Category</strong></small>
                <form action="/category" class="form-row" method="post">
                    @csrf
                    <input type="text" name="category_name" id="category_name" class="col-6 form-control-sm form-control">
                    <button type="submit" class="btn btn-sm btn-primary ml-2"> Add <i class="fas fa-arrow-circle-down"></i>
                    </button>
                </form>
                <hr>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->category_name }}</td>
                                <td><form onsubmit="return confirm('Want to delete {{$category->category_name}} \nAre you sure? ')" action="/category/{{$category->id}}" method="post">
                                    @csrf 
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm"><i class="fas fa-trash"></i></button>
                                </form></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-3"></div>

        </div>

    </div>
@endsection
