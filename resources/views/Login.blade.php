<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<html class="h-full bg-white"> <!-- Ubah dari bg-gray-900 ke bg-gray-100 -->

<body class="h-full">
    <div class="flex min-h-screen">
        <!-- Left: Login Form -->
        <div class="flex flex-col justify-center flex-1 bg-white px-8 py-12 sm:px-16 lg:px-8 xl:px-12">
            <div class="mx-auto w-full max-w-sm">
                <img src="{{ asset('image/logo.png') }}" alt="Universitas Palangka Raya" class="mx-auto h-20 w-auto mb-4" />
                <h2 class="text-center text-2xl font-bold tracking-tight text-gray-900 mb-8">Log In as Admin</h2>
                <form action="#" method="POST" class="space-y-6">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <div class="mt-2">
                            <input type="text"
                                name="username"
                                :value="old('username')"
                                required autofocus
                                id="username"
                                class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:border-green-600 focus:ring-green-600 sm:text-sm" />
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="mt-2">
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:border-green-600 focus:ring-green-600 sm:text-sm" />
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white hover:bg-green-500 focus-visible:outline-offset-2 focus-visible:outline-green-600 transition">
                            Sign in
                        </button>
                    </div>
                </form>
                <p class="mt-8 text-center text-sm text-gray-500">
                    Bukan admin?
                    <a href="/" class="font-semibold text-green-600 hover:text-green-500">Kembali ke beranda</a>
                </p>
            </div>
        </div>
        <!-- Right: Image -->
        <div class="hidden lg:flex xl:flex-3 lg:flex-2 items-center justify-center bg-green-50">
            <img src="image/hero.jpg" alt="Rektorat Universitas Palangka Raya" class="object-cover w-full h-full max-h-screen" />
        </div>
    </div>
</body>

</html>