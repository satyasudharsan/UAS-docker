<x-admin-layout>

    <nav class="flex mb-3" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{route('category.admin')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-green-600 ">Tabel Kategori</a>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Tambah Kategori</span>
            </div>
        </li>
        </ol>
    </nav>

    <h2 class="mb-6 text-2xl font-semibold text-gray-700">
        {{$title}}
    </h2>
    <div class="space-y-5">
        <div class="px-6 py-2 mb-8 bg-white rounded-lg shadow-xs">

            <form id="category-form" class="space-y-3" enctype="multipart/form-data" action="{{ isset($category) ? route('category-admin.update', $category->id) : route('category-admin.store') }}" method="POST">

                @csrf
                @if (isset($category))
                    @method('PUT')
                @endif

                <div class="block text-sm">
                    <label for="nama" class="text-gray-700 ">Nama Kategori</label>
                    <input type="text" id="nama" name="nama" value="{{ isset($category) ? $category->nama : old('nama') }}" class="border py-2 px-3 rounded-md block w-full mt-1 text-sm focus:border-green-400 focus:outline-none focus:shadow-outline-green form-input" placeholder="Masukkan Nama Kategori"/>
                    @error('nama')
                        <span class="text-xs text-red-600 ">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block">
                        <span class="text-gray-700">Keterangan</span>
                        <textarea id="editor" class="block w-full mt-1 rounded-md text-base" name="keterangan" rows="7">{{ isset($category) ? $category->keterangan : old('keterangan') }}</textarea>
                    </label>
                    @error('keterangan')
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

