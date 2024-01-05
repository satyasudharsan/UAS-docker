<x-green-layout>
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

    <section class="mx-12 md:mx-28 pb-10">
        <div class="px-2 pt-28 pb-10">
            <div class="ml-2 pt-2 pb-3 item opacity-0 transition duration-1000 ease-in-out delay-300">
                <h1 class="text-4xl font-bold text-primary1">Detail</h1>
            </div>
            <div class="md:flex-row flex-col flex mt-5 rounded-2xl md:p-2 item opacity-0 transition duration-1000 ease-in-out delay-300">
                <!-- Left: Image -->
                <div class="rounded-2xl w-full md:w-1/3 relative flex-shrink-0">
                    <img src="{{ asset($plant->plant_img) }}" class="w-full h-72 rounded-2xl object-cover" alt="">
                </div>

                <!-- Right: Description -->
                <div class="md:ml-10 mt-10 md:mt-0 w-full flex flex-col justify-center">
                    <h2 class="text-5xl font-semibold ">{{$plant->nama_tanaman}}</h2>

                    <div class="flex py-4">
                        @php
                            $categoryColors = [
                                'Flower' => 'text-white bg-red-600',
                                'Indoor' => 'text-white bg-amber-400',
                                'Outdoor' => 'text-white bg-blue-600',
                                'Foliage' => 'text-white bg-green-600',
                            ];
                        @endphp
                        <span class="{{ $categoryColors[$plant->category->nama] }} font-medium rounded-md text-lg px-4 py-2 focus:outline-none">{{$plant->category->nama}}</span>
                    </div>

                    <div class="mt-4">
                        <span class="text-xl font-semibold">Temperatur</span>
                        <div class="mt-3 grid grid-cols-2">
                            <div class="flex">
                                <div class="text-3xl mr-2">
                                    <i class="las la-temperature-low"></i>
                                </div>
                                <span class="text-xl">{{$plant->suhu_min}}</span>
                            </div>
                            <div class="flex">
                                <div class="text-3xl mr-2">
                                    <i class="las la-temperature-high"></i>
                                </div>
                                <span class="text-xl">{{$plant->suhu_max}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 item opacity-0 transition duration-1000 ease-in-out delay-300">
                <span class="text-3xl font-semibold">Deskripsi</span>
                <div class="mt-3 p-2 text-xl">
                    {!!$plant->deskripsi!!}
                </div>
            </div>
        </div>
    </section>
</x-green-layout>
