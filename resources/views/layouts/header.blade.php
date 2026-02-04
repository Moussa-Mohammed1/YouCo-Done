<!-- Header -->
<header
    class="sticky top-0 z-50 w-full bg-white dark:bg-background-dark border-b border-[#f0f4f2] dark:border-[#1e2f24]">
    <div class="px-4 sm:px-10 lg:px-40 py-3 flex items-center justify-between">
        <div class="flex items-center gap-4 text-[#111813] dark:text-white cursor-pointer select-none">
            <div class="size-8 flex items-center justify-center text-primary">
                <img class="w-10 h-10 rounded-lg" src="https://i.pinimg.com/1200x/60/f3/8f/60f38ff9f4113d96ac13a43a4919e848.jpg" />
            </div>
            <h2 class="text-xl font-bold leading-tight tracking-tight">Youco'Done</h2>
        </div>
        <div class="hidden lg:flex flex-1 justify-end gap-8 items-center">
            <!-- <nav class="flex items-center gap-9">
                <a class="text-[#111813] dark:text-gray-200 text-sm font-medium leading-normal hover:text-primary transition-colors"
                    href="#">Accueil</a>
                <a class="text-[#111813] dark:text-gray-200 text-sm font-medium leading-normal hover:text-primary transition-colors"
                    href="#">Restaurants</a>
                <a class="text-[#111813] dark:text-gray-200 text-sm font-medium leading-normal hover:text-primary transition-colors"
                    href="#">Se connecter</a>
            </nav> -->
            <div class="flex gap-3">
                @if (Route::has('register') && Route::has('login'))
                    <a href="{{ route('login') }}"
                        class="flex items-center justify-center rounded-lg h-10 px-5 bg-transparent border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 text-[#111813] dark:text-white text-sm font-bold transition-all">
                        Se connecter
                    </a>
                    <a href="{{ route('login') }}"
                        class="flex items-center justify-center rounded-lg h-10 px-5 bg-primary hover:bg-[#25d660] text-[#111813] text-sm font-bold shadow-sm hover:shadow transition-all">
                        S'inscrire
                    </a>
                @endif
            </div>
        </div>
        <!-- Mobile Menu Icon -->
        <button class="lg:hidden text-[#111813] dark:text-white">
            <span class="material-symbols-outlined">menu</span>
        </button>
    </div>
</header>