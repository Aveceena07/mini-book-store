<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    </style>
</head>

<body>
    @include('components.sidebar')

    <div class="container mx-auto px-4 py-6">
        <a href="{{ route('categories.create') }}"
            class="plus text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            <i class="fa-solid fa-plus"></i>
        </a>
        <br><br>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="py-2 px-4 border-b">No</th>
                        <th class="py-2 px-4 border-b">Nama</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td> <!-- Nomor urut -->
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category) }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                <i class="fa-solid fa-edit"></i>
                            </a>

                            <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                    onclick="return confirm('Are you sure you want to delete this category?');">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>