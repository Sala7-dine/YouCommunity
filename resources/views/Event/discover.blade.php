<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- En-tête avec filtres -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Découvrir les événements</h1>
                
                <!-- Filtres -->
                <div class="bg-white rounded-xl shadow-sm p-4">
                    <form action="{{ route('events.discover') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <!-- Recherche -->
                        <div class="col-span-2">
                            <input type="text" 
                                   name="search" 
                                   value="{{ request('search') }}"
                                   placeholder="Rechercher un événement..."
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- Catégorie -->
                        <div>
                            <select name="categorie" 
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Toutes les catégories</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}" {{ request('categorie') == $cat ? 'selected' : '' }}>
                                        {{ $cat }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Bouton de recherche -->
                        <div>
                            <button type="submit" 
                                    class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                Rechercher
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Grille d'événements -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($events as $event)
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-shadow">
                        <!-- Image -->
                        <div class="h-48 bg-gradient-to-r from-blue-600 to-indigo-600 relative overflow-hidden">
                            @if($event->image)
                                <img src="{{ Storage::url($event->image) }}" 
                                     alt="{{ $event->titre }}"
                                     class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black bg-opacity-30"></div>
                            @endif
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 bg-white/20 rounded-full text-sm text-white backdrop-blur-sm">
                                    {{ $event->categorie }}
                                </span>
                            </div>
                        </div>

                        <!-- Contenu -->
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $event->titre }}</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $event->description }}</p>

                            <!-- Détails -->
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ \Carbon\Carbon::parse($event->date_heure)->format('d/m/Y H:i') }}
                                </div>
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    </svg>
                                    {{ $event->lieu }}
                                </div>
                            </div>

                            <!-- Footer -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                        <span class="text-blue-600 font-medium text-sm">
                                            {{ substr($event->user->name, 0, 2) }}
                                        </span>
                                    </div>
                                    <span class="text-sm text-gray-600">{{ $event->user->name }}</span>
                                </div>

                                @auth
                                    @if($event->user_id !== Auth::id())
                                        <button onclick="participate({{ $event->id }}, 'accepted')"
                                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm">
                                            Participer
                                        </button>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}"
                                       class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm">
                                        Se connecter
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full">
                        <div class="text-center py-12 bg-white rounded-xl">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1M19 20h-6a2 2 0 01-2-2v-3a2 2 0 012-2h6a2 2 0 012 2v3a2 2 0 01-2 2z"/>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun événement trouvé</h3>
                            <p class="mt-1 text-sm text-gray-500">Essayez de modifier vos critères de recherche.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $events->links() }}
            </div>
        </div>
    </div>
</x-app-layout> 