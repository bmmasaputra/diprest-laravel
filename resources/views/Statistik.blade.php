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
    <x-Navbar title="Statistik UPR"></x-Navbar>
    <div class="relative isolate overflow-hidden bg-gray-900 min-h-screen flex items-center py-24 sm:py-32">
        <!-- <img src="image/rektorat.png" alt="" class="absolute inset-0 -z-10 size-full object-cover object-right md:object-center" /> -->
        <div aria-hidden="true" class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl">
            <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="aspect-1097/845 w-274.25 bg-linear-to-tr from-[#ff4694] to-[#776fff] opacity-20"></div>
        </div>
        <div aria-hidden="true" class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:-top-112 sm:ml-16 sm:translate-x-0">
            <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="aspect-1097/845 w-274.25 bg-linear-to-tr from-[#ff4694] to-[#776fff] opacity-20"></div>
        </div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8 w-full">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-5xl font-semibold tracking-tight text-white sm:text-7xl">Statistik Prestasi UPR</h2>
                <p class="mt-8 text-lg font-medium text-pretty text-gray-300 sm:text-xl/8">Satu pintu untuk data prestasi, penelitian, organisasi, dan berbagai aktivitas akademik serta kemahasiswaan.</p>
            </div>
            <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">
                <div class="grid grid-cols-1 gap-x-8 gap-y-6 text-base/7 font-semibold text-white sm:grid-cols-2 md:flex lg:gap-x-10">
                @foreach ($cards as $card)    
                    <a href="#">{{$card['title']}} <span aria-hidden="true">&rarr;</span></a>
                @endforeach    
                    
                </div>
                <dl class="mt-16 grid grid-cols-1 gap-8 sm:mt-20 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="flex flex-col-reverse gap-1">
                        <dt class="text-base/7 text-gray-300 max-w-[180px] break-words whitespace-normal">Prestasi nasional & internasional</dt>
                        <dd class="text-4xl font-semibold tracking-tight text-white">100+</dd>
                    </div>
                    <div class="flex flex-col-reverse gap-1">
                        <dt class="text-base/7 text-gray-300 max-w-[180px] break-words whitespace-normal">
                            Organisasi himpunan & UKM
                        </dt>
                        <dd class="text-4xl font-semibold tracking-tight text-white">300+</dd>
                    </div>
                    <div class="flex flex-col-reverse gap-1">
                        <dt class="text-base/7 text-gray-300 max-w-[180px] break-words whitespace-normal">
                            Publikasi nasional & internasional
                        </dt>
                        <dd class="text-4xl font-semibold tracking-tight text-white">1000+</dd>
                    </div>
                    <div class="flex flex-col-reverse gap-1" max-w-[180px] break-words whitespace-normal>
                        <dt class="text-base/7 text-gray-300 max-w-[180px] break-words whitespace-normal">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore ratione perspiciatis explicabo, porro deserunt quod quam a omnis molestiae! Autem sunt nesciunt quia quo quasi numquam eligendi explicabo accusantium ipsum!
                        </dt>
                        <dd class="text-4xl font-semibold tracking-tight text-white">500+</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</body>

</html>