<header class="transition-all duration-300 ease-in-out">
    <div class="w-full relative z-20 item opacity-0 transition duration-1000 ease-in-out delay-300" id="navbar">
        <nav class="bg-opacity-0 p-4 fixed w-full">
            <div class="container mx-auto flex items-center justify-between lg:px-10">
                <a href="{{route('dashboard')}}" class="flex items-center">
                    <svg width="50" height="50" viewBox="0 0 2587 1417" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <mask id="mask0_134_3629" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="2587" height="1417">
                            <path d="M251.8 783.104C267.733 880.713 314.226 968.044 381.127 1034.96C464.773 1118.6 580.363 1170.35 708.027 1170.35C774.585 1170.35 839.047 1156.38 897.435 1130.21C919.427 1120.35 940.684 1108.71 960.996 1095.39C936.703 1034.34 901.991 978.641 858.896 930.584C788.61 852.236 695.658 793.793 588.982 765.2C532.439 750.051 475.363 743.799 419.742 746.361C369.857 748.65 300.79 766.836 251.8 783.104ZM1236.49 1179.03C1169.56 1254.1 1087.79 1313.29 997.263 1353.87C906.753 1394.44 808.29 1416.09 708.027 1416.09C512.524 1416.09 335.506 1336.83 207.375 1208.7C79.252 1080.57 0 903.56 0 708.046C0 512.538 79.253 335.522 207.375 207.389C335.505 79.255 512.524 0 708.027 0C903.53 0 1080.54 79.255 1208.67 207.389C1336.79 335.523 1416.05 512.538 1416.05 708.046C1416.05 835.706 1467.8 951.296 1551.44 1034.96C1635.09 1118.6 1750.67 1170.35 1878.34 1170.35C2006 1170.35 2121.59 1118.6 2205.24 1034.96C2288.89 951.296 2340.63 835.706 2340.63 708.046C2340.63 580.378 2288.89 464.794 2205.24 381.137C2121.59 297.486 2006 245.742 1878.34 245.742C1811.78 245.742 1747.32 259.713 1688.93 285.882C1666.94 295.736 1645.68 307.378 1625.37 320.698C1649.66 381.754 1684.38 437.451 1727.47 485.508C1797.76 563.856 1890.71 622.296 1997.38 650.889C2053.93 666.039 2111 672.293 2166.62 669.728C2222.62 667.158 2278.94 655.734 2333.58 635.566C2131.45 1001.98 1442.49 836.26 1349.88 237.055C1416.8 161.989 1498.57 102.8 1589.1 62.225C1679.61 21.65 1778.07 0 1878.34 0C2073.84 0 2250.86 79.255 2378.99 207.389C2507.11 335.523 2586.36 512.53 2586.36 708.046C2586.36 903.552 2507.11 1080.57 2378.99 1208.7C2250.86 1336.83 2073.84 1416.09 1878.34 1416.09C1682.84 1416.09 1505.82 1336.83 1377.69 1208.7C1249.57 1080.57 1170.31 903.552 1170.31 708.046C1170.31 580.384 1118.57 464.794 1034.92 381.137C951.273 297.486 835.691 245.742 708.027 245.742C580.363 245.742 464.774 297.485 381.127 381.137C297.481 464.794 245.736 580.383 245.736 708.046C245.736 733.603 247.811 758.665 251.8 783.096C501.195 405.969 1162.48 700.253 1236.49 1179.03Z" fill="white"/>
                        </mask>
                        <g mask="url(#mask0_134_3629)">
                            <path d="M2586.37 0H0V1416.09H2586.37V0Z" fill="url(#paint0_linear_134_3629)"/>
                        </g>
                        <defs>
                            <linearGradient id="paint0_linear_134_3629" x1="1280.2" y1="1453.46" x2="1309.41" y2="-223.914" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#045304"/>
                                <stop offset="1" stop-color="#B0F122"/>
                            </linearGradient>
                        </defs>
                    </svg>
                    <span class="text-green-700 text-xl md:text-2xl font-bold ml-3">GreenGarden</span>
                </a>

                <div class="flex space-x-4">
                    <div class="flex justify-center items-center space-x-2">
                        <a href="{{'search'}}" class="mx-5 p-1"><i class="las la-search text-3xl transform scale-x-[-1]"></i></a>
                        @if (auth()->check())
                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none transition ease-in-out duration-150">
                                            <div>{{ Auth::user()->name }}</div>

                                            <div class="ml-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content" >
                                        <div class="px-5 pb-1.5 pt-3 text-sm font-semibold">My Account</div>
                                        <div class="px-5 pb-1.5 flex items-center">
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
                                        <div class="h-px my-1 -mx-1 bg-neutral-200 px-5"></div>
                                        <a href="{{route('profile.edit')}}" class="relative flex px-5 cursor-default select-none hover:bg-neutral-100 items-center rounded py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                            <span>Profile</span>
                                        </a>

                                        <a href="#_" class="relative flex cursor-default px-5 select-none hover:bg-neutral-100 items-center rounded  py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                            <span>Settings</span>
                                        </a>

                                        <div class="h-px my-1 px-5 -mx-1 bg-neutral-200"></div>
                                        <form action="{{ route('logout')}}" method="post">
                                            @csrf
                                            <button type="submit" class="relative flex px-5 cursor-default text-red-500 select-none hover:bg-neutral-100 items-center rounded py-1.5 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 w-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" x2="9" y1="12" y2="12"></line></svg>
                                                <span>Log out</span>
                                            </button>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        @else
                            <a href="{{route('login')}}" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-green-600 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">Masuk</a>
                            <a href="{{route('register')}}" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">Daftar</a>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
