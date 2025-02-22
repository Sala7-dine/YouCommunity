<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventHub - Dashboard</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-['Plus_Jakarta_Sans'] bg-gray-100" x-data="{ 
    showCreateModal: false, 
    showEditModal: false,
    editingEvent: null
}">
    <div class="min-h-screen flex">
        <!-- Include Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header avec menu de déconnexion -->
            <header class="bg-white border-b">
                <div class="px-4 sm:px-6 lg:px-8 py-4">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-semibold text-gray-900">Dashboard</h1>
                        
                    
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
                        <button @click="showCreateModal = true" 
                                class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Créer un événement
                        </button>
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
                                                <button @click="showEditModal = true; editingEvent = {{ $event }}" 
                                                        class="p-2 text-white/80 hover:text-white rounded-lg hover:bg-white/20">
                                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                    </svg>
                                                </button>
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

                                <!-- Dans la carte d'événement -->
                                <div class="flex items-center justify-between mt-4">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-sm text-gray-600">
                                            {{ $event->participants->count() }} participant(s)
                                        </span>
                                        @if($event->max_participants)
                                            <span class="text-sm text-gray-600">
                                                / {{ $event->max_participants }} max
                                            </span>
                                        @endif
                                    </div>
                                    
                                    @if($event->user_id !== Auth::id())
                                        <div x-data="{ status: '{{ $event->getUserParticipationStatus(Auth::id()) }}' }">
                                            <!-- Boutons RSVP -->
                                            <div class="flex items-center space-x-2">
                                                <button @click="participate('accepted')"
                                                        :class="status === 'accepted' ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700'"
                                                        class="px-3 py-1 rounded-lg text-sm font-medium transition-colors">
                                                    Participer
                                                </button>
                                                <button @click="participate('declined')"
                                                        :class="status === 'declined' ? 'bg-red-600 text-white' : 'bg-gray-100 text-gray-700'"
                                                        class="px-3 py-1 rounded-lg text-sm font-medium transition-colors">
                                                    Décliner
                                                </button>
                                            </div>
                                        </div>
                                    @endif
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

    <!-- Modale de création -->
    <div x-show="showCreateModal" 
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50">
        
        <!-- Overlay -->
        <div class="fixed inset-0 bg-black bg-opacity-50" 
             @click="showCreateModal = false"></div>

        <!-- Contenu de la modale -->
        <div class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex min-h-screen items-center justify-center p-4">
                <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-2xl"
                     @click.outside="showCreateModal = false">
                    
                    <!-- En-tête de la modale -->
                    <div class="flex items-center justify-between p-6 border-b">
                        <h2 class="text-xl font-semibold text-gray-900">Créer un nouvel événement</h2>
                        <button @click="showCreateModal = false" class="text-gray-400 hover:text-gray-500">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Formulaire -->
                    <form action="{{ route('events.store') }}" method="POST" class="p-6" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-6">
                            <!-- Titre -->
                            <div>
                                <label for="titre" class="block text-sm font-medium text-gray-700">Titre</label>
                                <input type="text" name="titre" id="titre" required
                                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                @error('titre')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" id="description" rows="3" required
                                          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                                @error('description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Lieu -->
                            <div>
                                <label for="lieu" class="block text-sm font-medium text-gray-700">Lieu</label>
                                <input type="text" name="lieu" id="lieu" required
                                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                @error('lieu')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Date et heure -->
                            <div>
                                <label for="date_heure" class="block text-sm font-medium text-gray-700">Date et heure</label>
                                <input type="datetime-local" name="date_heure" id="date_heure" required
                                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                @error('date_heure')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Catégorie -->
                            <div>
                                <label for="categorie" class="block text-sm font-medium text-gray-700">Catégorie</label>
                                <select name="categorie" id="categorie" required
                                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">Sélectionnez une catégorie</option>
                                    <option value="Sport">Sport</option>
                                    <option value="Musique">Musique</option>
                                    <option value="Art">Art</option>
                                    <option value="Tech">Tech</option>
                                    <option value="Business">Business</option>
                                </select>
                                @error('categorie')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nombre max de participants -->
                            <div>
                                <label for="max_participants" class="block text-sm font-medium text-gray-700">
                                    Nombre maximum de participants (optionnel)
                                </label>
                                <input type="number" name="max_participants" id="max_participants" min="1"
                                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                @error('max_participants')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Image -->
                            <div class="mt-4">
                                <label for="image" class="block text-sm font-medium text-gray-700">
                                    Image de l'événement
                                </label>
                                <div class="mt-1 flex items-center">
                                    <input type="file" 
                                           name="image" 
                                           id="image"
                                           accept="image/*"
                                           class="block w-full text-sm text-gray-500
                                                  file:mr-4 file:py-2 file:px-4
                                                  file:rounded-full file:border-0
                                                  file:text-sm file:font-semibold
                                                  file:bg-blue-50 file:text-blue-700
                                                  hover:file:bg-blue-100">
                                </div>
                                @error('image')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Boutons d'action -->
                        <div class="mt-6 flex items-center justify-end gap-3">
                            <button type="button" @click="showCreateModal = false"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-500">
                                Annuler
                            </button>
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                Créer l'événement
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modale de modification -->
    <div x-show="showEditModal" 
         x-cloak
         class="fixed inset-0 z-50 overflow-y-auto"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        
        <!-- Overlay -->
        <div class="fixed inset-0 bg-black bg-opacity-50" @click="showEditModal = false"></div>

        <!-- Contenu de la modale -->
        <div class="relative min-h-screen flex items-center justify-center p-4">
            <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-2xl">
                <!-- En-tête de la modale -->
                <div class="flex items-center justify-between p-6 border-b">
                    <h2 class="text-xl font-semibold text-gray-900">Modifier l'événement</h2>
                    <button @click="showEditModal = false" class="text-gray-400 hover:text-gray-500">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Formulaire de modification -->
                <form x-bind:action="'/events/' + editingEvent.id" 
                      method="POST" 
                      class="p-6">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-6">
                        <!-- Titre -->
                        <div>
                            <label for="edit_titre" class="block text-sm font-medium text-gray-700">Titre</label>
                            <input type="text" 
                                   name="titre" 
                                   id="edit_titre" 
                                   x-model="editingEvent.titre"
                                   required
                                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('titre')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="edit_description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" 
                                      id="edit_description" 
                                      x-model="editingEvent.description"
                                      rows="3" 
                                      required
                                      class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Lieu -->
                        <div>
                            <label for="edit_lieu" class="block text-sm font-medium text-gray-700">Lieu</label>
                            <input type="text" 
                                   name="lieu" 
                                   id="edit_lieu" 
                                   x-model="editingEvent.lieu"
                                   required
                                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('lieu')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Date et heure -->
                        <div>
                            <label for="edit_date_heure" class="block text-sm font-medium text-gray-700">Date et heure</label>
                            <input type="datetime-local" 
                                   name="date_heure" 
                                   id="edit_date_heure" 
                                   x-model="editingEvent.date_heure"
                                   required
                                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('date_heure')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Catégorie -->
                        <div>
                            <label for="edit_categorie" class="block text-sm font-medium text-gray-700">Catégorie</label>
                            <select name="categorie" 
                                    id="edit_categorie" 
                                    x-model="editingEvent.categorie"
                                    required
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="Sport">Sport</option>
                                <option value="Musique">Musique</option>
                                <option value="Art">Art</option>
                                <option value="Tech">Tech</option>
                                <option value="Business">Business</option>
                            </select>
                            @error('categorie')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nombre max de participants -->
                        <div>
                            <label for="edit_max_participants" class="block text-sm font-medium text-gray-700">
                                Nombre maximum de participants (optionnel)
                            </label>
                            <input type="number" 
                                   name="max_participants" 
                                   id="edit_max_participants" 
                                   x-model="editingEvent.max_participants"
                                   min="1"
                                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('max_participants')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Boutons d'action -->
                    <div class="mt-6 flex items-center justify-end gap-3">
                        <button type="button" 
                                @click="showEditModal = false"
                                class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-500">
                            Annuler
                        </button>
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            Mettre à jour
                        </button>
                    </div>
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
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        // Script pour la géolocalisation via l'API Google Maps
        function initAutocomplete() {
            const input = document.getElementById('lieu');
            const autocomplete = new google.maps.places.Autocomplete(input);
            
            autocomplete.addListener('place_changed', function() {
                const place = autocomplete.getPlace();
                if (place.geometry) {
                    document.querySelector('input[name="latitude"]').value = place.geometry.location.lat();
                    document.querySelector('input[name="longitude"]').value = place.geometry.location.lng();
                }
            });
        }
    </script>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('editingEvent', () => ({
        formatDateForInput(dateString) {
            if (!dateString) return '';
            const date = new Date(dateString);
            return date.toISOString().slice(0, 16);
        }
    }));
});
</script>

    <script src="https://maps.googleapis.com/maps/api/js?key=VOTRE_CLE_API&libraries=places&callback=initAutocomplete" async defer></script>

    <!-- Ajouter ces styles dans votre head ou fichier CSS -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <!-- Ajouter ce script pour gérer les participations -->
    <script>
    function participate(eventId, status) {
        fetch(`/events/${eventId}/participate`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ status: status })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Mettre à jour l'interface
                this.status = data.status;
            } else {
                alert(data.message);
            }
        });
    }
    </script>

</body>
</html>