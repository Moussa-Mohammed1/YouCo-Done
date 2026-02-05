<aside class="w-72 bg-sidebar-dark text-white flex flex-col fixed h-full z-50">
    <div class="p-6 flex items-center gap-3">
        <div class="bg-primary rounded-lg p-2 flex items-center justify-center">
            <span class="material-symbols-outlined text-sidebar-dark font-bold">restaurant</span>
        </div>
        <div>
            <h1 class="text-xl font-extrabold tracking-tight">Youco'Done</h1>
            <p class="text-[10px] uppercase tracking-widest text-primary/80 font-semibold leading-tight">Unified
                Portal</p>
        </div>
    </div>
    <nav class="flex-1 px-4 mt-6 space-y-2 overflow-y-auto custom-scrollbar">
        <div class="sidebar-item-active flex items-center gap-3 px-4 py-3 rounded-lg cursor-pointer transition-all">
            <span class="material-symbols-outlined text-primary">dashboard</span>
            <span class="text-sm font-medium">Dashboard</span>
        </div>
        <div class="flex items-center gap-3 px-4 py-3 hover:bg-white/5 rounded-lg cursor-pointer transition-all group">
            <span class="material-symbols-outlined text-slate-400 group-hover:text-primary">calendar_today</span>
            <span class="text-sm font-medium">Mes réservations</span>
        </div>
        <div class="flex items-center gap-3 px-4 py-3 hover:bg-white/5 rounded-lg cursor-pointer transition-all group">
            <span class="material-symbols-outlined text-slate-400 group-hover:text-primary">favorite</span>
            <span class="text-sm font-medium">Mes favoris</span>
        </div>
        @if(auth()->user()->hasRole('restaurant_owner'))
            <div class="pt-6 pb-2 px-4">
                <p class="text-[10px] uppercase font-bold text-slate-500 tracking-wider">Zone Restaurateur</p>
            </div>
            <div class="flex items-center gap-3 px-4 py-3 hover:bg-white/5 rounded-lg cursor-pointer transition-all group">
                <span class="material-symbols-outlined text-slate-400 group-hover:text-primary">storefront</span>
                <span class="text-sm font-medium">Mes restaurants</span>
            </div>
            <div class="flex items-center gap-3 px-4 py-3 hover:bg-white/5 rounded-lg cursor-pointer transition-all group">
                <span class="material-symbols-outlined text-slate-400 group-hover:text-primary">analytics</span>
                <span class="text-sm font-medium">Performances</span>
            </div>
        @endif
    </nav>
    <div class="p-4 mt-auto border-t border-white/10 space-y-2">
        <div class="flex items-center gap-3 px-4 py-3 hover:bg-white/5 rounded-lg cursor-pointer transition-all group">
            <span class="material-symbols-outlined text-slate-400 group-hover:text-primary">settings</span>
            <span class="text-sm font-medium text-slate-300">Paramètres</span>
        </div>
        <div
            class="flex items-center gap-3 px-4 py-3 hover:bg-red-500/10 rounded-lg cursor-pointer transition-all group">
            <span class="material-symbols-outlined text-red-400">logout</span>
            <span class="text-sm font-medium text-red-400">Déconnexion</span>
        </div>
    </div>
</aside>