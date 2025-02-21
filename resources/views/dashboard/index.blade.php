<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventHub - Dashboard</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-['Plus_Jakarta_Sans'] bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white border-r hidden lg:block">
            <div class="h-full flex flex-col">
    
                <!-- Navigation -->
                <nav class="flex-1 p-4">
                    <div class="space-y-1">
                        <a href="#" class="flex items-center px-4 py-2 text-blue-600 bg-blue-50 rounded-lg">
                            <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            Tableau de bord
                        </a>
                        <a href="#" class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg">
                            <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Mes événements
                        </a>
                        <a href="#" class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg">
                            <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Participants
                        </a>
                        <a href="#" class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg">
                            <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                            </svg>
                            Paiements
                        </a>
                    </div>
                </nav>
    
                <!-- Bottom Links -->
                <div class="p-4 border-t">
                    <a href="#" class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg">
                        <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Paramètres
                    </a>
                </div>
            </div>
        </div>
    
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header avec menu de déconnexion -->
            <header class="bg-white border-b">
                <div class="px-4 sm:px-6 lg:px-8 py-4">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-semibold text-gray-900">Dashboard</h1>
                        
                        <!-- Menu utilisateur -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center space-x-4 focus:outline-none">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                                    <span class="text-blue-600 font-medium">
                                        {{ substr(Auth::user()->name, 0, 2) }}
                                    </span>
                                </div>
                                <div class="hidden md:block text-left">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ Auth::user()->name }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ Auth::user()->email }}
                                    </div>
                                </div>
                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            <!-- Menu déroulant -->
                            <div x-show="open" 
                                 @click.away="open = false"
                                 class="absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5"
                                 role="menu">
                                <a href="{{ route('profile.edit') }}" 
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                   role="menuitem">
                                    Mon profil
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" 
                                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                            role="menuitem">
                                        Déconnexion
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main -->
            <main class="flex-1 p-6 bg-gray-50">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <!-- Total des événements -->
                    <div class="bg-white rounded-2xl p-6 border">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-blue-50 p-3 rounded-xl">
                                <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-400">Total événements</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <h3 class="text-2xl font-bold text-gray-900">{{ $stats['total'] }}</h3>
                        </div>
                    </div>

                    <!-- Événements à venir -->
                    <div class="bg-white rounded-2xl p-6 border">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-green-50 p-3 rounded-xl">
                                <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-400">À venir</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <h3 class="text-2xl font-bold text-gray-900">{{ $stats['upcoming'] }}</h3>
                            <span class="text-sm text-green-600 bg-green-50 px-2 py-1 rounded-lg">Actifs</span>
                        </div>
                    </div>

                    <!-- Événements passés -->
                    <div class="bg-white rounded-2xl p-6 border">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-gray-50 p-3 rounded-xl">
                                <svg class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-400">Passés</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <h3 class="text-2xl font-bold text-gray-900">{{ $stats['past'] }}</h3>
                            <span class="text-sm text-gray-600 bg-gray-50 px-2 py-1 rounded-lg">Archivés</span>
                        </div>
                    </div>
                </div>

                <!-- Events Grid -->
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-gray-900">Mes Événements</h2>
                        <a href="{{ route('events.create') }}" 
                           class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors">
                            Créer un événement
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($events as $event)
                            <div class="bg-white rounded-2xl border group hover:shadow-lg transition-all">
                                <!-- Event Image/Header -->
                                <div class="relative h-48 rounded-t-2xl bg-gradient-to-r from-blue-600 to-indigo-600 p-6">
                                    <div class="flex items-center justify-between">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-white/20 text-white">
                                            {{ $event->categorie }}
                                        </span>
                                        <div class="opacity-0 group-hover:opacity-100 transition-opacity">
                                            <div class="flex items-center gap-2">
                                                <a href="{{ route('events.edit', $event) }}" 
                                                   class="p-2 text-white/80 hover:text-white rounded-lg hover:bg-white/20">
                                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                    </svg>
                                                </a>
                                                <button onclick="showDeleteModal({{ $event->id }})"
                                                        class="p-2 text-white/80 hover:text-white rounded-lg hover:bg-white/20">
                                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-white mt-auto">{{ $event->titre }}</h3>
                                </div>

                                <!-- Event Content -->
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <p class="text-gray-600 line-clamp-2">{{ $event->description }}</p>
                                        
                                        <div class="flex items-center text-gray-500">
                                            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            {{ $event->lieu }}
                                        </div>

                                        <div class="flex items-center text-gray-500">
                                            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            {{ date('d/m/Y H:i', strtotime($event->date_heure)) }}
                                        </div>

                                        @if($event->max_participants)
                                            <div class="flex items-center gap-2">
                                                <div class="flex-1 bg-gray-100 rounded-full h-2">
                                                    <div class="bg-blue-600 h-2 rounded-full" 
                                                        style="width: {{ ($event->participants_count ?? 0) / $event->max_participants * 100 }}%">
                                                    </div>
                                                </div>
                                                <span class="text-sm text-gray-600">
                                                    {{ $event->participants_count ?? 0 }}/{{ $event->max_participants }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full">
                                <div class="text-center py-12 bg-white rounded-2xl border">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun événement</h3>
                                    <p class="mt-1 text-sm text-gray-500">Commencez par créer votre premier événement.</p>
                                    <div class="mt-6">
                                        <a href="{{ route('events.create') }}" 
                                           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700">
                                            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                            </svg>
                                            Créer un événement
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $events->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Ajouter ceci juste avant la fermeture de </body> -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center">
        <div class="bg-white rounded-lg p-8 max-w-md mx-auto">
            <h2 class="text-xl font-bold mb-4">Confirmer la suppression</h2>
            <p class="text-gray-600 mb-6">Êtes-vous sûr de vouloir supprimer cet événement ? Cette action est irréversible.</p>
            <div class="flex justify-end gap-4">
                <button onclick="closeDeleteModal()" class="px-4 py-2 text-gray-600 hover:text-gray-800">
                    Annuler
                </button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Ajouter le JavaScript pour la modale -->
    <script>
        function showDeleteModal(eventId) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');
            
            // Mettre à jour l'action du formulaire avec l'ID de l'événement
            form.action = `/events/${eventId}`;
            
            // Afficher la modale
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }

        // Fermer la modale si on clique en dehors
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });
    </script>

    <!-- Ajouter les notifications -->
    @if (session('success'))
        <div id="notification" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div id="notification" class="fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg">
            {{ session('error') }}
        </div>
    @endif

    <script>
        // Faire disparaître les notifications après 3 secondes
        const notification = document.getElementById('notification');
        if (notification) {
            setTimeout(() => {
                notification.style.display = 'none';
            }, 3000);
        }
    </script>

    <!-- Ajouter Alpine.js pour le menu déroulant -->
    <script src="//unpkg.com/alpinejs" defer></script>

</body>
</html>