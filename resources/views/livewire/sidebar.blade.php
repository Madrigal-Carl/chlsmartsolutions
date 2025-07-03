<div class="bg-[#203D3F] h-screen w-[22%] rounded-r-md flex flex-col font-poppins">
    <div class="py-10 mb-4 text-white flex justify-center items-center gap-2">
        <img src="{{ asset('images/chlss_logo.png') }}" alt="chlss_logo" class="w-8">
        <h1 class="text-lg font-semibold">
            CHL SmartSolutions
        </h1>
    </div>
    <div class="flex flex-col text-white font-medium tracking-widest gap-2">
        <div class="relative px-12 py-2" wire:click="setActive('task')">
            @if ($active === 'task')
                <div class="absolute left-0 top-0 w-18 h-full border-l-6 border-[#50FF7F]"></div>
            @endif
            <button
                class="cursor-pointer flex items-center gap-4 {{ $active === 'task' ? 'text-[#50FF7F]' : 'text-white' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-clipboard-check-icon lucide-clipboard-check">
                    <rect width="8" height="4" x="8" y="2" rx="1" ry="1" />
                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" />
                    <path d="m9 14 2 2 4-4" />
                </svg>
                <p>Task</p>
            </button>
        </div>
        <div class="relative px-12 py-2" wire:click="setActive('notification')">
            @if ($active === 'notification')
                <div class="absolute left-0 top-0 w-18 h-full border-l-6 border-[#50FF7F]"></div>
            @endif
            <button
                class="cursor-pointer flex items-center gap-4 {{ $active === 'notification' ? 'text-[#50FF7F]' : 'text-white' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-bell-icon lucide-bell">
                    <path d="M10.268 21a2 2 0 0 0 3.464 0" />
                    <path
                        d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326" />
                </svg>
                <p>Notification</p>
            </button>
        </div>
        <div class="relative px-12 py-2" wire:click="setActive('setting')">
            @if ($active === 'setting')
                <div class="absolute left-0 top-0 w-18 h-full border-l-6 border-[#50FF7F]"></div>
            @endif
            <button
                class="cursor-pointer flex items-center gap-4 {{ $active === 'setting' ? 'text-[#50FF7F]' : 'text-white' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-settings-icon lucide-settings">
                    <path
                        d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                    <circle cx="12" cy="12" r="3" />
                </svg>
                <p>Setting</p>
            </button>
        </div>
        <div class="relative px-12 py-2">
            <form method="POST" action="/signout">
                @csrf
                <button type="submit" class="cursor-pointer flex items-center gap-4 'text-white'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-log-out-icon lucide-log-out">
                        <path d="m16 17 5-5-5-5" />
                        <path d="M21 12H9" />
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                    </svg>
                    <p>Sign out</p>
                </button>
            </form>
        </div>
    </div>
</div>
