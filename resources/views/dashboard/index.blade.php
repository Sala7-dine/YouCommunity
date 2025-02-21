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
            <!-- Top Bar -->
            <header class="bg-white border-b">
                <div class="flex items-center justify-between p-6">
                    <h1 class="text-xl font-bold text-gray-900">Mes Événements</h1>
                    <a href="{{ route('events.create') }}" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl hover:opacity-90 transition-opacity">
                        Créer un événement
                    </a>
                </div>
            </header>

            <!-- Main -->
            <main class="flex-1 p-6">
                <!-- Events Table -->
                <div class="bg-white rounded-2xl border">
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="text-left text-sm text-gray-500 border-b">
                                        <th class="pb-4 pr-6 font-medium">Événement</th>
                                        <th class="pb-4 pr-6 font-medium">Date & Heure</th>
                                        <th class="pb-4 pr-6 font-medium">Lieu</th>
                                        <th class="pb-4 pr-6 font-medium">Catégorie</th>
                                        <th class="pb-4 pr-6 font-medium">Participants</th>
                                        <th class="pb-4 font-medium">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm">
                                    @forelse($events as $event)
                                        <tr class="border-b">
                                            <td class="py-4 pr-6">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center">
                                                        <span class="text-blue-600">{{ substr($event->titre, 0, 2) }}</span>
                                                    </div>
                                                    <div>
                                                        <p class="font-medium text-gray-900">{{ $event->titre }}</p>
                                                        <p class="text-sm text-gray-500">{{ Str::limit($event->description, 50) }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-4 pr-6">
                                                <div>
                                                    <p class="text-gray-900">{{ date('d/m/Y', strtotime($event->date_heure)) }}</p>
                                                    <p class="text-sm text-gray-500">{{ date('H:i', strtotime($event->date_heure)) }}</p>
                                                </div>
                                            </td>
                                            <td class="py-4 pr-6">
                                                <p class="text-gray-900">{{ $event->lieu }}</p>
                                            </td>
                                            <td class="py-4 pr-6">
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium 
                                                    {{ $event->categorie === 'Musique' ? 'bg-purple-100 text-purple-800' : '' }}
                                                    {{ $event->categorie === 'Sport' ? 'bg-green-100 text-green-800' : '' }}
                                                    {{ $event->categorie === 'Art' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                                    {{ $event->categorie === 'Tech' ? 'bg-blue-100 text-blue-800' : '' }}">
                                                    {{ $event->categorie }}
                                                </span>
                                            </td>
                                            <td class="py-4 pr-6">
                                                @if($event->max_participants)
                                                    <div class="flex items-center gap-2">
                                                        <div class="w-24 bg-gray-100 rounded-full h-2">
                                                            <div class="bg-blue-600 h-2 rounded-full" 
                                                                style="width: {{ ($event->participants_count ?? 0) / $event->max_participants * 100 }}%">
                                                            </div>
                                                        </div>
                                                        <span class="text-gray-600">
                                                            {{ $event->participants_count ?? 0 }}/{{ $event->max_participants }}
                                                        </span>
                                                    </div>
                                                @else
                                                    <span class="text-gray-500">Illimité</span>
                                                @endif
                                            </td>
                                            <td class="py-4">
                                                <div class="flex items-center gap-2">
                                                    <a href="{{ route('events.edit', $event) }}" 
                                                       class="p-2 text-gray-400 hover:text-blue-600 rounded-lg hover:bg-gray-50">
                                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                                  d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('events.destroy', $event) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="p-2 text-gray-400 hover:text-red-600 rounded-lg hover:bg-gray-50"
                                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">
                                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="py-6 text-center text-gray-500">
                                                Aucun événement trouvé
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $events->links() }}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>