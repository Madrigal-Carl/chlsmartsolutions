<div>
    <div wire:loading class="flex justify-center items-center h-full">
        <svg class="animate-spin h-8 w-8 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
        </svg>
    </div>

    <div wire:loading.remove>
        {{-- Your actual content here --}}
        @if ($active === 'task')
            <div>Task content</div>
        @elseif ($active === 'notification')
            <div>Notification content</div>
        @elseif ($active === 'setting')
            <div>Setting content</div>
        @endif
    </div>
</div>
