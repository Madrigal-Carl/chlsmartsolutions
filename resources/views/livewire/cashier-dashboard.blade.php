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
        <div id="chart" wire:ignore x-data x-init="() => {
            const chartData = {{ Js::from($chartData) }};
            const now = new Date();
            const startOfMonth = new Date(now.getFullYear(), now.getMonth(), 1).getTime();
            const endOfMonth = new Date(now.getTime() + 24 * 60 * 60 * 1000).getTime();

            const options = {
                series: chartData,
                chart: {
                    type: 'area',
                    stacked: false,
                    height: 375,
                    zoom: {
                        type: 'x',
                        enabled: true,
                        autoScaleYaxis: true
                    },
                    toolbar: { show: true, tools: { selection: false, zoom: false, zoomin: false, zoomout: false, pan: false, reset: false } },
                    fontFamily: 'poppins',
                },
                dataLabels: { enabled: false },
                markers: { size: 0 },
                title: {
                    text: 'Sales Over Time',
                    align: 'left',
                    style: {
                        fontSize: '18px',
                        fontWeight: 'bold',
                        fontFamily: 'poppins'
                    }
                },
                legend: { fontFamily: 'poppins' },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        inverseColors: false,
                        opacityFrom: 0.5,
                        opacityTo: 0,
                        stops: [0, 90, 100]
                    },
                },
                yaxis: {
                    labels: {
                        style: { fontFamily: 'poppins' },
                        formatter: val => '₱' + val.toLocaleString('en-PH', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        }),
                    },
                },
                xaxis: {
                    type: 'datetime',
                    min: startOfMonth,
                    max: endOfMonth,
                    labels: {
                        style: { fontFamily: 'poppins' }
                    }
                },
                tooltip: {
                    shared: true,
                    style: { fontFamily: 'poppins' },
                    y: {
                        formatter: val => '₱' + val.toLocaleString('en-PH', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        }),
                    }
                }
            };

            const chart = new ApexCharts($el, options);
            chart.render();
        }" class="bg-white font-poppins p-6 rounded-lg">
        </div>

    </div>
    <div class="w-[29%] flex flex-col gap-4">
        <div class="w-full bg-white rounded-lg flex flex-col p-4">
            <h1 class="text-[#203D3F] font-semibold">Orders Overview</h1>
            <p class="text-[0.6rem] text-[#BDBEC3] mb-1">Available Orders Today</p>
            @forelse ($orders as $order)
                <div class="flex items-center justify-between py-2 text-sm">
                    <p>{{ $order->reference_id }}</p>
                    <p class="text-[#FF7555] font-medium">₱{{ number_format($order->total_amount, 2) }}</p>
                </div>
            @empty
                <div class="flex flex-col items-center justify-center p-6 text-[#BDBEC3] gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"
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
                    <p class="text-xs mt-1">No Orders Available</p>
                </div>
            @endforelse
            @if ($orders->count() >= 2)
                <div wire:click="setActive('order')" class="flex py-2 text-sm cursor-pointer">
                    <p class="text-[#203D3F] font-medium">See more...</p>
                </div>
            @endif
        </div>
        <div class="w-full bg-white rounded-lg flex flex-col p-4">
            <h1 class="text-[#203D3F] font-semibold">Inventory Overview</h1>
            <p class="text-[0.6rem] text-[#BDBEC3] mb-2">Track products needing restock</p>
            <div class="flex flex-col gap-2">
                @forelse ($products as $product)
                    @if ($product->inventory->stock == 0)
                        <div
                            class="flex items-center justify-between p-2 text-sm rounded-sm w-full border-2 border-[#DC2626]">
                            <p class="line-clamp-1 capitalize w-[70%]">{{ $product->name }}</p>
                            <p class="text-[#DC2626] font-medium">{{ $product->inventory->stock }}<span
                                    class="font-normal text-[0.6rem]">left</span></p>
                        </div>
                    @else
                        <div
                            class="flex items-center justify-between p-2 text-sm rounded-sm w-full border-2 border-[#EAB308]">
                            <p class="line-clamp-1 capitalize w-[70%]">{{ $product->name }}</p>
                            <p class="text-[#EAB308] font-medium">{{ $product->inventory->stock }}<span
                                    class="font-normal text-[0.6rem]">left</span></p>
                        </div>
                    @endif
                @empty
                    <div class="flex flex-col items-center justify-around pt-8 pb-7.5 text-[#BDBEC3] gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-package-open-icon lucide-package-open">
                            <path d="M12 22v-9" />
                            <path
                                d="M15.17 2.21a1.67 1.67 0 0 1 1.63 0L21 4.57a1.93 1.93 0 0 1 0 3.36L8.82 14.79a1.655 1.655 0 0 1-1.64 0L3 12.43a1.93 1.93 0 0 1 0-3.36z" />
                            <path
                                d="M20 13v3.87a2.06 2.06 0 0 1-1.11 1.83l-6 3.08a1.93 1.93 0 0 1-1.78 0l-6-3.08A2.06 2.06 0 0 1 4 16.87V13" />
                            <path
                                d="M21 12.43a1.93 1.93 0 0 0 0-3.36L8.83 2.2a1.64 1.64 0 0 0-1.63 0L3 4.57a1.93 1.93 0 0 0 0 3.36l12.18 6.86a1.636 1.636 0 0 0 1.63 0z" />
                        </svg>
                        <p class="text-xs mt-1">No Products to Restock</p>
                    </div>
                @endforelse
            </div>
            @if ($products->count() >= 2)
                <div wire:click="setActive('product')" class="flex py-2 text-sm cursor-pointer">
                    <p class="text-[#203D3F] font-medium">See more...</p>
                </div>
            @endif
        </div>
        <div class="w-full bg-white rounded-lg flex flex-col p-4">
            <h1 class="text-[#203D3F] font-semibold">Task Overview</h1>
            <p class="text-[0.6rem] text-[#BDBEC3] mb-2">Pending Task Today</p>
            <div class="flex flex-col gap-2">
                @forelse ($tasks as $task)
                    @if ($task->priority == 'high')
                        <div
                            class="flex items-center justify-between p-2 text-sm rounded-sm w-full border border-[#BFBFBF]">
                            <p class="line-clamp-1 capitalize w-[70%]">{{ $task->title }}</p>
                            <p class="text-[#DC2626] font-medium text-xs">High</p>
                        </div>
                    @elseif ($task->priority == 'medium')
                        <div
                            class="flex items-center justify-between p-2 text-sm rounded-sm w-full border border-[#BFBFBF]">
                            <p class="line-clamp-1 capitalize w-[70%]">{{ $task->title }}</p>
                            <p class="text-[#C31BD2] font-medium text-xs">Medium</p>
                        </div>
                    @else
                        <div
                            class="flex items-center justify-between p-2 text-sm rounded-sm w-full border border-[#BFBFBF]">
                            <p class="line-clamp-1 capitalize w-[70%]">{{ $task->title }}</p>
                            <p class="text-[#9A9A9A] font-medium text-xs">Low</p>
                        </div>
                    @endif
                @empty
                    <div class="flex flex-col items-center justify-around pt-8 pb-7 text-[#BDBEC3] gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-clipboard-list-icon lucide-clipboard-list">
                            <rect width="8" height="4" x="8" y="2" rx="1" ry="1" />
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" />
                            <path d="M12 11h4" />
                            <path d="M12 16h4" />
                            <path d="M8 11h.01" />
                            <path d="M8 16h.01" />
                        </svg>
                        <p class="text-xs mt-1">No Task Available</p>
                    </div>
                @endforelse
            </div>
            @if ($tasks->count() >= 2)
                <div wire:click="setActive('task')" class="flex py-2 text-sm cursor-pointer">
                    <p class="text-[#203D3F] font-medium">See more...</p>
                </div>
            @endif
        </div>
    </div>
</div>
