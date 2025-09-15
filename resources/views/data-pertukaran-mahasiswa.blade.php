<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">
    <x-Navbar background="bg-gray-900" title="Data Pertukan Mahasiswa UPR"></x-Navbar>

    <!-- Header Section -->
    <div class=" pt-28 pb-10">
        <h2 class="text-gray-900 text-3xl font-semibold text-center tracking-tight">DATA PERTUKARAN MAHASISWA</h2>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-10">
        <div class="bg-white rounded-lg shadow-md p-6">
            <!-- Search -->
            <div class="flex items-center justify-between mb-6">
                <!-- Button Kembali di kiri -->
                <a href="/statistik" class="text-white bg-gray-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    <svg class="w-3.5 h-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0l4-4M1 5l4 4" />
                    </svg>
                    Kembali
                </a>
                <!-- Search di kanan -->
                <div class="relative w-full max-w-xs ml-4">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="table-search" value="{{ request('search') }}"
                            class="block w-full pl-10 pr-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Cari data pertukaran mahasiswa...">
                    </div>
                </div>
            </div>

            <!-- Table Container (untuk AJAX update) -->
            <div id="table-container">
                <!-- Tabel -->
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">Nama</th>
                            <th class="border px-4 py-2">Fakultas</th>
                            <th class="border px-4 py-2">Program Studi</th>
                            <th class="border px-4 py-2">Jenis</th>
                            <th class="border px-4 py-2">Nama Program</th>
                            <th class="border px-4 py-2">Jumlah Peserta</th>
                            <th class="border px-4 py-2">Tahun Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($datapertukaran as $item)
                        <tr>
                            <td class="border px-4 py-2">{{ $item->nama }}</td>
                            <td class="border px-4 py-2">{{ $item->fakultas }}</td>
                            <td class="border px-4 py-2">{{ $item->program_studi }}</td>
                            <td class="border px-4 py-2">{{ $item->jenis }}</td>
                            <td class="border px-4 py-2">{{ $item->nama_program }}</td>
                            <td class="border px-4 py-2">{{ $item->jumlah_peserta }}</td>
                            <td class="border px-4 py-2">{{ $item->tahun_kegiatan }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">Data tidak ditemukan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <nav class="flex items-center justify-between pt-4" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500">
                        Menampilkan
                        <span class="font-semibold text-gray-900">{{ $datapertukaran->firstItem() }}</span> -
                        <span class="font-semibold text-gray-900">{{ $datapertukaran->lastItem() }}</span>
                        dari <span class="font-semibold text-gray-900">{{ $datapertukaran->total() }}</span> data
                    </span>

                    <ul class="inline-flex -space-x-px text-sm h-8">
                        {{-- Tombol Previous --}}
                        @if ($datapertukaran->onFirstPage())
                        <li>
                            <span
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-400 bg-white border border-gray-300 rounded-s-lg">Previous</span>
                        </li>
                        @else
                        <li>
                            <a href="{{ $datapertukaran->previousPageUrl() }}"
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">
                                Previous
                            </a>
                        </li>
                        @endif

                        {{-- Nomor Halaman --}}
                        @foreach ($datapertukaran->getUrlRange(1, $datapertukaran->lastPage()) as $page => $url)
                        @if ($page == $datapertukaran->currentPage())
                        <li>
                            <span aria-current="page"
                                class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50">
                                {{ $page }}
                            </span>
                        </li>
                        @else
                        <li>
                            <a href="{{ $url }}"
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                                {{ $page }}
                            </a>
                        </li>
                        @endif
                        @endforeach

                        {{-- Tombol Next --}}
                        @if ($datapertukaran->hasMorePages())
                        <li>
                            <a href="{{ $datapertukaran->nextPageUrl() }}"
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">
                                Next
                            </a>
                        </li>
                        @else
                        <li>
                            <span
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-400 bg-white border border-gray-300 rounded-e-lg">Next</span>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</body>

<!-- AJAX untuk live search -->
<script>
    const searchInput = document.getElementById('table-search');
    let timeout = null;

    searchInput.addEventListener('keyup', function() {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            fetch(`{{ route('datapertukaran.index') }}?search=${encodeURIComponent(this.value)}`)
                .then(res => res.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newContent = doc.querySelector('#table-container').innerHTML;
                    document.querySelector('#table-container').innerHTML = newContent;
                });
        }, 300); // delay 300ms biar tidak terlalu sering request
    });
</script>

</html>