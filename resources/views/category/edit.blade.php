@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputName">category</label>
                    <input type="text" name="category" class="form-control" id="inputName" placeholder="Category" value="{{ $category->category }}">
                    @if ($errors->has('category'))
                        <span class="help-block">
                    <strong class="text-danger">
                    {{ $errors->first('category') }}
                    </strong>
                </span>
                    @endif
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
                    <label for="inputDescription">Description</label>
                    <textarea name="description" id="inputDescription" cols="30" rows="10" class="form-control">{{ $category->description }}</textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                    <strong class="text-danger">
                    {{ $errors->first('description') }}
                    </strong>
                </span>
                    @endif
                </div>

                {{ csrf_field() }}

                <input type="hidden" name="_method" value="patch">

                <button type="submit" class="btn btn-info">UPDATE</button>
            </form>
        </div>
        <div class="col-md-6"></div>
    </div>

@endsection