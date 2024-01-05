<x-green-layout>
    <div class="item opacity-0 transition duration-1000 ease-in-out delay-300">
        <div class="flex justify-end relative z-0 opacity-40">
            <img class="absolute w-64 md:w-80 scale-x-[-1]" src="{{ asset('assets/images/palm.png') }}" alt="image">
        </div>
    </div>
    <div class="item opacity-0 transition duration-1000 ease-in-out delay-300">
        <div class="relative z-0 opacity-40">
            <img class="absolute w-52 md:w-64" src="{{ asset('assets/images/palm.png') }}" alt="image">
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
            <div>

            </div>
        </section>
    @else
        <section class="mx-12 md:mx-28 pb-10 md:pb-16 pt-24 relative z-10">
            <div class="flex justify-between mb-4 item opacity-0 transition duration-1000 ease-in-out delay-300">
                <h1 class="flex items-center text-2xl md:text-3xl lg:text-4xl text-primary1 font-bold font-abril tracking-wider">List Tanaman</h1>
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

</x-green-layout>
