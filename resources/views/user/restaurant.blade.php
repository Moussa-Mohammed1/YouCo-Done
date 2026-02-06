<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Détails du Restaurant - Youco'Done</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#2beebd",
                        "background-light": "#f6f8f7",
                        "background-dark": "#10221d",
                        "sidebar-dark": "#0d1b18",
                    },
                    fontFamily: {
                        "display": ["Work Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "2xl": "1rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style type="text/tailwindcss">
        body {
            font-family: 'Work Sans', sans-serif;
        }
        .sidebar-item-active {
            background-color: rgba(43, 238, 189, 0.15);
            border-left: 4px solid #2beebd;
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        .hero-overlay {
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.4) 50%, rgba(0,0,0,0.1) 100%);
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 font-display">
    <div class="flex min-h-screen">
      @include('layouts.user-sidebar')
        <main class="flex-1 ml-72 flex flex-col min-w-0">
            <header
                class="h-20 bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800 px-8 flex items-center justify-between sticky top-0 z-40">
                <div class="flex items-center gap-4">
                    <a href="{{ route('user.home') }}" class="flex items-center gap-2 text-slate-500 hover:text-primary transition-colors">
                        <span class="material-symbols-outlined">arrow_back</span>
                        <span class="font-semibold text-sm">Retour</span>
                    </a>
                </div>
                <div class="flex items-center gap-6">
                    <div class="relative group">
                        <button
                            class="flex items-center gap-2 px-4 py-2 hover:bg-slate-50 dark:hover:bg-white/5 rounded-lg transition-all border border-transparent hover:border-slate-200 dark:hover:border-slate-700">
                            <span class="material-symbols-outlined text-slate-500">notifications</span>
                            <span
                                class="absolute top-2 right-4 w-2 h-2 bg-red-500 rounded-full border-2 border-white dark:border-background-dark"></span>
                        </button>
                    </div>
                    <button
                        class="flex items-center gap-3 px-1.5 py-1.5 bg-slate-100 dark:bg-white/5 hover:bg-primary/10 rounded-full transition-all group">
                        <div class="h-8 w-8 rounded-full bg-cover bg-center ring-2 ring-primary/30"
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAqROC7YrE3MDcAd7g0pkQdnXefYJD5s5RTrVFEkxoMcn2zDeD7Wp-l8G9WCyvugaSMoOzFATppwQKXrNPGZrLOHngOkBuHh_O3VCKaJq72dl8ePeqQLGgs9f8OdxVD93xSbzkNUX8Mgo0sj0hF4A2aa1h5lX-zyD4RUbJi7CZ4cSqIm2L_N0heldRgC1ERKMI7jfMNVbRUFG_kYMBFAIaHhtnvynQPdUeTqvgn7o1YaqiLltaFPuTk_5t0vcWsiv6fHc5vFR16K6A')">
                        </div>
                        <span class="pr-4 text-sm font-semibold group-hover:text-primary">Mon Profil</span>
                    </button>
                </div>
            </header>
            <section class="relative h-[450px] w-full overflow-hidden">
                <div class="absolute inset-0 bg-cover bg-center"
                    style="background-image: url('{{ $restaurant->photos->first() ? $restaurant->photos->first()->contenu : 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=1920' }}')">
                </div>
                <div class="absolute inset-0 hero-overlay flex flex-col justify-end p-12">
                    <div class="max-w-6xl mx-auto w-full">
                        <div class="flex items-center gap-3 mb-4">
                            <span
                                class="px-3 py-1 {{ $restaurant->status === 'ACTIVE' ? 'bg-primary' : 'bg-red-500' }} text-sidebar-dark text-[11px] font-bold rounded-full uppercase tracking-wider">
                                {{ $restaurant->status === 'ACTIVE' ? 'Ouvert' : 'Fermé' }}
                            </span>
                            @if($restaurant->typeCuisine)
                            <span
                                class="px-3 py-1 bg-white/20 backdrop-blur-md text-white text-[11px] font-bold rounded-full uppercase tracking-wider">
                                {{ $restaurant->typeCuisine->nom }}
                            </span>
                            @endif
                        </div>
                        <h1 class="text-5xl font-black text-white mb-4">{{ $restaurant->nom }}</h1>
                        <div class="flex items-center gap-6 text-white">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary">location_on</span>
                                <span class="font-medium">{{ $restaurant->localisation }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary">group</span>
                                <span class="font-medium">Capacité: {{ $restaurant->capacite }} places</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="max-w-6xl mx-auto w-full p-12 grid grid-cols-12 gap-8">
                <div class="col-span-8 space-y-10">
                    <section>
                        <h3 class="text-2xl font-bold mb-6">Galerie Photos</h3>
                        @if($restaurant->photos->count() > 0)
                        <div class="grid grid-cols-3 gap-4">
                            <div class="col-span-2 h-80 rounded-2xl bg-cover bg-center shadow-sm"
                                style="background-image: url('{{ $restaurant->photos->first()->contenu }}')">
                            </div>
                            <div class="space-y-4">
                                @if($restaurant->photos->count() > 1)
                                <div class="h-[152px] rounded-2xl bg-cover bg-center shadow-sm"
                                    style="background-image: url('{{ $restaurant->photos->skip(1)->first()->contenu }}')">
                                </div>
                                @endif
                                @if($restaurant->photos->count() > 2)
                                <div class="h-[152px] rounded-2xl bg-cover bg-center shadow-sm relative"
                                    style="background-image: url('{{ $restaurant->photos->skip(2)->first()->contenu }}')">
                                    @if($restaurant->photos->count() > 3)
                                    <div
                                        class="absolute inset-0 bg-black/40 rounded-2xl flex items-center justify-center cursor-pointer hover:bg-black/50 transition-all">
                                        <span class="text-white font-bold text-sm">+{{ $restaurant->photos->count() - 3 }} photos</span>
                                    </div>
                                    @endif
                                </div>
                                @endif
                            </div>
                        </div>
                        @else
                        <div class="bg-slate-100 dark:bg-white/5 rounded-2xl h-80 flex items-center justify-center">
                            <p class="text-slate-400">Aucune photo disponible</p>
                        </div>
                        @endif
                    </section>
                    <section
                        class="bg-white dark:bg-white/5 p-8 rounded-2xl border border-slate-200 dark:border-slate-800">
                        <h3 class="text-2xl font-bold mb-4">À propos</h3>
                        <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                            Bienvenue chez {{ $restaurant->nom }}, situé au {{ $restaurant->localisation }}.
                            @if($restaurant->typeCuisine)
                            Nous vous proposons une cuisine {{ $restaurant->typeCuisine->nom }} dans un cadre convivial et chaleureux.
                            @endif
                            Notre établissement peut accueillir jusqu'à {{ $restaurant->capacite }} personnes pour vos repas entre amis, en famille ou vos événements professionnels.
                        </p>
                    </section>
                    <section>
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold">Menu</h3>
                        </div>
                        @php
                            $plats = $restaurant->menus->flatMap(function($menu) {
                                return $menu->plats;
                            })->take(4);
                        @endphp
                        @if($plats->count() > 0)
                        <div class="grid grid-cols-2 gap-6">
                            @foreach($plats as $plat)
                            <div
                                class="flex gap-4 p-4 bg-white dark:bg-white/5 rounded-xl border border-slate-200 dark:border-slate-800">
                                <div class="w-20 h-20 rounded-lg bg-slate-200 dark:bg-slate-700 shrink-0 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-slate-400 text-3xl">restaurant</span>
                                </div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start mb-1">
                                        <h4 class="font-bold text-sm">{{ $plat->contenu }}</h4>
                                        <span class="text-primary font-bold text-sm">{{ number_format($plat->prix, 2) }}€</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="bg-slate-100 dark:bg-white/5 rounded-xl p-8 text-center">
                            <p class="text-slate-400">Aucun plat disponible pour le moment</p>
                        </div>
                        @endif
                    </section>
                    <section>
                        <h3 class="text-2xl font-bold mb-6">Avis Clients</h3>
                        <div class="space-y-6">
                            <div
                                class="bg-white dark:bg-white/5 p-6 rounded-2xl border border-slate-200 dark:border-slate-800">
                                <div class="flex justify-between items-start mb-4">
                                    <div class="flex items-center gap-3">
                                        <div class="h-10 w-10 rounded-full bg-slate-200"></div>
                                        <div>
                                            <h4 class="font-bold text-sm">Marc Antoine</h4>
                                            <p class="text-[10px] text-slate-500 uppercase font-bold tracking-wider">Il
                                                y a 2 jours</p>
                                        </div>
                                    </div>
                                    <div class="flex text-amber-400">
                                        <span class="material-symbols-outlined text-[18px] fill-current">star</span>
                                        <span class="material-symbols-outlined text-[18px] fill-current">star</span>
                                        <span class="material-symbols-outlined text-[18px] fill-current">star</span>
                                        <span class="material-symbols-outlined text-[18px] fill-current">star</span>
                                        <span class="material-symbols-outlined text-[18px] fill-current">star</span>
                                    </div>
                                </div>
                                <p class="text-sm text-slate-600 dark:text-slate-400">Une découverte exceptionnelle. Le
                                    service est impeccable et les plats sont d'une finesse rare. Je recommande vivement
                                    le filet de bœuf.</p>
                            </div>
                            <button
                                class="w-full py-4 border-2 border-dashed border-slate-200 dark:border-slate-800 rounded-2xl text-slate-400 font-bold text-sm hover:border-primary hover:text-primary transition-all">
                                Charger plus d'avis
                            </button>
                        </div>
                    </section>
                </div>
                <div class="col-span-4 space-y-8">
                    <div
                        class="bg-white dark:bg-sidebar-dark rounded-2xl border border-slate-200 dark:border-slate-800 shadow-xl p-6 sticky top-28">
                        <h3 class="text-xl font-bold mb-6">Réserver une table</h3>
                        <div class="space-y-4">
                            <div>
                                <label
                                    class="block text-[10px] font-black uppercase text-slate-400 tracking-wider mb-2">Date</label>
                                <div class="relative">
                                    <input
                                        class="w-full bg-slate-50 dark:bg-white/5 border-slate-200 dark:border-slate-700 rounded-xl px-4 py-3 text-sm focus:ring-primary focus:border-primary transition-all"
                                        type="date" />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label
                                        class="block text-[10px] font-black uppercase text-slate-400 tracking-wider mb-2">Heure</label>
                                    <select
                                        class="w-full bg-slate-50 dark:bg-white/5 border-slate-200 dark:border-slate-700 rounded-xl px-4 py-3 text-sm focus:ring-primary focus:border-primary transition-all">
                                        <option>19:30</option>
                                        <option>20:00</option>
                                        <option>20:30</option>
                                        <option>21:00</option>
                                    </select>
                                </div>
                                <div>
                                    <label
                                        class="block text-[10px] font-black uppercase text-slate-400 tracking-wider mb-2">Convives</label>
                                    <select
                                        class="w-full bg-slate-50 dark:bg-white/5 border-slate-200 dark:border-slate-700 rounded-xl px-4 py-3 text-sm focus:ring-primary focus:border-primary transition-all">
                                        <option>2 Pers.</option>
                                        <option>3 Pers.</option>
                                        <option>4 Pers.</option>
                                        <option>5+ Pers.</option>
                                    </select>
                                </div>
                            </div>
                            <button
                                class="w-full py-4 bg-primary text-sidebar-dark font-black rounded-xl hover:brightness-110 transition-all shadow-lg shadow-primary/20 mt-4">
                                Confirmer la réservation
                            </button>
                            <p class="text-center text-[11px] text-slate-400 mt-4">Aucun frais de réservation.
                                Confirmation instantanée.</p>
                        </div>
                        <div class="mt-8 pt-8 border-t border-slate-100 dark:border-slate-800 space-y-4">
                            <div class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-primary text-xl">location_on</span>
                                <div>
                                    <p class="text-sm font-bold">Adresse</p>
                                    <p class="text-xs text-slate-500">{{ $restaurant->localisation }}</p>
                                </div>
                            </div>
                            <div
                                class="w-full h-32 bg-slate-100 dark:bg-white/5 rounded-xl overflow-hidden mb-4 border border-slate-200 dark:border-slate-700 relative">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-primary text-3xl">push_pin</span>
                                </div>
                            </div>
                            @if($restaurant->user && $restaurant->user->email)
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary text-xl">email</span>
                                <div>
                                    <p class="text-sm font-bold">Contact</p>
                                    <p class="text-xs text-slate-500">{{ $restaurant->user->email }}</p>
                                </div>
                            </div>
                            @endif
                            @if($restaurant->horaires->count() > 0)
                            <div class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-primary text-xl">schedule</span>
                                <div class="flex-1">
                                    <p class="text-sm font-bold mb-1">Horaires d'ouverture</p>
                                    <div class="space-y-1">
                                        @foreach($restaurant->horaires as $horaire)
                                        <div class="flex justify-between text-[11px]">
                                            <span class="text-slate-500 capitalize">{{ $horaire->jourSemaine }}</span>
                                            <span class="font-semibold">{{ substr($horaire->heureOuverture, 0, 5) }} - {{ substr($horaire->heureFermeture, 0, 5) }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <footer
                class="mt-auto py-8 px-8 border-t border-slate-200 dark:border-slate-800 text-slate-400 text-[11px] uppercase tracking-widest flex justify-between">
                <div>© 2024 Youco'Done - Détails Restaurant</div>
                <div class="flex gap-4">
                    <a class="hover:text-primary transition-colors" href="#">Support</a>
                    <a class="hover:text-primary transition-colors" href="#">Mentions Légales</a>
                    <a class="hover:text-primary transition-colors" href="#">Confidentialité</a>
                </div>
            </footer>
        </main>
    </div>

</body>

</html>