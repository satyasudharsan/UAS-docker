<div>
    <div>
        <!DOCTYPE html>
        <html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
            <head>
                <meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <title>Admin Dashboard</title>
                <link
                href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
                rel="stylesheet"
                />
                {{-- <link rel="stylesheet" href="{{asset('assets/css/tailwind.output.css')}}" /> --}}
                <script
                src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
                defer
                ></script>
                <script src="{{asset('assets/js/init-alpine.js')}}"></script>
                <script src="https://cdn.tailwindcss.com"></script>
                <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
                <link
                rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
                />
                <script
                src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
                defer
                ></script>
                <script src="{{asset('assets/js/charts-lines.js')}}" defer></script>
                <script src="{{asset('assets/js/charts-pie.js')}}" defer></script>
                <script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet"/>

            </head>
            <body>
                <div class="flex h-screen bg-gray-50 " :class="{ 'overflow-hidden': isSideMenuOpen }">
                    <!-- Desktop sidebar -->
                    <aside class="z-20 hidden w-64 overflow-y-auto bg-white  md:block flex-shrink-0">
                        <div class="py-4 text-gray-500 ">
                            <a class="ml-6 text-lg font-bold flex text-gray-800 " href="#">
                                <img src="{{asset('assets/images/logo.svg')}}" alt="logo" class="mr-3 h-6">
                                GreenGarden
                            </a>

                            <ul class="mt-6">
                                {{-- dashboard --}}
                                @if (request()->routeIs('dashboard.admin'))
                                    <li class="relative px-6 py-3">
                                        <span class="absolute inset-y-0 left-0 w-1 bg-green-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 " href="{{route('dashboard.admin')}}">
                                            <span class="w-3.5 mr-1 text-2xl">
                                                <i class="las la-tachometer-alt"></i>
                                            </span>
                                            <span class="ml-4">Dashboard</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="relative px-6 py-3">
                                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 " href="{{route('dashboard.admin')}}">
                                            <span class="w-3.5 mr-1 text-2xl">
                                                <i class="las la-tachometer-alt"></i>
                                            </span>
                                            <span class="ml-4">Dashboard</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                            <ul>
                                {{-- Plants --}}
                                @if (request()->routeIs('plants.admin', 'plants.admin.edit', 'plant-admin.create'))
                                    <li class="relative px-6 py-3">
                                        <span class="absolute inset-y-0 left-0 w-1 bg-green-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 " href="{{route('plants.admin')}}">
                                            <span class="w-3.5 mr-1 text-2xl">
                                                <i class="las la-tree"></i>
                                            </span>
                                            <span class="ml-4">Plants</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="relative px-6 py-3">
                                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 " href="{{route('plants.admin')}}">
                                            <span class="w-3.5 mr-1 text-2xl">
                                                <i class="las la-tree"></i>
                                            </span>
                                            <span class="ml-4">Plants</span>
                                        </a>
                                    </li>
                                @endif

                                @if (request()->routeIs('category.admin', 'category.admin.edit', 'category-admin.create'))
                                    <li class="relative px-6 py-3">
                                        <span class="absolute inset-y-0 left-0 w-1 bg-green-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 " href="{{route('category.admin')}}">
                                            <span class="w-3.5 mr-1 text-2xl">
                                                <i class="las la-tags transform scale-x-[-1]"></i>
                                            </span>
                                            <span class="ml-4">Categories</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="relative px-6 py-3">
                                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 " href="{{route('category.admin')}}">
                                            <span class="w-3.5 mr-1 text-2xl">
                                                <i class="las la-tags transform scale-x-[-1]"></i>
                                            </span>
                                            <span class="ml-4">Categories</span>
                                        </a>
                                    </li>
                                @endif

                            </ul>

                        </div>
                    </aside>
                    <!-- Mobile sidebar -->
                    <!-- Backdrop -->
                    <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                    </div>
                    <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white  md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">

                        <div class="py-4 text-gray-500 ">
                            <a class="ml-6 text-lg flex font-bold text-gray-800 " href="#">
                                <img src="{{asset('assets/images/logo.svg')}}" alt="logo" class="mr-3 h-6">
                                GreenGarden
                            </a>
                            <ul class="mt-6">
                                @if (request()->routeIs('dashboard.admin'))
                                    <li class="relative px-6 py-3">
                                        <span class="absolute inset-y-0 left-0 w-1 bg-green-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 " href="{{route('dashboard.admin')}}">
                                            <span class="w-3.5 mr-1 text-2xl">
                                                <i class="las la-tachometer-alt"></i>
                                            </span>
                                            <span class="ml-4">Dashboard</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="relative px-6 py-3">
                                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 " href="{{route('dashboard.admin')}}">
                                            <span class="w-3.5 mr-1 text-2xl">
                                                <i class="las la-tachometer-alt"></i>
                                            </span>
                                            <span class="ml-4">Dashboard</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                            <ul>
                                {{-- Plants Mobile --}}
                                @if (request()->routeIs('plants.admin', 'plants.admin.edit', 'plant-admin.create'))
                                    <li class="relative px-6 py-3">
                                        <span class="absolute inset-y-0 left-0 w-1 bg-green-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 " href="{{route('plants.admin')}}">
                                            <span class="w-3.5 mr-1 text-2xl">
                                                <i class="las la-tree"></i>
                                            </span>
                                            <span class="ml-4">Plants</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="relative px-6 py-3">
                                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 " href="{{route('plants.admin')}}">
                                            <span class="w-3.5 mr-1 text-2xl">
                                                <i class="las la-tree"></i>
                                            </span>
                                            <span class="ml-4">Plants</span>
                                        </a>
                                    </li>
                                @endif

                                @if (request()->routeIs('category.admin', 'category.admin.edit', 'category-admin.create'))
                                    <li class="relative px-6 py-3">
                                        <span class="absolute inset-y-0 left-0 w-1 bg-green-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 " href="{{route('category.admin')}}">
                                            <span class="w-3.5 mr-1 text-2xl">
                                                <i class="las la-tags transform scale-x-[-1]"></i>
                                            </span>
                                            <span class="ml-4">Categories</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="relative px-6 py-3">
                                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 " href="{{route('category.admin')}}">
                                            <span class="w-3.5 mr-1 text-2xl">
                                                <i class="las la-tags transform scale-x-[-1]"></i>
                                            </span>
                                            <span class="ml-4">Categories</span>
                                        </a>
                                    </li>
                                @endif

                            </ul>
                        </div>

                    </aside>
                    <div class="flex flex-col flex-1 w-full">

                        <header class="z-10 py-4 bg-white shadow-md ">
                            <div class="container flex items-center justify-between h-full px-6 mx-auto text-green-600 ">
                                <!-- Mobile hamburger -->
                                <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-green" @click="toggleSideMenu" aria-label="Menu">
                                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <!-- Search input -->
                                <div class="flex justify-center flex-1 lg:mr-32">
                                    <div class="relative w-full max-w-xl mr-6 focus-within:text-green-500 ">
                                        <div class="absolute inset-y-0 flex items-center pl-2">
                                            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" ></path>
                                            </svg>
                                        </div>
                                        <input class="w-full pl-8 pr-2 py-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border  rounded-md focus:placeholder-gray-500 focus:bg-white focus:border focus:border-green-300 focus:outline-none focus:shadow-outline-green form-input" type="text" placeholder="Search..." aria-label="Search"/>
                                    </div>
                                </div>
                                <ul class="flex items-center flex-shrink-0 space-x-6">
                                    <!-- Theme toggler -->

                                    <!-- Notifications menu -->
                                    <li class="relative">
                                        <button class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-green" @click="toggleNotificationsMenu" @keydown.escape="closeNotificationsMenu" aria-label="Notifications" aria-haspopup="true">
                                            <svg class="w-5 h-5"  aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                                            </svg>
                                            <!-- Notification badge -->
                                            <span aria-hidden="true" class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full "
                                            ></span>
                                        </button>
                                        <template x-if="isNotificationsMenuOpen">
                                            <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"  @click.away="closeNotificationsMenu"  @keydown.escape="closeNotificationsMenu"  class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md ">
                                                <li class="flex">
                                                    <a  class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 " href="#">
                                                        <span>Messages</span>
                                                        <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full ">
                                                        13
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="flex">
                                                    <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 " href="#">
                                                        <span>Sales</span>
                                                        <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full ">
                                                        2
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="flex">
                                                    <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 " href="#">
                                                        <span>Alerts</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </template>
                                    </li>
                                    <!-- Profile menu -->
                                    <li class="relative">
                                        <div x-data="{
                                            dropdownOpen: false
                                        }"
                                        class="relative">

                                        <button @click="dropdownOpen=true" class="inline-flex items-center justify-center h-12 py-2 pl-3 pr-5 text-sm font-medium transition-colors bg-white rounded-md text-neutral-700  active:bg-white focus:bg-white focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
                                            @if(auth()->check())
                                                @if(auth()->user()->user_img)
                                                    <img src="{{ auth()->user()->user_img }}" class="object-cover w-8 h-8 border rounded-full border-neutral-200" />
                                                @else
                                                    <div class="object-cover w-9 h-9 text-xl rounded-full bg-slate-50 text-slate-400 border-neutral-200 flex justify-center items-center">
                                                        <i class="las la-user"></i>
                                                    </div>
                                                @endif
                                                <span class="hidden md:flex flex-col items-start flex-shrink-0 h-full ml-2 leading-none translate-y-px">
                                                    <span>{{ auth()->user()->name }}</span>
                                                    <span class="text-xs font-light text-neutral-400">{{ auth()->user()->email }}</span>
                                                </span>
                                            @else
                                                <!-- Show your default image or handle the case when the user is not logged in -->
                                            @endif
                                        </button>


                                        <div x-show="dropdownOpen"
                                            @click.away="dropdownOpen=false"
                                            x-transition:enter="ease-out duration-200"
                                            x-transition:enter-start="-translate-y-2"
                                            x-transition:enter-end="translate-y-0"
                                            class="absolute top-0 z-50 w-56 mt-12 -translate-x-1/2 left-1/3"
                                            x-cloak>
                                            <div class="p-1 mt-1 bg-white border rounded-md shadow-md border-neutral-200/70 text-neutral-700">
                                                <div class="px-2 py-1.5 text-sm font-semibold">My Account</div>
                                                <div class="px-2 py-1.5 flex items-center">
                                                    @if(auth()->user()->user_img)
                                                        <img src="{{ auth()->user()->user_img }}" class="object-cover w-8 h-8 border rounded-full border-neutral-200" />
                                                    @else
                                                        <div class="object-cover w-8 h-8 border rounded-full bg-slate-50 text-slate-400 border-neutral-200 flex justify-center items-center">
                                                            <i class="fa-solid fa-user"></i>
                                                        </div>
                                                    @endif
                                                    <span class="flex flex-col items-start flex-shrink-0 h-full ml-2 leading-none translate-y-px">
                                                        <span class="text-sm">{{ auth()->user()->name }}</span>
                                                        <span class="text-xs font-light text-neutral-400">{{ auth()->user()->email }}</span>
                                                    </span>
                                                </div>
                                                <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                                                <a href="{{route('profile.edit')}}" class="relative flex cursor-default select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                    <span>Profile</span>
                                                </a>

                                                <a href="#_" class="relative flex cursor-default select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                    <span>Settings</span>
                                                </a>

                                                <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                                                <form action="{{ route('logout')}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="relative flex cursor-default text-red-500 select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" x2="9" y1="12" y2="12"></line></svg>
                                                        <span>Log out</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </li>

                                </ul>
                            </div>
                        </header>

                        <main class="h-full overflow-y-auto">
                            <div class="container py-6 px-2 md:p-6 mx-auto">
                                {{$slot}}
                            </div>
                        </main>
                    </div>
                </div>

            </body>
            <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
            <script>
                ClassicEditor
                    .create(document.querySelector('#editor'))
                    .then(editor => {
                        // Ambil nilai dari kolom deskripsi
                        const deskripsiValue = {!! json_encode(isset($plant) ? $plant->deskripsi : old('deskripsi')) !!};

                        // Set nilai konten editor
                        editor.setData(deskripsiValue);
                    })
                    .catch(error => {
                        console.error(error);
                    });
            </script>


        </html>

    </div>
</div>
