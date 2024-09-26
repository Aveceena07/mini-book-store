<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<style>
table {
    width: 80%;
    margin: 0;
    margin-left: 15%;
    border-collapse: collapse;
    /* Menggabungkan border untuk rata */
}

th,
td {
    padding: 12px;
    /* Padding yang sama untuk th dan td */
    text-align: left;
    /* Align text ke kiri */
    border-bottom: 1px solid #ddd;
    /* Menambahkan garis bawah */
}

.plus {
    margin-left: 15%;
}

th {
    background-color: #f3f4f6;
    /* Background untuk header */
    color: #374151;
    /* Warna teks untuk header */
}

img {
    width: 50px;
    /* Atur ukuran gambar di tabel */
    height: auto;
}
</style>

<body>
    @include('components.sidebar')

    <div class="container mx-auto px-4 py-6">
        <a href="{{ route('books.create') }}"
            class="plus text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            <i class="fa-solid fa-plus"></i>
        </a>
        <form class="plus mt-5" action="{{ route('books.search') }}" method="GET" class="mb-4">
            <input type="text" name="query" placeholder="Cari berdasarkan kategori..." class="p-2 border rounded">
            <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded">Cari</button>
        </form>

        <br><br>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Title</th>
                    <th class="py-2 px-4 border-b">Authssor</th>
                    <th class="py-2 px-4 border-b">Category</th>
                    <th class="py-2 px-4 border-b">Image</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>
                        @if ($book->image_path)
                        <img src="{{ asset('storage/' . $book->image_path) }}" alt="Book Cover">
                        @else
                        No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('books.edit', $book) }}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            <i class="fa-solid fa-edit"></i>
                        </a>

                        <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                onclick="return confirm('Are you sure you want to delete this books?');">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>