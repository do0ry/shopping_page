<div>
    <div class="container bg-pink-50 mx-auto flex">
        @if($cart->first() || !$cart->isEmpty())
        <a href="{{asset('/order')}}" class="flex h-10">
            <button class="relative bg-white shadow-md rounded-lg w-32 h-10 mt-4 pl-4 flex ml-4 items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-6 w-6 mr-16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                </svg>
                ادامه
            </button>
        </a>
        <div class="ml-4 px-4 flex items-center justify-center">
            <div class="products grid grid-cols-3 gap-16 border-b border-gray-200 pb-8">
                @foreach($cart as $product)
                <div class="mt-32 bg-white shadow-lg p-3 h-50" style="width:22rem">
                    <div class="relative inline-block items-center ml-1">
                        {{--                    <a><img src="{{asset($product->medias->first()->path)}}" alt=""></a>--}}
                        <a><img src="{{asset('media/img/products/2.jpg')}}" alt=""  style="height: 29rem; width: 20rem"></a>
                    </div>
                    <div class="mt-8 leading-tight justify-between items-center">
                        <div class="p-2 line-clamp-3 mb-3" style="height: 3.2rem; width: 20rem">
                            {{$product->title}}
                        </div>
                        <div class="flex border border-gray-300 px-2 rounded-lg mr-3" style="width: 6rem">
                            <button wire:click="quantity({{($product->pivot->quantity)+1}},{{$product->id}})" class="mr-4 border-r pr-2 font-semibold">
                                +
                            </button>
                            <div class="">
                                {{$product->pivot->quantity ?? 0}}
                            </div>
                            <button wire:click="quantity({{($product->pivot->quantity)-1}},{{$product->id}})" class="ml-4 border-l pl-2 font-bold">
                                -
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="w-full">
            <div class="m-6 mt-2 mb-16">
                <div class="bg-white border border-r-4 border-gray-200 text-orange-700 p-4" role="alert">
                    <p class="font-bold text-right">سبد خرید خالی است</p>
                    <p class="text-right">لطفا کالای مورد نظر خود را اضافه کنید</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
