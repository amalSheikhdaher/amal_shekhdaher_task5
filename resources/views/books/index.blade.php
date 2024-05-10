@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Book List</div>
    <div class="card-body">
        @can('create-book')
            <a href="{{ route('books.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Book</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Name</th>
                <th scope="col">Author</th>
                <th scope="col">Category</th>
                <th scope="col">Published</th>
                <th scope="col">Pages</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>{{ $book->published }}</td>
                    <td>{{ $book->pages }}</td>
                    <td>{{ $book->description }}</td>
                    <td>
                        <form action="{{ route('books.destroy', $book->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-book')
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-book')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this book?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No Book Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $books->links() }}

    </div>
</div>
@endsection