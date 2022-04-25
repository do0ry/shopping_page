<div>
    <div id="menu" class="container mx-auto px-4 lg:pt-24 lg:pb-8">
        <div class="relative flex block -mt-16">
            <a href="#">
                @auth
                    <div wire:click="store" class="bg-green-50 shadow-md rounded-lg h-16 w-48 pt-5 pl-8 hover:bg-gray-200">
                        تکمیل فرآیند خرید
                    </div>
                @else
                    <a href="{{ route('login') }}">
                        <div class="bg-green-50 shadow-md rounded-lg h-16 w-48 pt-5 pl-8 hover:bg-gray-200">
                            تکمیل فرآیند خرید
                        </div>
                    </a>
                @endauth
            </a>
        </div>
        <div>
            <div class="flex flex-col absolute shadow-lg rounded-md border border-green-50 bg-white w-40 h-16 ml-40 -mt-6 items-center">
                <div class="items-center mt-1 ml-10 text-right">
                    :مبلغ کل
                </div>
                <div class="items-center mt-1 ml-1 text-left">
                    ${{$cart->totalPrice}}
                </div>
            </div>
        </div>
        <div class="flex flex-col min-w-0 break-words w-full mb-2 shadow-lg rounded bg-white mt-20">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-base text-blueGray-700 text-right py-4">
                            لیست خرید
                        </h3>
                    </div>
                </div>
            </div>
            <div class="block w-full overflow-x-auto overflow-y-auto" style="height: 33rem">
                <table class="items-center w-full border-collapse text-blueGray-700">
                    <thead class="thead-light ">
                    <tr>
                        <th class="text-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            قیمت کل
                        </th>
                        <th class="text-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            تعداد
                        </th>
                        <th class="text-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            توضیحات
                        </th>
                        <th class="text-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            کالا
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cartProducts as $product)
                    <tr>
                        <td class="text-center border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            ${{$product->totalPrice}}
                        </td>
                        <td class="text-center border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            {{$product->pivot->quantity}}
                        </td>
                        <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right">
                            {{$product->title}}
                        </th>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <img alt="..." src="https://source.unsplash.com/gUBJ9vSlky0" class="h-24 w-24 rounded  mx-auto">
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
