@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Book Information
                </div>
                <div class="float-end">
                    <a href="{{ route('books.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $book->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="author" class="col-md-4 col-form-label text-md-end text-start"><strong>Author:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $book->author }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="category" class="col-md-4 col-form-label text-md-end text-start"><strong>Category:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $book->category->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="published" class="col-md-4 col-form-label text-md-end text-start"><strong>Published:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $book->published }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="pages" class="col-md-4 col-form-label text-md-end text-start"><strong>Pages:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $book->pages }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Description:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $book->description }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection