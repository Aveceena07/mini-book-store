<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</head>

<body>
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-bold mb-4">Edit Book</h2>

        <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title"
                    class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md" value="{{ $book->title }}"
                    required>
            </div>

            <div class="mb-4">
                <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                <input type="text" name="author" id="author"
                    class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md" value="{{ $book->author }}"
                    required>
            </div>

            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category_id" id="category_id"
                    class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>


            <div class="mb-4">
                <label for="image_path" class="block text-sm font-medium text-gray-700">Book Cover (optional)</label>
                <input type="file" name="image_path" id="image_path"
                    class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md">
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">Create</button>
        </form>
    </div>
</body>

</html>