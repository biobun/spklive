
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SPK Kelayakan Lahan Tanaman Serealia</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles()
    @stack('styles')
</head>

<body class="antialiased">
    <nav id="header" class="w-full z-30 top-0 bg-orange-50 text-white py-0">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-1 py-0 lg:py-2">
          <!--Logo-->
          <div class="pl-4 flex items-center">
            <img class="w-14 h-14" src={{url('logoipb.png')}}>
            <img class="h-16" src="logo1.png">
          </div>
        </div>
    </nav>


    <div class="flex justify-center bg-white px-8 py-8">
        <div class="bg-orange-50 max-w-lg rounded overflow-hidden shadow-lg">
            <img class="w-full" src="{{url('landing.png')}}">
            <div class="px-6 py-4">
                <div class="font-extrabold font-serif text-xl text-center mb-2">Sistem Pendukung Keputusan Penentuan Lahan Tanaman Serealia di Kecamatan Dramaga!</div>
            </div>
        </div>
        <div class="relative isolate px-4 pt-6 lg:px-4">
            {{-- <div class="absolute inset-x-0 -top-20 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-50"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div> --}}
            <div class="mx-auto max-w-4xl py-12">
                <div class="text-center mt-6">
                    <div class="justify-center box-border h-500 w-400 border-0 mb-4">
                        <div class="font-extrabold text-center text-2xl mb-2">SELAMAT DATANG DI WEBSITE!</div>
                        <p class="text-center text-gray-800 font-serif text-base md:text-lg lg:text-lg mb-8 mx-50">
                            Sistem pendukung keputusan ini di peruntukkan untuk semua elemen masyarakat di Kecamatan Dramaga, khususnya para petani dan pemilik lahan guna membantu dalam menentukan jenis tanaman serealia yang akan dibudidayakan dengan memperhatikan karakteristik tanah
                        </p>
                    </div>

                    <div class="mt-18 flex items-center justify-center gap-x-6">
                        <a href="{{ route('spk.guest.create') }}"
                            class="rounded-md bg-yellow-800 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600">Mulai
                            menggunakan</a>
                    </div>

                    {{-- <div class="mt-6 flex items-center justify-center gap-x-6">
                        <a href="/panduan"
                            class="rounded-md bg-yellow-800 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600">Panduan</a>
                    </div> --}}
                </div>

                <div class="text-center">
                </div>
            </div>
            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>
        @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
            <a href="{{ url('/dashboard') }}"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
            <a href="{{ route('login') }}"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif
            @endauth
        </div>
        @endif
    </div>
</body>


<footer class="bg-orange-50 rounded-lg shadow dark:bg-gray-900">
    <div class="w-full max-w-screen-xl mx-auto p-4">
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <div class="sm:text-center text-base text-zinc-700 font-semibold">
           <p>
            Website dibuat sebagai Tugas Akhir IPB University,  Al Khansa Albizia Putri Hermawan | F14180032 </p> 
            </div>
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023. All Rights Reserved.</span>
    </div>
</footer>
</html>