<!-- resources/views/books/search.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Books by Category</title>
    <style>
    /* Add your styles here */
    </style>
</head>

<body>
    @include('components.sidebar')

    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-bold">Search Books by Category</h2>

        <form action="{{ route('books.search') }}" method="GET">
            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Select Category</label>
                <select name="category_id" id="category_id"
                    class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Search</button>
        </form>


        @if(isset($books) && count($books) > 0)
        <h3 class="text-xl font-semibold mt-6">Search Results:</h3>
        <table class="min-w-full bg-white border border-gray-300 mt-4">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Title</th>
                    <th class="py-2 px-4 border-b">Author</th>
                    <th class="py-2 px-4 border-b">Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->category->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        @if(isset($books))
        <p>No books found for the selected category.</p>
        @endif
        @endif
    </div>
</body>

</html>