<nav class="flex items-center justify-between w-full font-inter bg-black py-6 md:px-6">
    <a href="/" class="flex items-center gap-2 md:gap-4 text-white">
        <img src="{{ asset('images/chlss_logo.png') }}" alt="chlss_logo" class="w-10 md:w-8">
        <h1 class="flex items-center text-lg font-bold gap-2">
            CHL
            <span class="md:hidden flex">SS</span>
            <span class="hidden md:flex">SmartSolutions</span>
        </h1>
    </a>
    <div class="flex items-center gap-4 md:gap-12">

        <livewire:cart />

        <a href="/signin">
            <div class="bg-[#5AA526] px-2 py-2 md:px-6 rounded-xl">
                <p class="text-white font-bold text-sm">SIGN IN</p>
            </div>
        </a>
    </div>
</nav>
