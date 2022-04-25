<div>
    <div class="bg-blue w-full p-2 flex justify-center font-sans">
        @include('components.product.baner')
    </div>
    <div class="container mx-auto px-4">
        <h2 class="rounded-full text-xl text-gray-500 flex uppercase tracking-wider font-semibold mt-8 mr-9 justify-center items-center bg-white shadow-md border border-gray-200 p-6">محصولات</h2>
        <div class="products grid grid-cols-4 gap-12 border-b border-gray-200 pb-8">
            @foreach($products as $product)
             <div class="mt-8 bg-white shadow-lg p-3">
                <div class="relative inline-block">
{{--                    <a><img src="{{asset($product->medias->first()->path)}}" alt=""></a>--}}
                    <a><img src="{{asset('media/img/products/2.jpg')}}" alt=""  style="height: 29rem; width: 20rem"></a>
                    <div class="bg-gray-300 absolute rounded-full bottom-0 right-0 w-16 h-16" style="right: -20px;bottom: -20px">
                        <div class="flex h-full items-center justify-center">۸۰%</div>
                    </div>
                </div>
                <div class="mt-8 leading-tight block flex justify-between">
                    <div>
                        this is one of the most uhrhfuahwfphewfafuehf afawhfu
                    </div>
                    <div wire:click="store({{$product->id}})" class="rounded-full border bg-blue-100 p-3 w-15 hover:bg-blue-300">
                        خرید
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
