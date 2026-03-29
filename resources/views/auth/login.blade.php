<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>
body {
    font-family: 'Poppins', sans-serif;
}
</style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-yellow-200 via-yellow-300 to-yellow-400 px-4">

<!-- Card -->
<div class="w-full max-w-md bg-white/90 backdrop-blur-md rounded-2xl shadow-xl p-6 sm:p-8 relative">

    <!-- Logo -->
    <div class="absolute -top-10 left-1/2 -translate-x-1/2">
        <div class="w-20 h-20 sm:w-24 sm:h-24 bg-yellow-500 rounded-full flex items-center justify-center border-4 border-white shadow-lg text-2xl sm:text-3xl">
            🍜
        </div>
    </div>

    <!-- Title -->
    <div class="text-center mt-10 mb-6">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-yellow-600 tracking-wide">
            Testy Food
        </h1>
        <p class="text-gray-500 text-sm sm:text-base mt-2">
            Selamat datang kembali
        </p>
    </div>

    <!-- FORM -->
    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

       <!-- EMAIL -->
<div>
    <label class="block text-sm font-medium text-gray-600 mb-2">
        Email
    </label>

    <input type="email" name="email" value="{{ old('email') }}"
        required autofocus
        placeholder="Masukkan email"
        class="w-full px-4 py-3 rounded-xl border-2 border-yellow-400 
        focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 
        outline-none transition text-sm bg-white">

    @error('email')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- PASSWORD -->
<div>
    <label class="block text-sm font-medium text-gray-600 mb-2">
        Password
    </label>

    <input type="password" name="password"
        required
        placeholder="Masukkan password"
        class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 
        focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 
        outline-none transition text-sm bg-white">

    @error('password')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
        <!-- Remember & Forgot -->
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 text-sm text-gray-600">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="remember" class="accent-yellow-500">
                Remember me
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-yellow-600 hover:underline">
                    Lupa password?
                </a>
            @endif
        </div>

        <!-- Button -->
        <button type="submit"
            class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-3 rounded-lg font-semibold shadow-md transition duration-200">
            Masuk
        </button>

    </form>

    <!-- Register -->
    <p class="text-sm text-gray-500 mt-6 text-center">
        Belum punya akun?
        <a href="{{ route('register') }}" class="text-yellow-600 font-semibold hover:underline">
            Daftar
        </a>
    </p>

</div>

</body>
</html>