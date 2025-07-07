@php
    $sidebarItems = [
        [
            'label' => 'dashboard',
            'content' => 'cashier.dashboard',
            'icon' =>
                '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-column-big-icon lucide-chart-column-big"><path d="M3 3v16a2 2 0 0 0 2 2h16"/><rect x="15" y="5" width="4" height="12" rx="1"/><rect x="7" y="8" width="4" height="9" rx="1"/></svg>',
        ],
        [
            'label' => 'notification',
            'content' => 'layouts.notification',
            'icon' =>
                '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell-icon lucide-bell"><path d="M10.268 21a2 2 0 0 0 3.464 0"/><path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"/></svg>',
        ],
    ];
@endphp

<x-default>
    <div class="flex bg-[#F4F5F9] min-h-screen p-2">
        <livewire:sidebar :items="$sidebarItems" />

        <div class="w-full p-6 pb-0">
            <livewire:content-display :items="$sidebarItems" />
        </div>
    </div>
</x-default>
