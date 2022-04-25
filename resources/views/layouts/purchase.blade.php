<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="{{asset('tailwind/tailwind.min.css')}}" rel="stylesheet">
        <title>central park market</title>

        <style>
            .line-clamp-3 {
                overflow: hidden;
                display: -webkit-box;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 2;
                direction: rtl;
            }
        </style>
        @livewireStyles
    </head>
    <body class="bg-gray-50 text-black ">
        <header>
            <nav class="flex justify-between items-center py-8 px-4 mx-auto container border-b border-gray-300">
                <div class="flex-col items-center">
                    <div class="flex items-center mx-5">
                        <div class="ml-4 mr-4 border-gray-400 border-r px-4 flex">
                            @inject('cartService','Platform\Contracts\CookieContract')
                            <div class="mr-1">({{$cartService->countProducts()}})</div>
                            <a href="{{url('/cart')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </a>
                        </div>
                        <div class="flex border border-gray-400 rounded-md px-2 py-2">
                            @if (Route::has('login'))
                                @auth
                                    <form method="POST" action="{{ route('logout') }}" class="relative text-sm text-gray-900 hover:text-gray-600 mr-1">
                                        @csrf
                                        <button type="submit" class="text-sm text-gray-900 hover:text-gray-600">
                                            {{ __('خروج') }}
                                        </button>
                                    </form>
                                    <div class="border-l border-gray-400 px-2 text-sm">{{Auth::user()->first_name}}</div>
                                @else
                                    <a href="{{ route('login') }}" class="flex">
                                        <div class="px-2 text-sm">ثبت نام</div>
                                        <div class="border-l border-gray-400 px-2 text-sm">ورود</div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                        </svg>
                                    </a>
                                @endauth
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center ml-12 mt-8">
                        <div class="mr-2 text-gray-۴00 text-sm">لطفا شهر خود را انتخاب کنید</div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>
                <div class="flex-col align-items-start">
                    <div class="flex">
                        <div class="relative ml-20">
                            <div class="absolute top-0 h-full ml-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input type="text" class="h-8 mt-1 px-2 py-6 rounded-full bg-gray-100 text-right focus:outline-none focus:ring-gray-300" placeholder="جستجو" style="width: 30rem"/>
                        </div>
                        <img src="{{asset('media/symbol-pure-negative.svg')}}" class="w-10 h-10 ml-4" alt="My Happy SVG" />
                    </div>
                    <div class="">
                        <ul class="flex mt-8 relative mr-10">
                            <a href="/"><li class="hover:text-gray-400 ml-3">دستهبندی کالاها</li></a>
                            <li class="hover:text-gray-400 ml-3">پرفروش ترین ها</li>
                            <li class="hover:text-gray-400 ml-3">تخفیف ها</li>
                            <li class="hover:text-gray-400 ml-3">شگفت انگیزها</li>
                            <li class="hover:text-gray-400 ml-3">سوالی دارید؟</li>
                            <li class="hover:text-gray-400 ml-3">فروشنده شوید</li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main class="">
            @yield('content')
        </main>
        <footer class="border-t border-gray-400">
            <div class="container mx-auto px-4 py-6">
                تمامی حقوق این سایت متعلق به اسپیناس می باشد
            </div>
        </footer>
        @livewireScripts
    </body>
</html>
