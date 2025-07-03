<div class="bg-[#203D3F] h-screen w-[22%] rounded-md flex flex-col font-poppins">
    <div class="py-10 mb-4 text-white flex justify-center items-center gap-2">
        <img src="{{ asset('images/chlss_logo.png') }}" alt="chlss_logo" class="w-8">
        <h1 class="text-lg font-semibold">
            CHL SmartSolutions
        </h1>
    </div>
    <div class="flex flex-col text-white font-medium tracking-widest gap-2">
        @foreach ($items as $item)
            <button class="relative px-12 py-2 cursor-pointer" wire:click="setActive('{{ $item['label'] }}')">
                @if ($active === $item['label'])
                    <div class="absolute left-0 top-0 w-18 h-full border-l-6 border-[#50FF7F]"></div>
                @endif

                <div class="flex items-center gap-4 {{ $active === $item['label'] ? 'text-[#50FF7F]' : 'text-white' }}">
                    {!! $item['icon'] !!}
                    <p class="capitalize">{{ $item['label'] }}</p>
                </div>
            </button>
        @endforeach

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
