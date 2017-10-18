@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="{{ url( '/dashboard/projects') }}" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" name="name" class="form-control" id="inputName" placeholder="Name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                    <strong class="text-danger">
                        {{ $errors->first('name') }}
                    </strong>
                </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="inputCategory">Category</label>
                    <select class="form-control" id="inputCategory" name="category_id">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputPreview">Preview</label>
                    <input type="file" class="form-control" id="inputPreview" placeholder="Prview" name="preview">
                    @if ($errors->has('preview'))
                        <span class="help-block">
                    <strong class="text-danger">
                        {{ $errors->first('preview') }}
                    </strong>
                </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="inputClient">Client</label>
                    <input type="text" class="form-control" id="inputClient" placeholder="Client" name="client" value="{{ old('client') }}">
                    @if ($errors->has('client'))
                        <span class="help-block">
                    <strong class="text-danger">
                        {{ $errors->first('client') }}
                    </strong>
                </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="inputDescription">Description</label>
                <textarea name="description" id="inputDescription" cols="30" rows="10" class="form-control">{{ old('description') }}
                </textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                    <strong class="text-danger">
                        {{ $errors->first('description') }}
                    </strong>
                </span>
                    @endif
                </div>

                {{ csrf_field() }}

                <button type="submit" class="btn btn-info">CREATE</button>
            </form>
        </div>
        <div class="col-md-6"></div>
    </div>

@endsection