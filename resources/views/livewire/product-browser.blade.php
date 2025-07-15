<div class="flex flex-col gap-6">
    <div class="flex items-center font-poppins gap-4">
        <div class="flex-1 flex items-center gap-2 bg-white rounded-lg pl-4 px-10 py-4 border-l-6 border-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-9 text-blue-600">
                <path
                    d="M11.644 1.59a.75.75 0 0 1 .712 0l9.75 5.25a.75.75 0 0 1 0 1.32l-9.75 5.25a.75.75 0 0 1-.712 0l-9.75-5.25a.75.75 0 0 1 0-1.32l9.75-5.25Z" />
                <path
                    d="m3.265 10.602 7.668 4.129a2.25 2.25 0 0 0 2.134 0l7.668-4.13 1.37.739a.75.75 0 0 1 0 1.32l-9.75 5.25a.75.75 0 0 1-.71 0l-9.75-5.25a.75.75 0 0 1 0-1.32l1.37-.738Z" />
                <path
                    d="m10.933 19.231-7.668-4.13-1.37.739a.75.75 0 0 0 0 1.32l9.75 5.25c.221.12.489.12.71 0l9.75-5.25a.75.75 0 0 0 0-1.32l-1.37-.738-7.668 4.13a2.25 2.25 0 0 1-2.134-.001Z" />
            </svg>
            <div class="flex flex-col">
                <p class="text-[0.6rem]">Overall</p>
                <p class="text-sm font-medium">Products</p>
            </div>
            <h1 class="ml-4 text-2xl font-extrabold">{{ $this->allProducts }}</h1>
        </div>
        <div class="flex-1 flex items-center gap-2 bg-white rounded-lg pl-4 px-10 py-4 border-l-6 border-[#10B981]">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="size-9 text-[#10B981]">
                <path fill-rule="evenodd"
                    d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z"
                    clip-rule="evenodd" />
            </svg>
            <div class="flex flex-col">
                <p class="text-[0.6rem]">Overall</p>
                <p class="text-sm font-medium">Category</p>
            </div>
            <h1 class="ml-4 text-2xl font-extrabold">{{ $this->allCategory }}</h1>
        </div>
        <div class="flex-1 flex items-center gap-2 bg-white rounded-lg pl-4 px-10 py-4 border-l-6 border-[#EAB308]">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="size-9 text-[#EAB308]">
                <path fill-rule="evenodd"
                    d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                    clip-rule="evenodd" />
            </svg>
            <div class="flex flex-col">
                <p class="text-[0.6rem]">Overall</p>
                <p class="text-sm font-medium">Low Stock</p>
            </div>
            <h1 class="ml-4 text-2xl font-extrabold">{{ count($this->getStocks('low')) }}</h1>
        </div>
        <div class="flex-1 flex items-center gap-2 bg-white rounded-lg pl-4 px-10 py-4 border-l-6 border-[#DC2626]">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="size-9 text-[#DC2626]">
                <path
                    d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 1 1 6 0h3a.75.75 0 0 0 .75-.75V15Z" />
                <path
                    d="M8.25 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0ZM15.75 6.75a.75.75 0 0 0-.75.75v11.25c0 .087.015.17.042.248a3 3 0 0 1 5.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 0 0-3.732-10.104 1.837 1.837 0 0 0-1.47-.725H15.75Z" />
                <path d="M19.5 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
            </svg>
            <div class="flex flex-col">
                <p class="text-[0.6rem]">Overall</p>
                <p class="text-sm font-medium">Out of Stock</p>
            </div>
            <h1 class="ml-4 text-2xl font-extrabold">{{ count($this->getStocks('out')) }}</h1>
        </div>
    </div>
    <div class="flex flex-col gap-4">
        @if (count($outStocks) > 0)
            <div class="flex items-center font-poppins gap-4 border-l-6 border-[#DC2626] p-4 bg-[#DC2626]/16">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="size-10 text-[#DC2626]">
                    <path
                        d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 1 1 6 0h3a.75.75 0 0 0 .75-.75V15Z" />
                    <path
                        d="M8.25 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0ZM15.75 6.75a.75.75 0 0 0-.75.75v11.25c0 .087.015.17.042.248a3 3 0 0 1 5.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 0 0-3.732-10.104 1.837 1.837 0 0 0-1.47-.725H15.75Z" />
                    <path d="M19.5 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                </svg>
                <div class="flex flex-col gap-1 text-[#7C2D12] w-full">
                    <p class="font-medium text-sm">Out of Stock Alert - {{ count($this->getStocks('out')) }} item(s)
                        need attention
                    </p>
                    <div class="flex items-center gap-2 text-xs font-medium w-full overflow-hidden">
                        @foreach ($outStocks as $outStock)
                            <div class="bg-[#DC2626]/15 py-1 px-3 rounded-full font-inter h-6">
                                <p class="text-[#DC2626] line-clamp-1">{{ $outStock->name }}
                                </p>
                            </div>
                        @endforeach
                        @if (count($this->getStocks('out')) - count($outStocks) > 0)
                            <div class="bg-[#DC2626]/20 py-1 px-3 rounded-full font-inter">
                                <p class="text-[#DC2626] line-clamp-1">
                                    +{{ count($this->getStocks('out')) - count($outStocks) }} more
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
        @if (count($lowStocks) > 0)
            <div class="flex items-center font-poppins gap-4 border-l-6 border-[#EAB308] p-4 bg-[#EAB308]/16">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="size-10 text-[#EAB308]">
                    <path fill-rule="evenodd"
                        d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                        clip-rule="evenodd" />
                </svg>
                <div class="flex flex-col gap-1 text-[#5c4605] w-full">
                    <p class="font-medium text-sm">Low Stock Alert - {{ count($this->getStocks('low')) }} items(s) need
                        attention</p>
                    <div class="flex items-center gap-2 text-xs font-medium w-full overflow-hidden">
                        @foreach ($lowStocks as $lowStock)
                            <div class="bg-[#EAB308]/50 py-1 px-3 rounded-full font-inter h-6">
                                <p class="line-clamp-1">{{ $lowStock->name }}
                                </p>
                            </div>
                        @endforeach
                        @if (count($this->getStocks('low')) - count($lowStocks) > 0)
                            <div class="bg-[#EAB308]/50 py-1 px-3 rounded-full font-inter">
                                <p class="line-clamp-1">+{{ count($this->getStocks('low')) - count($lowStocks) }} more
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="flex flex-col gap-2 bg-white rounded-md p-4 font-poppins">
        <h1 class="text-[#203D3F] text-lg font-semibold">Stock Recommendations <span
                class="text-[#9F9F9F] text-sm">(14-day usage)</span></h1>
        <div class="grid grid-cols-2 gap-4">
            @for ($i = 0; $i < 4; $i++)
                <div class="p-2 rounded-md bg-[#F4F5F9] flex items-center justify-between gap-12">
                    <div class="flex flex-col">
                        <div class="flex items-center gap-4">
                            <h1 class="line-clamp-1 text-[#484848] font-semibold text-sm">Lenovo Ideapad Slim 3</h1>
                            <div
                                class="bg-[#dc262633] font-inter py-1 px-3 w-fit rounded-full text-[#DC2626] flex gap-1 items-center justify-center text-xs capitalize">
                                High Priority
                            </div>
                        </div>
                        <p class="text-xs text-[#9F9F9F]">Laptop and Desktop</p>
                    </div>
                    <button class="bg-[#2563EB] rounded-md py-2 px-4 text-white flex items-center gap-1 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-plus-icon lucide-plus">
                            <path d="M5 12h14" />
                            <path d="M12 5v14" />
                        </svg>
                        <p class="text-xs">Restock</p>
                    </button>
                </div>
            @endfor
        </div>

    </div>
    <div class="flex flex-col gap-4 bg-white rounded-2xl p-4">
        <h1 class="text-[#203D3F] text-lg font-semibold">Product Inventory</h1>
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-6">
                <div class="relative text-[#797979]">
                    {{-- wire:input.debounce.300ms="$set('search', $event.target.value)" --}}
                    <input type="text" placeholder="Search products..."
                        class="w-full pr-10 pl-4 py-2  border border-gray-500 rounded-md focus:outline-none" />

                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </div>
                </div>

                <div class="relative text-[#797979]">
                    {{-- wire:change="$set('selectedStatus', $event.target.value)" --}}
                    <select
                        class="w-[200px] px-4 py-2 border border-gray-500 rounded-md focus:outline-none appearance-none"
                        name="status" id="status">
                        <option value="all">All Category</option>
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
            <div class="flex items-center gap-6">
                {{-- wire:click="$set('activeTab', 'addOrder')" --}}
                <button class="cursor-pointer px-4 py-2 bg-[#203D3F] rounded-md flex items-center text-white gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-plus-icon lucide-plus">
                        <path d="M5 12h14" />
                        <path d="M12 5v14" />
                    </svg>
                    <p class="text-sm">Add New Product</p>
                </button>
                {{-- wire:click="$set('activeTab', 'addOrder')" --}}
                <button class="cursor-pointer px-4 py-2 bg-[#203D3F] rounded-md flex items-center text-white gap-2">
                    <p class="text-sm">Category</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-move-right-icon lucide-move-right">
                        <path d="M18 8L22 12L18 16" />
                        <path d="M2 12H22" />
                    </svg>
                </button>

            </div>
        </div>
        <div class="flex flex-col font-inter">
            <div class="rounded-t-3xl bg-[#EEF2F5] w-full flex items-center text-center p-3">
                <div class="w-[35%] text-start pl-1">Product Name</div>
                <div class="w-[15%]">Category</div>
                <div class="w-[10%]">Stock</div>
                <div class="w-[15%]">Price</div>
                <div class="w-[15%]">Status</div>
                <div class="w-[10%]">Actions</div>
            </div>
            <div class="w-full flex flex-col text-center bg-white">
                @for ($i = 0; $i < 3; $i++)
                    <div class="w-full flex items-center text-sm border-x border-b border-[#EEF2F5] text-[#484848]">
                        <div
                            class="w-[35%] text-start px-1 pl-3 border-x border-[#EEF2F5] py-4 flex items-center gap-2 line-clamp-1">
                            Lenovo Ideapad Slim 3</div>
                        <div class="w-[15%] py-4 px-1">
                            <p class="line-clamp-1">Power & Charging Solutions</p>
                        </div>
                        <div class="w-[10%] py-4 px-1 border-x border-[#EEF2F5]">0/15</div>
                        <div class="w-[15%] py-4 px-1">₱999,999.00</div>
                        <div class="w-[15%] pr-1 border-x border-[#EEF2F5] py-3 flex items-center justify-center">
                            {{-- @if ($order->status == 'pending') --}}
                            <div
                                class="bg-[#ffeaba] py-2 px-4 w-fit rounded-full text-[#c77a0e] flex gap-1 items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-trending-up-down-icon lucide-trending-up-down">
                                    <path d="M14.828 14.828 21 21" />
                                    <path d="M21 16v5h-5" />
                                    <path d="m21 3-9 9-4-4-6 6" />
                                    <path d="M21 8V3h-5" />
                                </svg>
                                <p class="text-xs capitalize">Low Stock</p>
                            </div>
                            {{-- @elseif ($order->status == 'completed')
                                <div
                                    class="bg-[#c1eacad7] py-2 px-4 w-fit rounded-full text-[#16A34A] flex gap-1 items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-down-icon lucide-trending-down"><path d="M16 17h6v-6"/><path d="m22 17-8.5-8.5-5 5L2 7"/></svg>
                                    <p class="text-xs capitalize">{{ $order->status }}</p>
                                </div>
                            @else
                                <div
                                    class="bg-[#dc262633] py-2 px-4 w-fit rounded-full text-[#DC2626] flex gap-1 items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up-icon lucide-trending-up"><path d="M16 7h6v6"/><path d="m22 7-8.5 8.5-5-5L2 17"/></svg>
                                    <p class="text-xs capitalize">{{ $order->status }}</p>
                                </div>
                            @endif --}}
                        </div>
                        <div class="w-[10%] pr-4 py-3 flex items-center justify-center gap-2 text-xs">
                            {{-- wire:click='selectOrder({{ $order->id }})' --}}
                            <button class="cursor-pointer text-[#3B82F6]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-square-pen-icon lucide-square-pen">
                                    <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                    <path
                                        d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endfor

                {{-- @empty
                <div class="w-full py-8 flex items-center justify-center text-sm text-[#9A9A9A]">
                    No tasks found.
                </div>
            @endforelse --}}
                {{-- <div class="w-full flex items-center justify-between h-fit p-2">
                    <p class="">Showing {{ $orders->firstItem() ?? 0 }} to {{ $orders->lastItem() }} of
                        {{ $orders->total() }}
                        entries</p>
                    <nav>
                        <div class="flex items-center -space-x-px h-8">
                            <button wire:click="previousPage" wire:loading.attr="disabled"
                                @if ($orders->onFirstPage()) disabled @endif
                                class="text-gray-500 disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer flex items-center justify-center px-3 h-8 ms-0 leading-tight bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">
                                <span class="sr-only">Previous</span>
                                <svg class="w-3.5 h-3.5 rtl:rotate-180" aria-hidden="true"
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
                                <svg class="w-3.5 h-3.5 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                            </button>
                        </div>
                    </nav>
                </div> --}}
            </div>
        </div>
    </div>

</div>
