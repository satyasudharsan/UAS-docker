<x-green-layout>

    {{-- dashboard --}}
    <div class="item opacity-0 transition duration-1000 ease-in-out delay-300">
        <div class="flex justify-end relative z-0 opacity-40">
            <img class="absolute w-80 scale-x-[-1]" src="{{ asset('assets/images/palm.png') }}" alt="images">
        </div>
    </div>
    <div class="item opacity-0 transition duration-1000 ease-in-out delay-300">
        <div class="relative z-0 opacity-40">
            <img class="absolute w-64" src="{{ asset('assets/images/palm.png') }}" alt="images">
        </div>
    </div>

    <section class="mx-12 md:mx-28 pt-16 md:flex md:flex-row-reverse md:justify-between relative z-10">

        <div class=" pt-16 item opacity-0 transition duration-1000 ease-in-out delay-300">
            <div class="w-full">
                <img src="{{ asset('assets/images/tanaman.png') }}" alt="tanaman">
            </div>
        </div>

        <div class="pt-16 flex flex-col justify-center item opacity-0 transition duration-1000 ease-in-out delay-300">
            <h1 class="mr-10 md:text-4xl lg:text-5xl text-3xl text-primary1 font-bold tracking-wide pb-6">
                Discover the Beauty of <br> Nature at GreenGarden
            </h1>

            <span class="border-b-2 border-green-900 px-36"></span>
            <p class="pt-4 font-poppins text-sm md:text-md lg:text-lg text-[#B2936E] tracking-wider">
                Cek kondisi lingkunganmu untuk tanaman kesayanganmu<br>
                hanya di <span class="font-medium text-green-700">GreenGarden</span>
            </p>
            <div class="pt-6 space-y-2 md:space-x-2">
                <a href="{{route('all.plants')}}" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">Lihat Rekomendasi</a>
                <a href="{{route('maps')}}" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-100 text-green-800 hover:bg-green-200 disabled:opacity-50 disabled:pointer-events-none">Rekomendasi dari Maps</a>
            </div>
        </div>
    </section>

    <div class="item opacity-0 transition duration-1000 ease-in-out delay-300">
        <div class="relative z-0 opacity-35">
            <img src="{{ asset('assets/images/daun5.png') }}" class="absolute w-60 scale-x-[-1]" alt="images">
        </div>
    </div>
    <div class="item opacity-0 transition duration-1000 ease-in-out delay-300">
        <div class="flex justify-end relative z-0 opacity-35 inset-0">
            <img src="{{ asset('assets/images/daun2.png') }}" class="absolute w-52" alt="images">
        </div>
    </div>

    <section class="mx-12 md:mx-28 pt-16 relative z-10">
        <div class=" py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl lg:py-20">
            <div class="grid gap-10 lg:grid-cols-2">
                <div class="flex flex-col justify-center md:pr-8 xl:pr-0 lg:max-w-lg">
                    <div class="flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-green-600 text-white">
                        <i class="las la-map-marker text-4xl"></i>
                    </div>
                    <div class="max-w-xl mb-6">
                        <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
                            Informasi Lokasi Anda
                        </h2>
                        <div class="text-base text-gray-700 md:text-lg">
                            Lokasi: <span id="city"></span>
                        </div>
                        <div class="text-base text-gray-700 md:text-lg flex space-x-6">
                            <div>
                                Suhu Min: <span id="min-temperature"></span>
                            </div>
                            <div>
                                Suhu Maks: <span id="max-temperature"></span>
                            </div>
                            <span id="temperature" class="hidden"></span>
                            <div class="hidden">
                                <span id="latitude"></span>
                                <span id="longitude"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center -mx-4 lg:pl-8">
                    <div class="flex flex-col items-end px-3">
                        <img class="object-cover mb-6 rounded shadow-lg h-28 sm:h-48 xl:h-56 w-28 sm:w-48 xl:w-56" src="{{asset('assets/images/pecinta tanaman.jpg')}}" alt=""/>
                        <img class="object-cover w-20 h-20 rounded shadow-lg sm:h-32 xl:h-40 sm:w-32 xl:w-40" src="{{asset('assets/images/pecinta tanaman 3.jpg')}}" alt="" />
                    </div>
                    <div class="px-3">
                        <img class="object-cover w-40 h-40 rounded shadow-lg sm:h-64 xl:h-80 sm:w-64 xl:w-80" src="{{asset('assets/images/pecinta tanaman 2.jpg')}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- card rekomendasi --}}
    <section class="mx-12 md:mx-28 pt-16 relative z-10">
        <div class="pb-10 item opacity-0 transition duration-1000 ease-in-out delay-300">
            <h1 class="text-center text-2xl md:text-3xl lg:text-4xl text-primary1 font-bold tracking-wider">Kategori Tanaman</h1>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 lg:gap-8 item opacity-0 transition duration-1000 ease-in-out delay-300">
            <div class="rounded-3xl relative gap-y-5 shadow">
                <a href="{{ route('plants.by.category', 'outdoor') }}" class="relative rounded-3xl overflow-hidden w-48 h-48 md:w-56 md:h-56 group">
                    <div class="relative bg-cover bg-center transition-transform transform group-hover:scale-110 brightness-75">
                        <img src="{{ asset('assets/images/rekomend3.jpg') }}" class="w-full h-full rounded-3xl" alt="rekomendasi">
                    </div>
                    <div class="text-white text-center absolute inset-2 flex flex-col items-center justify-center pointer-events-none">
                        <h1 class="text-primary2 md:text-2xl text-xl font-bold ">Outdoor Plants</h1>
                    </div>
                </a>
            </div>
            <div class="rounded-3xl relative shadow">
                <a href="{{ route('plants.by.category', 'indoor') }}" class="relative rounded-3xl overflow-hidden  w-48 h-48 md:w-56 md:h-56 group">
                    <div class="relative bg-cover bg-center transition-transform transform group-hover:scale-110 brightness-75">
                        <img src="{{ asset('assets/images/rekomend1.jpg') }}" class="w-full h-full rounded-3xl" alt="rekomendasi">
                    </div>
                    <div class="text-white text-center absolute inset-2 flex flex-col items-center justify-center pointer-events-none">
                        <h1 class="text-primary2 md:text-2xl text-xl font-bold ">Indoor Plants</h1>
                    </div>
                </a>
            </div>
            <div class="rounded-3xl relative shadow">
                <a href="{{ route('plants.by.category', 'flower') }}" class="relative rounded-3xl overflow-hidden  w-48 h-48  md:w-56 md:h-56 group">
                    <div class="relative bg-cover bg-center transition-transform transform group-hover:scale-110 brightness-75">
                        <img src="{{ asset('assets/images/rekomend2.jpg') }}" class="w-full h-full rounded-3xl" alt="rekomendasi">
                    </div>
                    <div class="text-white text-center absolute inset-2 flex flex-col items-center justify-center pointer-events-none">
                        <h1 class="text-primary2 md:text-2xl text-xl font-bold ">Flower Plants</h1>
                    </div>
                </a>
            </div>
            <div class="rounded-3xl relative shadow">
                <a href="{{ route('plants.by.category', 'foliage') }}" class="relative rounded-3xl overflow-hidden  w-48 h-48  md:w-56 md:h-56 group">
                    <div class="relative bg-cover bg-center transition-transform transform group-hover:scale-110 brightness-75">
                        <img src="{{ asset('assets/images/rekomend4.jpg') }}" class="w-full h-full rounded-3xl" alt="rekomendasi">
                    </div>
                    <div class="text-white text-center absolute inset-2 flex flex-col items-center justify-center pointer-events-none">
                        <h1 class="text-primary2 md:text-2xl text-xl font-bold ">Foliage Plants</h1>
                    </div>
                </a>
            </div>
        </div>
    </section>


    <div class="item opacity-0 transition duration-1000 ease-in-out delay-300">
        <div class="relative z-0 opacity-35">
            <img src="{{ asset('assets/images/daun2.png') }}" class="absolute w-52 pt-10 scale-x-[-1]" alt="">
        </div>
    </div>

    @if(auth()->check())
        @php
            $user = auth()->user();
            $recommendation = $user->location;
        @endphp
        <section class="mx-12 md:mx-28 pb-10 md:pb-16 pt-24 relative z-10">
            <div class="flex justify-between pb-10 item opacity-0 transition duration-1000 ease-in-out delay-300">
                <h1 class="text-center text-xl md:text-2xl lg:text-3xl text-primary1 font-bold font-abril tracking-wider">Rekomendasi</h1>
                <a href="{{route('all.plants')}}" class="flex justify-center items-center py-2 px-3 rounded-md hover:bg-green-600 hover:text-white hover:delay-300 hover:ease-in transition">
                    <span class="font-medium">Lihat Semua</span>
                    <i class="las la-arrow-right text-lg ml-2"></i>
                </a>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-8 justify-between item opacity-0 transition duration-1000 ease-in-out delay-300">
                @foreach($recommendedPlants as $plant)
                    <div class="relative mb-4">
                        <div class="flex flex-col w-full bg-white border border-gray-200 rounded-lg shadow relative">
                            <a href="#">
                                <!-- Kontainer untuk gambar dan label -->
                                <div class="relative">
                                    <img class="rounded-t-lg w-full h-32 sm:h-40 md:h-52 lg:h-64 object-cover" src="{{$plant->plant_img}}" alt="" />
                                    <div class="absolute bottom-0 right-0 mb-4 mr-2">
                                        @if($recommendation && $plant->suhu_min <= $recommendation->temperature_max && $plant->suhu_max >= $recommendation->temperature_min)
                                            <span class="bg-green-700 text-white text-xs md:text-sm font-semibold px-4 py-2 rounded-md">Cocok</span>
                                        @else
                                            <span class="bg-red-700 text-white text-xs md:text-sm font-semibold px-4 py-2 rounded-md">Tidak Cocok</span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                            <div class="p-4 space-y-5">
                                <div class="flex flex-col">
                                    <h5 class="text-lg md:text-xl font-bold tracking-tight text-gray-900">{{ $plant->nama_tanaman }}</h5>
                                    <p class="font-normal text-gray-700 text-sm md:text-base">{!! Str::limit($plant->deskripsi, 20, '...') !!}</p>
                                </div>
                                <a href="{{ route('plant.detail', ['slug' => Str::slug($plant->nama_tanaman)]) }}" class="inline-flex items-center justify-center px-2 py-2 sm:px-3 sm:py-3 text-xs md:text-sm w-full font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">
                                    Detail
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="item opacity-0 transition duration-1000 ease-in-out delay-300">
                <a href="{{route('all.plants')}}" class="flex justify-center items-center py-3 rounded-md bg-green-600 text-white sm:hidden">
                    <span class="font-medium text-sm md:text-base lg:text-lg">Lihat Semua</span>
                    <i class="las la-arrow-right text-lg ml-2"></i>
                </a>
            </div>
        </section>
    @else
        <section class="mx-12 md:mx-28 pb-10 md:pb-16 pt-24 relative z-10">
            <div class="flex justify-between mb-4 item opacity-0 transition duration-1000 ease-in-out delay-300">
                <h1 class="flex items-center text-2xl md:text-3xl lg:text-4xl text-primary1 font-bold font-abril tracking-wider">List Tanaman</h1>
                <a href="{{route('all.plants')}}" class="hidden sm:flex justify-center items-center py-2 px-3 rounded-md hover:bg-green-600 hover:text-white">
                    <span class="font-medium text-sm md:text-base lg:text-lg">Lihat Semua</span>
                    <i class="las la-arrow-right text-lg ml-2"></i>
                </a>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 justify-center md:justify-between item opacity-0 transition duration-1000 ease-in-out delay-300">
                @foreach($allPlants as $plant)
                    <div class="relative mb-4">
                        <div class="flex flex-col w-full bg-white border border-gray-200 rounded-lg shadow relative">
                            <a href="#">
                                <div class="relative">
                                    <img class="rounded-t-lg w-full h-32 sm:h-40 md:h-52 lg:h-64 object-cover" src="{{$plant->plant_img}}" alt="" />
                                </div>
                            </a>
                            <div class="p-4 space-y-5">
                                <div class="flex flex-col">
                                    <h5 class="text-lg md:text-xl font-bold tracking-tight text-gray-900">{{ $plant->nama_tanaman }}</h5>
                                    <p class="font-normal text-gray-700 text-sm md:text-base">{!! Str::limit($plant->deskripsi, 20, '...') !!}</p>
                                </div>
                                <a href="{{ route('plant.detail', ['slug' => Str::slug($plant->nama_tanaman)]) }}" class="inline-flex items-center justify-center px-2 py-2 sm:px-3 sm:py-3 text-xs md:text-sm w-full font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">
                                    Detail
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="item opacity-0 transition duration-1000 ease-in-out delay-300">
                <a href="{{route('all.plants')}}" class="flex justify-center items-center py-3 rounded-md bg-green-600 text-white sm:hidden">
                    <span class="font-medium text-sm md:text-base lg:text-lg">Lihat Semua</span>
                    <i class="las la-arrow-right text-lg ml-2"></i>
                </a>
            </div>
        </section>
        <div id="cookies-simple-with-dismiss-button" class="fixed bottom-0 start-1/2 transform -translate-x-1/2 z-[60] sm:max-w-4xl w-full mx-auto p-6 item opacity-0 transition duration-1000 ease-in-out ">
            <div class="p-4 bg-white border border-gray-200 rounded-xl shadow-sm">
                <div class="flex justify-between items-center gap-x-5 sm:gap-x-10">
                    <h2 class="text-sm text-gray-600">
                    Harap untuk melakukan login/daftar terlebih dahulu untuk mendapatkan rekomendasi. <a class="inline-flex items-center gap-x-1.5 text-green-600 decoration-2 hover:underline font-medium" href="#">Login</a>
                    </h2>
                    <button type="button" class="p-2 inline-flex items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none " data-hs-remove-element="#cookies-simple-with-dismiss-button" id="dismissButton">
                    <span class="sr-only">Dismiss</span>
                    <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <div class="item opacity-0 transition duration-1000 ease-in-out delay-300 ">
        <div class="flex justify-end relative z-0 opacity-35">
            <img src="{{ asset('assets/images/daun5.png') }}" class="absolute -mt-40" alt="">
        </div>
    </div>
    <div class="item opacity-0 transition duration-1000 ease-in-out delay-300">
        <div class="relative z-0 opacity-35">
            <img src="{{ asset('assets/images/daun5.png') }}" class="absolute scale-x-[-1] w-52" alt="">
        </div>
    </div>

    <section id="tips" class="pb-20">
        <div class="rounded-lg md:mx-28 pb-52 md:pb-20 bg-[#CFD8B3] relative item opacity-0 transition duration-1000 ease-in-out delay-300">
            <div class="mx-10 item opacity-0 transition duration-1000 ease-in-out delay-300 flex flex-col">

                <div class="flex justify-center pt-10">
                    <h1 class="text-2xl md:text-3xl lg:text-4xl text-[#516B54] font-abril tracking-wider">Plants Care Tips</h1>
                </div>

                <div class="space-y-10 flex flex-col lg:flex-row lg:items-center">
                    <div class="lg:pt-2 flex justify-center lg:order-2 mx-20 mb-10">
                        <img src="{{ asset('assets/images/daun.png') }}" class="w-36 lg:w-96" alt="image">
                    </div>

                    {{-- kiri --}}
                    <div class="flex flex-col space-y-10 lg:order-first">
                        <div class="flex flex-col">
                            <div class="flex justify-start">
                                <div class="flex justify-center px-5 py-3 bg-[#516B54] rounded-tr-[25px] rounded-bl-[25px]">
                                    <span class="text-white material-symbols-outlined">sunny</span>
                                </div>
                                <div class="ml-5 py-2">
                                    <h1 class="text-xl lg:text-2xl font-abril text-[#000000]">Light</h1>
                                </div>
                            </div>
                            <div class="mx-7 py-8 px-8 bg-[#E2E0C1] rounded-tr-[50px] rounded-bl-[50px]">
                                <p class="text-xs sm:text-sm md:text-base font-normal">Tempatkan tanaman sesuai preferensinya seperti cahaya rendah, cahaya tidak langsung, atau sinar matahari langsung</p>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <div class="flex justify-start">
                                <div class="flex justify-center px-5 py-3 bg-[#516B54] rounded-tr-[25px] rounded-bl-[25px]">
                                    <span class="text-white material-symbols-outlined">water_drop</span>
                                </div>
                                <div class="ml-5 py-2">
                                    <h1 class="text-xl lg:text-2xl font-abril text-[#000000]">Watering</h1>
                                </div>
                            </div>
                            <div class="mx-7 py-8 px-8 bg-[#E2E0C1] rounded-tr-[50px] rounded-bl-[50px]">
                                <p class="text-xs sm:text-sm md:text-base font-normal">Mengatur jadwal penyiraman yang konsisten, mencegah kerugian akibat kelebihan atau kekurangan air pada tanaman</p>
                            </div>
                        </div>
                    </div>

                    {{-- kanan --}}
                    <div class="flex flex-col space-y-10 lg:order-last">
                        <div class="flex flex-col">
                            <div class="flex lg:flex-row-reverse">
                                <div class="flex justify-center px-5 py-3 bg-[#516B54] rounded-tr-[25px] rounded-bl-[25px] lg:rounded-tr-none lg:rounded-bl-none lg:rounded-tl-[25px] lg:rounded-br-[25px]">
                                    <span class="text-white material-symbols-outlined">thermostat</span>
                                </div>
                                <div class="ml-5 py-2 lg:ml-0 lg:mr-5">
                                    <h1 class="text-xl lg:text-2xl font-abril text-[#000000]">Temperature</h1>
                                </div>
                            </div>
                            <div class="mx-7 py-8 px-8 bg-[#E2E0C1] rounded-tr-[50px] rounded-bl-[50px] lg:rounded-tr-none lg:rounded-bl-none lg:rounded-tl-[50px] lg:rounded-br-[50px]">
                                <p class="text-xs sm:text-sm md:text-base font-normal">Tempatkan tanaman di lingkungan dengan suhu dan tingkat kelembapan yang sesuai dengan spesiesnya</p>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <div class="flex lg:flex-row-reverse">
                                <div class="flex justify-center px-5 py-3 bg-[#516B54] rounded-tr-[25px] rounded-bl-[25px] lg:rounded-tr-none lg:rounded-bl-none lg:rounded-tl-[25px] lg:rounded-br-[25px]">
                                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 19 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 3 6 2V1m5 2 1-1V1M9 7v11M9 7a5 5 0 0 1 5 5M9 7a5 5 0 0 0-5 5m5-5a4.959 4.959 0 0 1 2.973 1H12V6a3 3 0 0 0-6 0v2h.027A4.959 4.959 0 0 1 9 7Zm-5 5H1m3 0v2a5 5 0 0 0 10 0v-2m3 0h-3m-9.975 4H2a1 1 0 0 0-1 1v2m13-3h2.025a1 1 0 0 1 1 1v2M13 9h2.025a1 1 0 0 0 1-1V6m-11 3H3a1 1 0 0 1-1-1V6"/>
                                    </svg>
                                </div>
                                <div class="ml-5 py-2 lg:ml-0 lg:mr-5">
                                    <h1 class="text-xl lg:text-2xl font-abril text-[#000000]">Pest Control</h1>
                                </div>
                            </div>
                            <div class="mx-7 py-8 px-8 bg-[#E2E0C1] rounded-tr-[50px] rounded-bl-[50px] lg:rounded-tr-none lg:rounded-bl-none lg:rounded-tl-[50px] lg:rounded-br-[50px]">
                                <p class="text-xs sm:text-sm md:text-base font-normal">Memantau dan menangani hama pemakan tanaman. Prioritaskan pestisida alami sebelum menggunakan larutan kimia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</x-green-layout>
