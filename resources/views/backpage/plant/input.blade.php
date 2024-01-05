<x-admin-layout>

    <nav class="flex mb-3" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{route('plants.admin')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-green-600 ">Tabel Tanaman</a>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Tambah Tanaman Hias</span>
            </div>
        </li>
        </ol>
    </nav>

    <h2 class="mb-6 text-2xl font-semibold text-gray-700">
        {{$title}}
    </h2>
    <div class="space-y-5">
        <div class="px-6 py-2 mb-8 bg-white rounded-lg shadow-xs">

            <form id="plant-form" class="space-y-3" enctype="multipart/form-data" action="{{ isset($plant) ? route('plant-admin.update', $plant->id) : route('plant-admin.store') }}" method="POST">

                @csrf
                @if (isset($plant))
                    @method('PUT')
                @endif


                <div class="grid md:grid-cols-2 gap-4">
                    {{-- Nama --}}
                    <div class="block text-sm">
                        <label for="nama_tanaman" class="text-gray-700 ">Nama Tanaman</label>
                        <input type="text" id="nama_tanaman" name="nama_tanaman" value="{{ isset($plant) ? $plant->nama_tanaman : old('nama_tanaman') }}" class="border py-2 px-3 rounded-md block w-full mt-1 text-sm focus:border-green-400 focus:outline-none focus:shadow-outline-green form-input" placeholder="Masukkan Nama Tanaman"/>
                        @error('nama_tanaman')
                            <span class="text-xs text-red-600 ">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- kategori --}}
                    <div class="block text-sm">
                        <label for="category_id" class="text-gray-700 ">Kategori</label>
                        <select id="category_id" name="category_id" class="border py-2 px-3 rounded-md block w-full mt-1 text-sm focus:border-green-400 focus:outline-none focus:shadow-outline-green form-input" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $item)
                                <option
                                    {{ ((isset($plants) && $plants->category_id == $item->id) || old('category_id') == $item->id) ? 'selected' : '' }}
                                    value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>


                    {{-- Suhu Min --}}
                    <div class="block text-sm">
                        <label for="suhu_min" class="text-gray-700 ">Suhu Minimal</label>
                        <input type="text" id="suhu_min" name="suhu_min" value="{{ isset($plant) ? $plant->suhu_min : old('suhu_min') }}" class="border py-2 px-3 rounded-md block w-full mt-1 text-sm focus:border-green-400 focus:outline-none focus:shadow-outline-green form-input" placeholder="Masukkan Suhu Minimal"/>
                        @error('suhu_min')
                            <span class="text-xs text-red-600 ">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Suhu Maks --}}
                    <div class="block text-sm">
                        <label for="suhu_max" class="text-gray-700 ">Suhu Maksimal</label>
                        <input type="text" id="suhu_max" name="suhu_max" value="{{ isset($plant) ? $plant->suhu_max : old('suhu_max') }}" class="border py-2 px-3 rounded-md block w-full mt-1 text-sm focus:border-green-400 focus:outline-none focus:shadow-outline-green form-input" placeholder="Masukkan Suhu Maksimal"/>
                        @error('suhu_max')
                            <span class="text-xs text-red-600 ">{{ $message }}</span>
                        @enderror
                    </div>
                </div>




                <div class="mt-5">
                    <fieldset class="w-full space-y-1 text-sm">
                        <label for="plant_img" class="text-gray-700 ">Gambar</label>
                        <div class="flex">
                            <input type="file" name="plant_img" id="plant_img" class="px-8 py-8 border-2 border-dashed rounded-md w-full" multiple>
                        </div>
                    </fieldset>
                    @error('plant_img')
                        <div class="text-xs text-red-800">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block">
                        <span class="text-gray-700">Deskripsi</span>
                        <textarea id="editor" class="block w-full mt-1 rounded-md text-base" name="deskripsi" rows="7">{{ isset($plant) ? $plant->deskripsi : old('deskripsi') }}</textarea>
                    </label>
                    @error('deskripsi')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="bg-green-600 py-2 px-3 mt-5 rounded-md text-white hover:bg-green-800 font-medium focus:ring-4 focus:outline-none focus:ring-green-300 text-sm md:text-base">
                    <i class="las la-save text-lg mr-1"></i>Simpan
                </button>
            </form>

        </div>

    </div>

</x-admin-layout>

