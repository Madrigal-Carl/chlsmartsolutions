<div class="w-full bg-white rounded-lg flex flex-col p-4">
    <h1 class="text-[#203D3F] font-semibold">Expenses Overview</h1>
    <p class="text-[0.6rem] text-[#BDBEC3] mb-2">Recent transactions</p>
    @forelse ($expenses as $expense)
        <div class="flex items-center justify-between py-2 text-sm">
            <p class="w-1/2">{{ \Carbon\Carbon::parse($expense->expense_date)->format('F d, Y') }}</p>
            <p class="text-[#FF7555] font-medium">₱{{ number_format($expense->amount, 2) }}</p>
        </div>
    @empty
        <div class="flex flex-col items-center justify-center p-6 text-[#BDBEC3] gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-calendar-range-icon lucide-calendar-range">
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
    @if ($expenses->count() >= $take)
        <div wire:click="setActive('expense')" class="flex py-2 text-sm cursor-pointer">
            <p class="text-[#203D3F] font-medium">See more...</p>
        </div>
    @endif
</div>
