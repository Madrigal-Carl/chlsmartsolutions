@php
    $order = \App\Models\Order::with('orderProducts.product')->find(session('orderId'));
@endphp

<div>
    @if ($order)
        <div x-data="{ show: {{ session('showCard') ? 'true' : 'false' }} }" x-show="show" x-transition x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-xs">
            <div class="bg-white flex flex-col rounded-xl font-inter p-6 gap-4 w-[320px] md:w-[450px]">
                <div class="flex flex-col items-center justify-center gap-2">
                    <div class="flex items-center gap-2">
                        <img class="w-6 md:w-8" src="{{ asset('images/chlss_logo.png') }}" alt="chlss_logo.png">
                        <p class="font-bold text-xs md:text-base">CHL Distri&IT Solutions</p>
                    </div>
                    <div class="flex flex-col items-center text-center">
                        <p class="text-[#747474] text-[0.6rem] md:text-[0.7rem]">2nd flr. Vanessa Olga Building,
                            Malusak, Boac,
                            Marinduque
                        </p>
                        <p class="text-[#747474] text-[0.6rem] md:text-[0.7rem]">(+63) 9992264818 |
                            chldisty888@gmail.com</p>
                    </div>
                </div>
                <div class="flex flex-col">
                    <p class="font-bold mb-2 text-xs md:text-base">Sales Receipt</p>
                    <div class="flex items-center justify-between text-[0.7rem] md:text-sm">
                        <p>Reference #: <span class="text-[#747474]">{{ session('referenceId') }}</span></p>
                        <p>Order #:<span class="text-[#747474]">{{ session('orderId') }}</span></p>
                    </div>
                    <p class="text-[0.7rem] md:text-sm">Date: <span
                            class="text-[#747474]">{{ now()->format('F j, Y') }}</span>
                    </p>
                    <hr class="w-full h-px border-[#BBBBBB] mt-4">
                </div>
                <div class="flex flex-col text-[0.7rem] md:text-sm gap-2">
                    <div class="flex items-center text-center text-[#747474]">
                        <div class="w-[50%]">PRODUCTS</div>
                        <div class="w-[15%]">QTY</div>
                        <div class="w-[35%]">PRICE</div>
                    </div>
                    <div
                        class="flex flex-col items-center max-h-[100px] overflow-hidden overflow-y-auto custom-scrollbar">
                        @foreach ($order->orderProducts as $item)
                            <div class="flex items-center w-full">
                                <div class="w-[50%]">{{ $item->product->name }}</div>
                                <div class="w-[15%] text-center">x{{ $item->quantity }}</div>
                                <div class="w-[35%] text-center">
                                    ₱{{ number_format($item->quantity * $item->product->price, 2) }}</div>
                            </div>
                        @endforeach

                    </div>
                    <hr class="w-full h-px border-[#BBBBBB] mt-4">
                    <div class="w-full flex items-center justify-between">
                        <p class="font-bold">Total:</p>
                        <p class="w-[35%] text-center">₱{{ number_format(session('total'), 2) }}</p>
                    </div>
                </div>
                <div class="w-full flex flex-col items-center justify-center text-center text-[#747474]">
                    <p class="text-[#747474] text-[0.6rem] md:text-[0.7rem]">Thank you for choosing our services!
                    </p>
                    <p class="text-[#747474] text-[0.6rem] md:text-[0.7rem]">For support, contact us at
                        chldisty888@gmail.com</p>
                    <hr class="w-full h-px border-[#BBBBBB] mt-4">
                    <div class="flex items-center text-white mt-6 gap-4 text-xs md:text-sm">
                        <button class="bg-[#5AA526] py-2 px-4 rounded-md cursor-pointer">Download</button>
                        <button wire:click="clearSession" @click="show = false"
                            class="bg-black py-2 px-4 rounded-md cursor-pointer">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
