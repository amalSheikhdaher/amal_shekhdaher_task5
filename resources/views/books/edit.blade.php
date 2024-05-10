@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Book
                </div>
                <div class="float-end">
                    <a href="{{ route('books.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('books.update', $book->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $book->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="author" class="col-md-4 col-form-label text-md-end text-start">Author</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ $book->author }}">
                            @if ($errors->has('author'))
                                <span class="text-danger">{{ $errors->first('author') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="category" class="col-md-4 col-form-label text-md-end text-start">Category</label>
                        <div class="col-md-6">
                        <select class="form-control @error('category_id') isinvalid @enderror " name="category_id">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                @if ($category->id == $book->category_id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="published" class="col-md-4 col-form-label text-md-end text-start">Published</label>
                        <div class="col-md-6">
                          <input type="year" class="form-control @error('published') is-invalid @enderror" id="published" name="published" value="{{ $book->published }}">
                            @if ($errors->has('published'))
                                <span class="text-danger">{{ $errors->first('published') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="pages" class="col-md-4 col-form-label text-md-end text-start">Pages</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('pages') is-invalid @enderror" id="pages" name="pages" value="{{ $book->pages) }}">
                            @if ($errors->has('pages'))
                                <span class="text-danger">{{ $errors->first('pages') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $product->description }}</textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection