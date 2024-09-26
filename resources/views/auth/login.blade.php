<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Login</title>
</head>

<body class="bg-gray-200 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-bold mb-6">Login</h2>
        @if($errors->any())
        <div class="mb-4 text-red-500">{{ $errors->first() }}</div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block mb-1">Email</label>
                <input type="email" name="email" id="email" class="border rounded w-full p-2" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-1">Password</label>
                <input type="password" name="password" id="password" class="border rounded w-full p-2" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white rounded w-full p-2">Login</button>
        </form>
        <p class="mt-4">Don't have an account? <a href="{{ route('register') }}" class="text-blue-500">Register</a></p>
    </div>
</body>

</html>