<!DOCTYPE html>
<html class="h-full bg-white">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full overflow-hidden">
    <div class="flex min-h-screen overflow-hidden">
        <!-- Left: Login Form -->
        <div class="flex flex-col isolate overflow-hidden justify-center flex-1 bg-white px-8 py-12 sm:px-16 lg:px-8 xl:px-12">
            <div aria-hidden="true" class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl">
                <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="aspect-1097/845 w-274.25 bg-linear-to-tr from-[#05ff4c] to-[#44b507] opacity-30"></div>
            </div>
            <div aria-hidden="true" class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:-top-112 sm:ml-16 sm:translate-x-0">
                <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="aspect-1097/845 w-274.25 bg-linear-to-tr from-[#05ff4c] to-[#44b507] opacity-40"></div>
            </div>
            <div class="mx-auto w-full max-w-sm">
                <img src="{{ asset('image/logo.png') }}" alt="Universitas Palangka Raya" class="mx-auto h-20 w-auto mb-4" />
                <h2 class="text-center text-2xl font-bold tracking-tight text-gray-900 mb-8">Log In as Admin</h2>

                <!-- SESSION STATUS -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- LOGIN FORM -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Username -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <div class="mt-2">
                            <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus autocomplete="username"
                                class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:border-green-600 focus:ring-green-600 sm:text-sm" />
                            @error('username')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="mt-2">
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:border-green-600 focus:ring-green-600 sm:text-sm" />
                            @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit -->
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
    </div>
</body>

</html>