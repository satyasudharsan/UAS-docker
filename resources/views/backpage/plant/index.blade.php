<x-admin-layout>
    <div class="space-y-5">
        <h2 class="mb-6 text-2xl font-semibold text-gray-700">
            Tabel Tanaman
        </h2>
        <div class="w-full overflow-hidden rounded-lg shadow-xs space-y-4 bg-white px-5 py-5">

            <div class="flex justify-between">

                <a href="{{route('plant-admin.create')}}">
                    <button class="bg-green-600 py-2 px-3 rounded-md text-slate-100 text-sm font-medium">
                        <i class="las la-plus"></i> Tambah
                    </button>
                </a>

                <form action="{{route('plants.admin')}}" method="GET">
                    <div class="flex">
                        <select id="id" name="id" class="items-center py-2.5 px-4 text-sm font-medium text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 ">
                            <option value="">All categories</option>
                            @foreach ($categories as $item)
                            <option value="{{$item->id}}" {{(isset($_GET['id'])&&$_GET['id']==$item->id)?'selected':''}}>{{$item->nama}}</option>

                            @endforeach
                        </select>

                        <div class="relative w-full">
                            <input type="search" name="s" value="{{(isset($_GET['s']))?$_GET['s']:''}}" id="search-dropdown" class="block p-2.5 w-72 z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:border-green-400 focus:outline-none focus:shadow-outline-green" placeholder="Search...">
                            <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-green-600 rounded-e-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 ">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="w-full overflow-x-auto rounded-lg shadow-xs">
                <table class="w-full ">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">Gambar</th>
                            <th class="px-4 py-3">Kategori</th>
                            <th class="px-4 py-3">Suhu min</th>
                            <th class="px-4 py-3">Suhu maks</th>
                            <th class="px-4 py-3">Deskripsi</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y ">
                        @foreach ($plants as $key=>$item)
                            <tr class="text-gray-700 ">
                                <td class="px-4 py-3 text-sm">
                                    <p class="font-semibold">{{$item->nama_tanaman}}</p>
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    <div class="w-20">
                                        <img src="{{$item->plant_img}}" alt="" class="rounded object-cover w-20 h-16">
                                    </div>
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    @php
                                        $categoryColors = [
                                            'Flower' => 'text-red-600 bg-red-100',
                                            'Indoor' => 'text-yellow-600 bg-amber-100',
                                            'Outdoor' => 'text-blue-600 bg-blue-100',
                                            'Foliage' => 'text-green-600 bg-green-100',
                                        ];
                                    @endphp
                                    <div class="py-2 rounded-lg text-center {{ $categoryColors[$item->category->nama] }}">
                                        <p>{{$item->category->nama}}</p>
                                    </div>
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    <p>{{$item->suhu_min}}</p>
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    <p>{{$item->suhu_max}}</p>
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    <div x-data="{ expanded: false }">
                                        <span x-show="!expanded">{!! Str::limit(nl2br(e(strip_tags($item->deskripsi))), 50) !!}</span>
                                        <span x-show="expanded">{!! nl2br(e(strip_tags($item->deskripsi))) !!}</span>

                                        <button @click="expanded = !expanded" class="text-blue-500 focus:outline-none">
                                            <span x-show="!expanded">Read More</span>
                                            <span x-show="expanded">Read Less</span>
                                        </button>
                                    </div>
                                </td>

                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        {{-- edit --}}
                                        <form action="{{route('plant-admin.destroy', $item->id)}}" method="POST" class="flex">
                                            <a href="{{route('plants.admin.edit', ['slug' => Str::slug($item->nama_tanaman)])}}" class="flex items-center px-2 py-2 text-2xl font-medium leading-5 text-yellow-500 rounded-lg hover:text-yellow-600 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                                <i class="las la-edit"></i>
                                            </a>
                                            @csrf @method('DELETE')
                                            <button type="submit" onclick="return confirm('Anda Yakin?')" class="px-2 py-2 text-2xl font-medium leading-5 text-red-500 hover:text-red-600 rounded-lg focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                                <i class="las la-trash"></i>
                                            </button>
                                        </form>
                                        {{-- delete --}}
                                    </div>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
                
                <?php if(Request::path() == 'plant-admin') { ?>
                    <div class="m-4"> {{$plants->appends(request()->query())->links()}} </div>
                <?php } ?>
            </div>
        </div>

    </div>
</x-admin-layout>
