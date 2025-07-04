@php
    $sidebarItems = [
        [
            'label' => 'task',
            'content' => 'technician.dashboard',
            'icon' =>
                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="8" height="4" x="8" y="2" rx="1" ry="1" /><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" /><path d="m9 14 2 2 4-4" /></svg>',
        ],
        [
            'label' => 'notification',
            'content' => 'technician.notification',
            'icon' =>
                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.268 21a2 2 0 0 0 3.464 0" /><path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326" /></svg>',
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
