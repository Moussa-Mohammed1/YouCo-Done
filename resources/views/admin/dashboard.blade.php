<!DOCTYPE html>

<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Youco'Done Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
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
                        "primary": "#17cfa1",
                        "background-light": "#f8faf9",
                        "background-dark": "#0f172a",
                        "surface": "#ffffff",
                    },
                    fontFamily: {
                        "display": ["Inter"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .sidebar-active {
            background-color: rgba(43, 238, 108, 0.1);
            border-left: 4px solid #2bee6c;
            color: #2bee6c;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 font-display">
    <div class="flex min-h-screen overflow-hidden">
        <!-- Sidebar -->
        @include('layouts.admin-sidebar')
        <!-- Main Content Wrapper -->
        <div class="flex-1 ml-64 flex flex-col">
            <!-- Header -->
            <header
                class="h-16 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 flex items-center justify-between px-8 sticky top-0 z-40">
                <h2 class="text-lg font-bold text-slate-800 dark:text-white">Tableau de bord Admin</h2>
                <div class="flex items-center gap-4">
                    <button
                        class="p-2 text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg relative transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                        <span
                            class="absolute top-2 right-2 w-2 h-2 bg-primary rounded-full border-2 border-white dark:border-slate-900"></span>
                    </button>
                    <div class="h-8 w-px bg-slate-200 dark:bg-slate-800"></div>
                    <div class="flex items-center gap-3 cursor-pointer group">
                        <div class="text-right">
                            <p class="text-xs font-semibold text-slate-800 dark:text-white">{{ auth()->user()->name }}
                            </p>
                            <p class="text-[10px] text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                Admin</p>
                        </div>
                        <a href="">
                            <div class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden ring-2 ring-transparent group-hover:ring-primary transition-all bg-cover bg-center"
                                data-alt="Admin user profile picture profile"
                                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAxo20kErXcA8qLVrEqUemfr7RnaFlOBSNNDaoGe5_3BzBM9fu18OsUl4p-uPeK49vf_YcQW2-4B0mFsbm1vLMqFJM3Wom_TUqcv3VLgkS5gQI5BU0XxtWYGqrzicwJtm2os4_oTU0GFgQQMg-J_YXB3y8B7h6DIXurx99hHyHlx9ZQK3J21-fUpcLX8UN1M9fK-5bBFWxzZrWn6HLxnvIIayO4nG1fO3UR0kxLQDoK9-cRRQVwgMHpp3AfisqdMPdxeeTE8xcXlJ5F')">
                            </div>
                        </a>
                        <script>

                        </script>
                    </div>
                </div>
            </header>
            <!-- Content Area -->
            <main class="p-8 space-y-8">
                <!-- Quick Actions Toolbar -->
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl font-bold text-slate-800 dark:text-white">Aperçu global</h3>
                        <p class="text-slate-500 dark:text-slate-400 text-sm">Bienvenue, voici les dernières activités
                            de votre plateforme.</p>
                    </div>
                    <div class="flex gap-3">
                        <button
                            class="flex items-center gap-2 px-4 py-2 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-lg text-sm font-semibold hover:border-primary transition-all shadow-sm">
                            <span class="material-symbols-outlined text-lg">group</span>
                            Gérer les utilisateurs
                        </button>
                        <button
                            class="flex items-center gap-2 px-4 py-2 bg-primary text-background-dark rounded-lg text-sm font-bold hover:bg-primary/90 transition-all shadow-lg shadow-primary/20">
                            <span class="material-symbols-outlined text-lg font-bold">storefront</span>
                            Gérer les restaurants
                        </button>
                    </div>
                </div>
                <!-- Statistics Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div
                        class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                        <div class="flex items-start justify-between mb-4">
                            
                            <span
                                class="text-primary text-xs font-bold bg-primary/10 px-2 py-1 rounded-full">+12%</span>
                        </div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Utilisateurs Totaux</p>
                        <h4 class="text-3xl font-bold text-slate-800 dark:text-white mt-1">
                            {{ $totalUsers ?? 0 }}
                        </h4>
                    </div>
                    <div
                        class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                        <div class="flex items-start justify-between mb-4">
                           
                            <span
                                class="text-blue-500 text-xs font-bold bg-blue-500/10 px-2 py-1 rounded-full">+5%</span>
                        </div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Restaurants Totaux</p>
                        <h4 class="text-3xl font-bold text-slate-800 dark:text-white mt-1">{{ $totalRestaurants ?? 0 }}
                        </h4>
                    </div>
                    <!-- <div
                        class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                        <div class="flex items-start justify-between mb-4">
                            <div class="p-2 bg-emerald-500/10 rounded-lg text-emerald-500">
                                <span class="material-symbols-outlined">check_circle</span>
                            </div>
                            <span
                                class="text-emerald-500 text-xs font-bold bg-emerald-500/10 px-2 py-1 rounded-full">+3%</span>
                        </div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium"></p>
                        <h4 class="text-3xl font-bold text-slate-800 dark:text-white mt-1"></h4>
                    </div>
                    <div
                        class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                        <div class="flex items-start justify-between mb-4">
                            <div class="p-2 bg-orange-500/10 rounded-lg text-orange-500">
                                <span class="material-symbols-outlined">book_online</span>
                            </div>
                            <span
                                class="text-orange-500 text-xs font-bold bg-orange-500/10 px-2 py-1 rounded-full">+18%</span>
                        </div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Réservations ce mois</p>
                        <h4 class="text-3xl font-bold text-slate-800 dark:text-white mt-1">892</h4>
                    </div> -->
                </div>
                <!-- Table Section -->
                <div
                    class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                    <div
                        class="px-6 py-5 border-b border-slate-100 dark:border-slate-800 flex items-center justify-between">
                        <h3 class="font-bold text-slate-800 dark:text-white">Dernières Inscriptions de Restaurants</h3>
                        <button class="text-primary text-sm font-semibold hover:underline">Voir tout</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-slate-50 dark:bg-slate-800/50">
                                <tr>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Nom
                                        du Restaurant</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Date
                                        d'inscription</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                        Statut</th>
                                    <th
                                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-800">

                                @if (!isset($latestRestaurants) || count($latestRestaurants) === 0)
                                    <tr>
                                        <td colspan="4" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center justify-center">
                                                <div
                                                    class="w-16 h-16 bg-slate-100 dark:bg-slate-800 rounded-full flex items-center justify-center mb-4">
                                                    <span
                                                        class="material-symbols-outlined text-slate-400 text-3xl">restaurant_menu</span>
                                                </div>
                                                <p class="text-slate-600 dark:text-slate-400 font-semibold mb-1">Aucun
                                                    restaurant récent</p>
                                                <p class="text-sm text-slate-500 dark:text-slate-500">Les nouveaux
                                                    restaurants inscrits apparaîtront ici</p>
                                            </div>
                                        </td>
                                    </tr>
                                @else
                                
                                    @foreach ($latestRestaurants as $r)

                                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    

                                                        <p class="text-sm font-bold text-slate-800 dark:text-white">
                                                            {{ $r->nom }}
                                                        </p>
                                                        <p class="text-xs text-slate-500">{{ $r->type_cuisine }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">12 Oct 2023</td>
                                            <td class="px-6 py-4">
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary/10 text-primary">
                                                    Active
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                <button class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200">
                                                    <span class="material-symbols-outlined">more_vert</span>
                                                </button>
       
                                            </td>
                                        </tr>

                                    @endforeach

                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Secondary Grid: Activity and Map Placeholder -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div
                        class="lg:col-span-2 bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="font-bold text-slate-800 dark:text-white">Localisation des Restaurants</h3>
                            <button
                                class="text-xs font-semibold bg-slate-100 dark:bg-slate-800 px-3 py-1 rounded-lg">Mondial</button>
                        </div>
                        <div
                            class="w-full h-64 bg-slate-100 dark:bg-slate-800 rounded-lg flex items-center justify-center border border-slate-200 dark:border-slate-700 relative overflow-hidden">
                            <img class="absolute inset-0 w-full h-full object-cover opacity-50 grayscale"
                                data-alt="Map showing restaurant locations in Paris" data-location="Paris"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCX4AJNto16od6IwvUI6KqQD59LcBeQzLt9uIJqlOGr4qsgP2-kW_U-DMadZ_8jYq-YnfYh-oPRC7Ov2lmFvfnqRxWM5pKIMpei54aB_5z9SDb2gaGI7Kb2zfSmuGIgxDaFPzqNuac5rYCAWRobeZEIjeUylOst0TPa-V3DmyoLJ6IGP00nVnJIyrWPRWLaJQ8cQDE2ZezyfeaR1tX_JK8RfvTqNtycXtaUbLH78FSeK-sDA_Zi5U_V1UYhqlmKgWyLFmMvaE8QdVWh" />
                            <div class="relative z-10 text-slate-400 flex flex-col items-center">
                                <span class="material-symbols-outlined text-4xl mb-2">map</span>
                                <p class="text-sm">Carte Interactive des Partenaires</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                        <h3 class="font-bold text-slate-800 dark:text-white mb-6">Dernières Notifications</h3>
                        <div class="space-y-6">
                            <div class="flex gap-4">
                                <div class="w-2 h-2 rounded-full bg-primary mt-1.5 shrink-0"></div>
                                <div>
                                    <p class="text-sm font-semibold text-slate-800 dark:text-white">Nouveau Restaurant
                                    </p>
                                    <p class="text-xs text-slate-500 mt-1">"La Bonne Table" vient de demander une
                                        activation.</p>
                                    <p class="text-[10px] text-slate-400 mt-2 uppercase">Il y a 2 minutes</p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="w-2 h-2 rounded-full bg-slate-300 dark:bg-slate-700 mt-1.5 shrink-0"></div>
                                <div>
                                    <p class="text-sm font-semibold text-slate-800 dark:text-white">Mise à jour système
                                    </p>
                                    <p class="text-xs text-slate-500 mt-1">Le module de réservation a été mis à jour
                                        avec succès.</p>
                                    <p class="text-[10px] text-slate-400 mt-2 uppercase">Il y a 1 heure</p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="w-2 h-2 rounded-full bg-slate-300 dark:bg-slate-700 mt-1.5 shrink-0"></div>
                                <div>
                                    <p class="text-sm font-semibold text-slate-800 dark:text-white">Alerte Utilisateur
                                    </p>
                                    <p class="text-xs text-slate-500 mt-1">Plusieurs échecs de connexion détectés pour
                                        l'ID #4829.</p>
                                    <p class="text-[10px] text-slate-400 mt-2 uppercase">Il y a 3 heures</p>
                                </div>
                            </div>
                        </div>
                        <button
                            class="w-full mt-6 py-2 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-sm font-bold rounded-lg hover:bg-slate-200 transition-colors">
                            Voir toutes les alertes
                        </button>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>