@extends('layouts.dashboard')

@section('content')
    <h1 class="page-header">Cathegories</h1>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/dashboard/category/create') }}" class="btn btn-success">ADD CATEGORY</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category as $categories)
                    <tr>
                    <td>{{ $categories->id }}</td>
                    <td>{{ $categories->category}}</td>
                    <td>{{ $categories->description }}</td>
                    <td>
                    <a href="/dashboard/category/{{ $categories->id }}/edit">
                    <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    </td>
                    <td>
                    <a href="#" onclick="event.preventDefault();
                    this.children[0].submit();">

                    <form action="{{ route('category.destroy', $categories->id) }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                    </form>
                    <i class="glyphicon glyphicon-remove"></i>
                    </a>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection