<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
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
                <h2 class="text-5xl font-semibold tracking-tight text-black sm:text-7xl">Jejak Prestasi UPR</h2>
                <p class="mt-8 text-lg font-medium text-pretty text-gray-600 sm:text-xl/8">Satu pintu untuk data prestasi, penelitian, organisasi, dan berbagai aktivitas akademik serta kemahasiswaan.</p>
            </div>
            <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">
                <div class="grid grid-cols-1 gap-x-8 gap-y-6 text-base/7 font-semibold text-black sm:grid-cols-2 md:flex lg:gap-x-10">
                    <a href="#">Data prestasi <span aria-hidden="true">&rarr;</span></a>
                    <a href="#">Data organisasi <span aria-hidden="true">&rarr;</span></a>
                    <a href="#">Data penelitian <span aria-hidden="true">&rarr;</span></a>
                    <a href="#">Lainya <span aria-hidden="true">&rarr;</span></a>
                </div>
                <dl class="mt-16 grid grid-cols-1 gap-8 sm:mt-20 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="flex flex-col-reverse gap-1">
                        <dt class="text-base/7 text-gray-600 max-w-[180px] break-words whitespace-normal">Prestasi nasional & internasional</dt>
                        <dd class="text-4xl font-semibold tracking-tight text-black">100+</dd>
                    </div>
                    <div class="flex flex-col-reverse gap-1">
                        <dt class="text-base/7 text-gray-600 max-w-[180px] break-words whitespace-normal">
                            Organisasi himpunan & UKM
                        </dt>
                        <dd class="text-4xl font-semibold tracking-tight text-black">300+</dd>
                    </div>
                    <div class="flex flex-col-reverse gap-1">
                        <dt class="text-base/7 text-gray-600 max-w-[180px] break-words whitespace-normal">
                            Publikasi nasional & internasional
                        </dt>
                        <dd class="text-4xl font-semibold tracking-tight text-black">1000+</dd>
                    </div>
                    <div class="flex flex-col-reverse gap-1" max-w-[180px] break-words whitespace-normal>
                        <dt class="text-base/7 text-gray-600 max-w-[180px] break-words whitespace-normal">
                            Mahasiswa magang & pertukaran
                        </dt>
                        <dd class="text-4xl font-semibold tracking-tight text-black">500+</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <section class="bg-[#28b420] py-16">
        <div id="visimisi-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-80 md:h-110 overflow-hidden bg-none flex items-center justify-center">
                <!-- Visi -->
                <div class="hidden duration-[2000ms] ease-in-out text-center" data-carousel-item="active">
                    <h2 class="text-2xl md:text-4xl font-bold text-white mb-8">Visi</h2>
                    <p class="text-gray-100 max-w-3xl mx-auto text-lg italic md:text-xl leading-relaxed">
                        Menjadi perguruan tinggi terbaik dalam menghasilkan data manusia (SDM) yang berkualitas, bermoral pancasila dan berdaya saing tinggi.
                    </p>
                </div>
                <!-- Misi -->
                <div class="hidden duration-[2000ms] ease-in-out text-center" data-carousel-item>
                    <h2 class="text-2xl md:text-4xl font-bold text-white mb-8">Misi</h2>
                    <ol class="text-gray-100 max-w-3xl mx-auto text-lg sm:text-base md:text-xl leading-relaxed list-none italic text-center">
                        <li class="mb-5">1. Menyelenggarakan pendidikan dan pengajaran secara efektif dan profesional.</li>
                        <li class="mb-5">2. Menyelenggarakan penelitian dan pengabdian kepada masyarakat untuk kemajuan ilmu pengetahuan dan teknologi serta
                            kesejahteraan masyarakat.</li>
                        <li class="mb-5">3. Membina kehidupan akademik yang demokratis dan dinamis dengan mendayagunakan sumberdaya secara optimal,
                            transparan, akuntabel, dan meningkatkan kualitas sumberdaya manusia berkelanjutan.
                        </li>
                        <li class="mb-5">4. Menyelenggarakan pengelolaan universitas berdasarkan paradigma baru manajemen pendidikan tinggi yang berazas
                            otonomi, evaluasi, akuntabilitas, akreditasi, dan jaminan mutu yang bermuara pada peningkatan kualitas yang
                            berkelanjutan.</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- Script Flowbite (harus ada supaya carousel jalan) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

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
                    <a href="https://www.instagram.com/kemahasiswaan_upr?igsh=ZnluMWRiemdwNGhs" class="text-gray-600 hover:text-black dark:hover:text-black">
                        <!-- Instagram icon -->
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                            <rect width="18" height="18" x="3" y="3" rx="5" stroke="currentColor" />
                            <circle cx="12" cy="12" r="4" stroke="currentColor" />
                            <circle cx="17.5" cy="6.5" r="1" fill="currentColor" />
                        </svg>
                        <span class="sr-only">Instagram</span>
                    </a>
                    <a href="https://youtube.com/@kemahasiswaanupr?si=ocmtZXr97qQ9roBx" class="text-gray-600 hover:text-black dark:hover:text-black">
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