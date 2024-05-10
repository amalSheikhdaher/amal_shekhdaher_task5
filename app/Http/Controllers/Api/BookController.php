<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::latest()->get();
        
        if (is_null($books->first())) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No book found!',
            ], 200);
        }

        $response = [
            'status' => 'success',
            'message' => 'Books are retrieved successfully.',
            'data' => $books,
        ];

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:250',
            'description' => 'required|string|'
        ]);

        if($validate->fails()){  
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 403);    
        }

        $book = Book::create($request->all());

        $response = [
            'status' => 'success',
            'message' => 'Book is added successfully.',
            'data' => $book,
        ];

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::find($id);
  
        if (is_null($book)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Book is not found!',
            ], 200);
        }

        $response = [
            'status' => 'success',
            'message' => 'Book is retrieved successfully.',
            'data' => $book,
        ];
        
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        if($validate->fails()){  
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 403);
        }

        $book = Book::find($id);

        if (is_null($book)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Book is not found!',
            ], 200);
        }

        $book->update($request->all());
        
        $response = [
            'status' => 'success',
            'message' => 'Book is updated successfully.',
            'data' => $book,
        ];

        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::find($id);
  
        if (is_null($book)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Book is not found!',
            ], 200);
        }

        Book::destroy($id);
        return response()->json([
            'status' => 'success',
            'message' => 'Book is deleted successfully.'
            ], 200);
    }

    /**
     * Search by a Book name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        $books = Book::where('name', 'like', '%'.$name.'%')
            ->latest()->get();

        if (is_null($books->first())) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No book found!',
            ], 200);
        }

        $response = [
            'status' => 'success',
            'message' => 'Books are retrieved successfully.',
            'data' => $books,
        ];

        return response()->json($response, 200);
    }
}