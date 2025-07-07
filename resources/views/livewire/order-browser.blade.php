<div class="flex flex-col gap-4 bg-white rounded-2xl p-4">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-6">
            <div class="relative text-[#797979]">
                <input type="text" placeholder="Search order..." wire:change="$set('search', $event.target.value)"
                    class="w-full pr-10 pl-4 py-2  border border-gray-500 rounded-md focus:outline-none" />

                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </div>
            </div>

            <div class="relative text-[#797979]">
                <select wire:change="$set('selectedStatus', $event.target.value)"
                    class="w-[150px] px-4 py-2 border border-gray-500 rounded-md focus:outline-none appearance-none"
                    name="status" id="status">
                    <option value="0">All Status</option>
                    <option value="1">Pending</option>
                    <option value="2">Completed</option>
                    <option value="3">Expired</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 10.939l3.71-3.71a.75.75 0 011.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0l-4.24-4.24a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>
        <button class="cursor-pointer px-4 py-2 bg-[#203D3F] rounded-md flex items-center text-white gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-plus-icon lucide-plus">
                <path d="M5 12h14" />
                <path d="M12 5v14" />
            </svg>
            <p class="text-sm">Add New Order</p>
        </button>
    </div>
    <div class="flex flex-col font-inter">
        <div class="rounded-t-3xl bg-[#EEF2F5] w-full flex items-center text-center p-3">
            <div class="w-[10%]"></div>
            <div class="w-[30%] text-start pl-1">Reference Id</div>
            <div class="w-[25%]">Total Amount</div>
            <div class="w-[20%]">Status</div>
            <div class="w-[15%]">Actions</div>
        </div>
        <div class="w-full flex flex-col text-center bg-white">
            @forelse ($orders as $order)
                <div class="w-full flex items-center border-x border-b border-[#EEF2F5] text-[#484848]">
                    <div class="w-[10%] pl-3 py-4">{{ $order->id }}</div>
                    <div class="w-[30%] text-start pl-3 border-x border-[#EEF2F5] py-4">{{ $order->reference_id }}</div>
                    <div class="w-[25%] py-4">₱{{ number_format($order->total_amount, 2) }}</div>
                    <div class="w-[20%] pr-1 border-x border-[#EEF2F5] py-3 flex items-center justify-center">
                        @if ($order->status == 'pending')
                            <div class="bg-[#ffeaba] py-2 px-4 w-fit rounded-full">
                                <p class="text-[#c77a0e] text-xs font-medium capitalize">{{ $order->status }}</p>
                            </div>
                        @elseif ($order->status == 'completed')
                            <div class="bg-[#c1eacad7] py-2 px-4 w-fit rounded-full">
                                <p class="text-[#16A34A] text-xs font-medium capitalize">{{ $order->status }}</p>
                            </div>
                        @else
                            <div class="bg-[#dc262633] py-2 px-4 w-fit rounded-full">
                                <p class="text-[#DC2626] text-xs font-medium capitalize">{{ $order->status }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="w-[15%] pr-4 py-3 flex items-center justify-center gap-2 text-xs">
                        <button wire:click='selectOrder({{ $order->id }})' class="cursor-pointer text-[#3B82F6]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-square-pen-icon lucide-square-pen">
                                <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                <path
                                    d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                            </svg>
                        </button>
                    </div>
                </div>
            @empty
                <div class="w-full py-8 flex items-center justify-center text-sm text-[#9A9A9A]">
                    No tasks found.
                </div>
            @endforelse
            <div class="w-full flex items-center justify-between h-fit p-2">
                <p class="">Showing {{ $orders->firstItem() }} to {{ $orders->lastItem() }} of
                    {{ $orders->total() }}
                    entries</p>
                <nav>
                    <div class="flex items-center -space-x-px h-8">
                        <button wire:click="previousPage" wire:loading.attr="disabled"
                            @if ($orders->onFirstPage()) disabled @endif
                            class="text-gray-500 disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer flex items-center justify-center px-3 h-8 ms-0 leading-tight bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">
                            <span class="sr-only">Previous</span>
                            <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                        </button>

                        @foreach (range(1, $orders->lastPage()) as $page)
                            <div wire:click="gotoPage({{ $page }})"
                                class="flex items-center justify-center px-3 h-8 leading-tight
                                    {{ $orders->currentPage() === $page
                                        ? 'text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700'
                                        : 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 cursor-pointer' }}">
                                {{ $page }}
                            </div>
                        @endforeach


                        <button wire:click="nextPage" wire:loading.attr="disabled"
                            @if (!$orders->hasMorePages()) disabled @endif
                            class="flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">
                            <span class="sr-only">Next</span>
                            <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                        </button>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    @if ($showModal && $selectedOrder)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-xs">
            <div
                class="bg-white rounded-xl shadow-lg max-w-[280px] md:max-w-lg gap-6 w-full p-8 relative font-inter flex flex-col items-center justify-center">
                <div class="flex flex-col w-full gap-4 font-poppins">
                    <div class="flex w-full items-center justify-between">
                        <div class="flex flex-col">
                            <h1 class="font-semibold text-xl mb-2">Order Details</h1>
                            <p class="text-sm">Order #: {{ str_pad($selectedOrder->id, 4, '0', STR_PAD_LEFT) }}</p>
                            <p class="text-sm">Reference Id#: {{ $selectedOrder->reference_id }}</p>
                        </div>
                        <div>
                            @if ($selectedOrder->status == 'pending')
                                <div class="bg-[#ffeaba] py-2 px-4 w-fit rounded-full">
                                    <p class="text-[#c77a0e] text-sm capitalize">{{ $selectedOrder->status }}</p>
                                </div>
                            @elseif ($selectedOrder->status == 'completed')
                                <div class="bg-[#c1eacad7] py-2 px-4 w-fit rounded-full">
                                    <p class="text-[#16A34A] text-sm capitalize">{{ $selectedOrder->status }}</p>
                                </div>
                            @else
                                <div class="bg-[#dc262633] py-2 px-4 w-fit rounded-full">
                                    <p class="text-[#DC2626] text-sm capitalize">{{ $selectedOrder->status }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-2 w-full">
                    <h1 class="font-medium">Order items({{ count($selectedOrder->orderProducts) }})</h1>
                    <div class="flex items-center text-center text-xs text-[#747474]">
                        <div class="w-[50%]">ITEMS</div>
                        <div class="w-[15%]">QTY</div>
                        <div class="w-[35%]">PRICE</div>
                    </div>
                    <div
                        class="flex flex-col items-center max-h-[150px] overflow-hidden overflow-y-auto custom-scrollbar">
                        @foreach ($selectedOrder->orderProducts as $order)
                            <div class="flex items-center w-full">
                                <div class="w-[50%]">{{ $order->product->name }}</div>
                                <div class="w-[15%] text-center">x{{ $order->quantity }}</div>
                                <div class="w-[35%] text-center">
                                    ₱{{ number_format($order->product->price * $order->quantity, 2) }}</div>
                            </div>
                        @endforeach
                    </div>
                    <hr class="w-full h-px border-[#BBBBBB] mt-4">
                    <div class="w-full flex items-center justify-between">
                        <p class="font-bold">Total:</p>
                        <p class="w-[35%] text-center">₱{{ number_format($selectedOrder->total_amount, 2) }}</p>
                    </div>
                </div>



                <div class="flex items-center justify-center w-full gap-4 mt-6">
                    <button
                        class="cursor-pointer flex gap-2 items-center py-2 px-4 bg-[#16A34A] rounded-md text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-circle-check-big-icon lucide-circle-check-big">
                            <path d="M21.801 10A10 10 0 1 1 17 3.335" />
                            <path d="m9 11 3 3L22 4" />
                        </svg>
                        <p>Mark as Complete</p>
                    </button>
                    <button wire:click='closeModal'
                        class="cursor-pointer flex gap-2 items-center py-2 px-4 bg-red-500 rounded-md text-white">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
