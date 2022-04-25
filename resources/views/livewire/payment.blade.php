<div class="flex justify-center">
    <main class="p-4 items-center bg-blue-100 rounded-lg shadow-md mt-16 mb-16 " style="width:30rem">
        <form wire:submit.prevent="store">
            <img class="w-full h-auto" src="https://www.computop-paygate.com/Templates/imagesaboutYou_desktop/images/svg-cards/card-visa-front.png" alt="front credit card">
            <h1 class="text-xl font-semibold text-gray-700 text-center">مرحله پرداخت پول</h1>
            <div class="">
                <div class="my-3">
                    <input wire:model="cardHolder" type="text" class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none" placeholder="شماره کوتاه" maxlength="22" x-model="cardholder">
                </div>
                <div class="my-3">
                    <input wire:model="cardNumber" type="text" class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none" placeholder="شماره کارت" x-model="cardNumber" x-on:keydown="format()" x-on:keyup="isValid()" maxlength="19">
                </div>
                <div class="my-3 flex flex-col">
                    <div class="mb-2">
                        <label for="" class="text-gray-700">تاریخ انقضاء</label>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                        <input wire:model="year" type="text" class="block w-full col-span-1 px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none" placeholder="سال" maxlength="3">
                        <input wire:model="month" type="text" class="block w-full col-span-1 px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none" placeholder="ماه" maxlength="3">
                        <input wire:model="securityNumber" type="text" class="block w-full col-span-2 px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none" placeholder="کد امنیتی" maxlength="3">
                    </div>
                </div>
            </div>
            <button class="submit-button px-4 py-3 rounded-full bg-blue-300 text-blue-900 focus:ring focus:outline-none w-full text-xl font-semibold transition-colors" type="submit">
               پرداخت
            </button>
        </form>
    </main>
</div>
