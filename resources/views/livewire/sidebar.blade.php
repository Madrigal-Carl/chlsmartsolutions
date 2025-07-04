<div class="bg-[#203D3F] w-[22%] rounded-md flex flex-col font-poppins">
    <div class="py-10 mb-4 text-white flex justify-center items-center gap-2">
        <img src="{{ asset('images/chlss_logo.png') }}" alt="chlss_logo" class="w-7">
        <h1 class="font-semibold">
            CHL SmartSolutions
        </h1>
    </div>
    <div class="flex flex-col text-white font-medium tracking-widest gap-2">
        @foreach ($items as $item)
            <button class="relative px-12 py-2 cursor-pointer" wire:loading.attr="disabled" wire:target="setActive"
                wire:click="setActive('{{ $item['label'] }}')">
                @if ($active === $item['label'])
                    <div class="absolute left-0 top-0 w-18 h-full border-l-6 border-[#50FF7F]"></div>
                @endif

                <div class="flex items-center gap-5 {{ $active === $item['label'] ? 'text-[#50FF7F]' : 'text-white' }}">
                    {!! $item['icon'] !!}
                    <p class="capitalize text-sm">{{ $item['label'] }}</p>
                </div>
            </button>
        @endforeach

        <hr class="border-[#A7A7A7] my-2 mx-4">
        <button class="relative px-12 py-2 cursor-pointer">
            <div class="flex items-center gap-5 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-settings-icon lucide-settings">
                    <path
                        d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                    <circle cx="12" cy="12" r="3" />
                </svg>
                <p class="text-sm">Setting</p>
            </div>
        </button>

        <div class="relative px-12 py-2">
            <form method="POST" action="/signout">
                @csrf
                <button type="submit" class="cursor-pointer flex items-center gap-5 'text-white'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-log-out-icon lucide-log-out">
                        <path d="m16 17 5-5-5-5" />
                        <path d="M21 12H9" />
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                    </svg>
                    <p class="text-sm">Sign out</p>
                </button>
            </form>
        </div>
    </div>
</div>
