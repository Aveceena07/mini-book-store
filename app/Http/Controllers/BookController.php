<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('category')->get();
        $categories = Category::all(); // Fetch all categories
        return view('books.index', compact('books', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // Jika ada kategori yang diperlukan
        return view('books.create', compact('categories')); // Pastikan view sesuai
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request
                ->file('image_path')
                ->store('covers', 'public');
        }

        Book::create(
            array_merge($request->all(), ['image_path' => $imagePath])
        );

        return redirect()
            ->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $book->image_path; // Mengambil image yang sudah ada
        if ($request->hasFile('image_path')) {
            // Hapus gambar lama jika ada
            if ($imagePath) {
                \Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request
                ->file('image_path')
                ->store('covers', 'public');
        }

        $book->update(
            array_merge($request->all(), ['image_path' => $imagePath])
        );

        return redirect()
            ->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        // Hapus cover image jika ada
        if ($book->image_path) {
            \Storage::disk('public')->delete($book->image_path);
        }
        $book->delete();
        return redirect()
            ->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }

    // BookController.php
    public function search(Request $request)
    {
        $query = $request->input('query'); // Mengambil input pencarian
        $books = Book::with('category')
            ->whereHas('category', function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            })
            ->get();

        return view('books.index', compact('books')); // Mengembalikan view dengan data buku
    }
}