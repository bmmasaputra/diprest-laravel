<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <x-Navbar title="DiPrest UPR"></x-Navbar>
    <div class="relative isolate overflow-hidden bg-white min-h-screen flex items-center py-24 sm:py-32">
        <!-- <img src="image/rektorat.png" alt="" class="absolute inset-0 -z-10 size-full object-cover object-right md:object-center" /> -->
        <div aria-hidden="true" class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl">
            <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="aspect-1097/845 w-274.25 bg-linear-to-tr from-[#05ff4c] to-[#44b507] opacity-30"></div>
        </div>
        <div aria-hidden="true" class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:-top-112 sm:ml-16 sm:translate-x-0">
            <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="aspect-1097/845 w-274.25 bg-linear-to-tr from-[#05ff4c] to-[#44b507] opacity-40"></div>
        </div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8 w-full">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-5xl font-semibold tracking-tight text-black sm:text-7xl">Statistik Prestasi UPR</h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">Berikut adalah statistik prestasi mahasiswa Universitas Palangka Raya yang telah diraih selama ini.</p>
            </div>
            <div class="mx-auto mt-10 max-w-4xl lg:max-w-6xl">
                <div class="grid justify-center items-center grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                    @foreach ($cards as $card)
                    <a href=" @if($card['title'] === 'Data Prestasi') {{ url('/data-prestasi') }} @elseif($card['title'] === 'Data Organisasi') {{ url('/data-organisasi') }} @elseif($card['title'] === 'Data Pertukaran Mahasiswa') {{ url('/data-pertukaran-mahasiswa') }} @elseif($card['title'] === 'Data Magang') {{ url('/data-magang') }} @elseif($card['title'] === 'Data Mengajar') {{ url('/data-mengajar') }} @elseif($card['title'] === 'Data Penelitian') {{ url('/data-penelitian') }} @elseif($card['title'] === 'Data Proyek Kemanusiaan') {{ url('/data-proyek-kemanusiaan') }} @elseif($card['title'] === 'Data Proyek') {{ url('/data-proyek') }} @elseif($card['title'] === 'Data Wirausaha') {{ url('/data-wirausaha') }} @elseif($card['title'] === 'Data Studi Proyek Independen') {{ url('/data-studi-proyek-independen') }} @elseif($card['title'] === 'Data Pengabdian') {{ url('/data-pengabdian') }} @elseif($card['title'] === 'Data Rekognisi') {{ url('/data-rekognisi') }} @elseif($card['title'] === 'Data Pembinaan Mental Kebangsaan') {{ url('/data-pembinaan-mental-kebangsaan') }} @elseif($card['title'] === 'Data Sertifikasi') {{ url('/data-sertifikasi') }} @endif" class="flex flex-col items-center bg-white/50 border border-gray-200 rounded-lg shadow-sm max-w-sm w-full min-h-[300px] h-[300px] mx-auto hover:bg-white transform transition-all duration-200 hover:scale-105">
                        @if(isset($card['image']))
                        <img class="object-cover w-full rounded-t-lg h-24 md:h-28 xl:h-32 md:rounded-none md:rounded-t-lg" src="{{ asset($card['image']) }}" alt="">
                        @elseif(isset($card['icon']) && $card['icon'] === 'trophy')
                        <svg class="w-14 h-14 text-gray-900 mt-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 21h8m-4-4v4m0-4a7 7 0 01-7-7V5a2 2 0 012-2h10a2 2 0 012 2v5a7 7 0 01-7 7z" />
                        </svg>
                        @elseif(isset($card['icon']) && $card['icon'] === 'organisasi')
                        <svg class="w-14 h-14 text-gray-900  mt-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20v-2a4 4 0 00-3-3.87M7 20v-2a4 4 0 013-3.87M12 14v6" />
                            <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="2" fill="none" />
                            <circle cx="5" cy="11" r="3" stroke="currentColor" stroke-width="2" fill="none" />
                            <circle cx="19" cy="11" r="3" stroke="currentColor" stroke-width="2" fill="none" />
                        </svg>
                        @elseif(isset($card['icon']) && $card['icon'] === 'book')
                        <svg class="w-14 h-14 text-gray-900 mt-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m0-12c-4.418 0-8 1.79-8 4v10c0 2.21 3.582 4 8 4s8-1.79 8-4V10c0-2.21-3.582-4-8-4z" />
                        </svg>
                        @elseif(isset($card['icon']) && $card['icon'] === 'magang')
                        <svg class="w-14 h-14 text-gray-900 mt-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2M3 7h18a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2zm0 0V5a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4v2" />
                        </svg>
                        @elseif(isset($card['icon']) && $card['icon'] === 'mengajar')
                        <svg class="w-14 h-14 text-grey-900 mt-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m0 0a9 9 0 01-9-9" />
                        </svg>
                        @elseif(isset($card['icon']) && $card['icon'] === 'penelitian')
                        <svg class="w-14 h-14 text-grey-900 mt-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h10M7 11h10M7 15h6M5 5v14a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2z" />
                        </svg>
                        @elseif(isset($card['icon']) && $card['icon'] === 'proyek-kemanusiaan')
                        <svg class="w-14 h-14 text-grey-900 mt-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 11V5a2 2 0 1 1 4 0v6m0 0V3a2 2 0 1 1 4 0v8m0 0V7a2 2 0 1 1 4 0v8a7 7 0 1 1-14 0v-3a2 2 0 1 1 4 0z" />
                        </svg>
                        @elseif(isset($card['icon']) && $card['icon'] === 'proyek-desa')
                        <svg class="w-14 h-14 text-grey-900 mt-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 21V9.243a2 2 0 01.879-1.657l7-4.667a2 2 0 012.242 0l7 4.667A2 2 0 0121 9.243V21M9 21V12h6v9" />
                        </svg>
                        @elseif(isset($card['icon']) && $card['icon'] === 'wirausaha')
                        <svg class="w-14 h-14 text-gray-900 mt-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 17v2a2 2 0 002 2h14a2 2 0 002-2v-2M8 17V9m4 8V5m4 12v-3" />
                        </svg>
                        @elseif(isset($card['icon']) && $card['icon'] === 'studi-proyek-independen')
                        <svg class="w-14 h-14 text-gray-900 mt-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m0 0a9 9 0 01-9-9" />
                        </svg>
                        @elseif(isset($card['icon']) && $card['icon'] === 'pengabdian')
                        <svg class="w-14 h-14 text-gray-900 mt-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20v-2a4 4 0 00-3-3.87M7 20v-2a4 4 0 013-3.87M12 14v6" />
                            <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="2" fill="none" />
                            <circle cx="5" cy="11" r="3" stroke="currentColor" stroke-width="2" fill="none" />
                            <circle cx="19" cy="11" r="3" stroke="currentColor" stroke-width="2" fill="none" />
                        </svg>
                        @elseif(isset($card['icon']) && $card['icon'] === 'rekognisi')
                        <svg class="w-14 h-14 text-gray-900 mt-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        @elseif(isset($card['icon']) && $card['icon'] === 'pembinaan-mental-kebangsaan')
                        <svg class="w-14 h-14 text-gray-900 mt-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v16m0-16h13l-2 5 2 5H4" />
                        </svg>
                        @elseif(isset($card['icon']) && $card['icon'] === 'sertifikasi')
                        <svg class="w-14 h-14 text-gray-900 mt-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="7" stroke="currentColor" stroke-width="2" fill="none" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 17v4m0 0l2-2m-2 2l-2-2" />
                        </svg>
                        @endif
                        <div class="flex flex-col justify-between p-4 leading-normal w-full flex-1">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-center">{{ $card['title'] }}</h5>
                            <p class="mb-3 font-normal text-gray-600 text-center flex-1 text-lg">{{ $card['deskripsi'] ?? '' }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-white shadow-sm dark:bg-white relative isolate overflow-hidden">
        <div aria-hidden="true" class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl">
            <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="aspect-1097/845 w-274.25 bg-linear-to-tr from-[#05ff4c] to-[#44b507] opacity-30"></div>
        </div>
        <div aria-hidden="true" class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:-top-112 sm:ml-16 sm:translate-x-0">
            <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="aspect-1097/845 w-274.25 bg-linear-to-tr from-[#05ff4c] to-[#44b507] opacity-40"></div>
        </div>
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <!-- Logo UPR kiri -->
                <div class="mb-4 md:mb-0 md:w-1/3 flex items-center">
                    <img src="{{ asset('image/logo.png') }}" alt="Logo UPR" class="h-10 w-auto">
                    <h1 class="ml-2 text-2xl font-bold text-black">DiPrest UPR</h1>
                </div>
                <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-600 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Beranda</a>
                    </li>
                    <li>
                        <a href="{{ url('/statistik') }}" class="hover:underline me-4 md:me-6">Statistik</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="flex flex-col md:flex-row items-center justify-between">
                <!-- Copyright tengah -->
                <div class="mb-4 md:mb-0 md:w-1/3 flex justify-start">
                    <span class="block text-sm text-gray-400 text-center font-semibold">© 2025 Copyright. Digitalisasi Informasi UPR.</span>
                </div>
                <!-- Sosmed kanan -->
                <div class="md:w-1/3 flex justify-end space-x-5">
                    <a href="#" class="text-gray-600 hover:text-black dark:hover:text-black">
                        <!-- Facebook icon -->
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                            <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Facebook page</span>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-black dark:hover:text-black">
                        <!-- Instagram icon -->
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                            <rect width="18" height="18" x="3" y="3" rx="5" stroke="currentColor" />
                            <circle cx="12" cy="12" r="4" stroke="currentColor" />
                            <circle cx="17.5" cy="6.5" r="1" fill="currentColor" />
                        </svg>
                        <span class="sr-only">Instagram</span>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-black dark:hover:text-black">
                        <!-- YouTube icon -->
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M21.8 8.001a2.75 2.75 0 0 0-1.93-1.946C18.14 6 12 6 12 6s-6.14 0-7.87.055A2.75 2.75 0 0 0 2.2 8.001 28.6 28.6 0 0 0 2 12a28.6 28.6 0 0 0 .2 3.999 2.75 2.75 0 0 0 1.93 1.946C5.86 18 12 18 12 18s6.14 0 7.87-.055a2.75 2.75 0 0 0 1.93-1.946A28.6 28.6 0 0 0 22 12a28.6 28.6 0 0 0-.2-3.999zM10 15.5v-7l6 3.5-6 3.5z" />
                        </svg>
                        <span class="sr-only">YouTube</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>