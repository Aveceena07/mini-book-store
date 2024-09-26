<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Register</title>
</head>

<body class="bg-gray-200 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-bold mb-6">Register</h2>
        @if(session('success'))
        <div class="mb-4 text-green-500">{{ session('success') }}</div>
        @endif
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block mb-1">Name</label>
                <input type="text" name="name" id="name" class="border rounded w-full p-2" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-1">Email</label>
                <input type="email" name="email" id="email" class="border rounded w-full p-2" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-1">Password</label>
                <input type="password" name="password" id="password" class="border rounded w-full p-2" required>
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="border rounded w-full p-2" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white rounded w-full p-2">Register</button>
        </form>
        <p class="mt-4">Already have an account? <a href="{{ route('login') }}" class="text-blue-500">Login</a></p>
    </div>
</body>

</html>