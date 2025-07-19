<div class="flex gap-4 font-poppins">
    <div class="w-[69%] flex flex-col gap-4">
        <div class="w-full flex items-center gap-3">
            <div class="w-1/5 flex flex-col items-center justify-center bg-white p-4 rounded-lg">
                <div class="rounded-full bg-[#FF7555] text-white flex justify-center items-center size-13">
                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-trending-up-icon lucide-trending-up">
                        <path d="M16 7h6v6" />
                        <path d="m22 7-8.5 8.5-5-5L2 17" />
                    </svg>
                </div>
                <p class="font-medium text-xs mt-3">Total Sales</p>
                <p class="text-[#BDBEC3] font-lighter text-[0.6rem]">All-time revenue</p>
                <h1 class="text-[#FF7555] font-semibold mt-6">₱{{ number_format($this->totalRevenue, 2) }}</h1>
            </div>
            <div class="w-1/5 flex flex-col items-center justify-center bg-white p-4 rounded-lg">
                <div class="rounded-full bg-[#39A1EA] text-white flex justify-center items-center size-13">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-shopping-basket-icon lucide-shopping-basket">
                        <path d="m15 11-1 9" />
                        <path d="m19 11-4-7" />
                        <path d="M2 11h20" />
                        <path d="m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8a2 2 0 0 0 2-1.6l1.7-7.4" />
                        <path d="M4.5 15.5h15" />
                        <path d="m5 11 4-7" />
                        <path d="m9 11 1 9" />
                    </svg>
                </div>
                <p class="font-medium text-xs mt-3">Daily Sales</p>
                <p class="text-[#BDBEC3] font-lighter text-[0.6rem]">Sales made today</p>
                <h1 class="text-[#39A1EA] font-semibold mt-6">₱{{ number_format($this->salesToday, 2) }}</h1>
            </div>
            <div class="w-1/5 flex flex-col items-center justify-center bg-white p-4 rounded-lg">
                <div class="rounded-full bg-[#405089] text-white flex justify-center items-center size-13">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-calendar-range-icon lucide-calendar-range">
                        <rect width="18" height="18" x="3" y="4" rx="2" />
                        <path d="M16 2v4" />
                        <path d="M3 10h18" />
                        <path d="M8 2v4" />
                        <path d="M17 14h-6" />
                        <path d="M13 18H7" />
                        <path d="M7 14h.01" />
                        <path d="M17 18h.01" />
                    </svg>
                </div>
                <p class="font-medium text-xs mt-3">Order Today</p>
                <p class="text-[#BDBEC3] font-lighter text-[0.6rem]">Available orders</p>
                <h1 class="text-[#405089] font-semibold mt-6">{{ $this->orderToday }}</h1>
            </div>
            <div class="w-1/5 flex flex-col items-center justify-center bg-white p-4 rounded-lg">
                <div class="rounded-full bg-[#FEB558] text-white flex justify-center items-center size-13">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-clipboard-list-icon lucide-clipboard-list">
                        <rect width="8" height="4" x="8" y="2" rx="1" ry="1" />
                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" />
                        <path d="M12 11h4" />
                        <path d="M12 16h4" />
                        <path d="M8 11h.01" />
                        <path d="M8 16h.01" />
                    </svg>
                </div>
                <p class="font-medium text-xs mt-3">Task Today</p>
                <p class="text-[#BDBEC3] font-lighter text-[0.6rem]">Pending tasks</p>
                <h1 class="text-[#FEB558] font-semibold mt-6">{{ $this->taskToday }}</h1>
            </div>
            <div class="w-1/5 flex flex-col items-center justify-center bg-white p-4 rounded-lg">
                <div class="rounded-full bg-[#29AB91] text-white flex justify-center items-center size-13">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-package-icon lucide-package">
                        <path
                            d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z" />
                        <path d="M12 22V12" />
                        <polyline points="3.29 7 12 12 20.71 7" />
                        <path d="m7.5 4.27 9 5.15" />
                    </svg>
                </div>
                <p class="font-medium text-xs mt-3">Total Products</p>
                <p class="text-[#BDBEC3] font-lighter text-[0.6rem]">All available items</p>
                <h1 class="text-[#29AB91] font-semibold mt-6">{{ $this->totalProduct }}</h1>
            </div>
        </div>
        <livewire:sales-line-chart />
    </div>
    <div class="w-[29%] flex flex-col gap-4">
        <livewire:order-overview />
        <livewire:inventory-overview />
        <livewire:task-overview />
    </div>
</div>
