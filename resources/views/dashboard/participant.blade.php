<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventHub - Mes Participations</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="font-['Plus_Jakarta_Sans'] bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Include Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="flex-1">
            <div class="py-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-bold text-gray-900 mb-8">Mes Participations</h1>

                    <!-- En attente -->
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">En attente de confirmation</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @forelse($participations['pending'] ?? [] as $participation)
                                <div class="bg-white rounded-xl border hover:shadow-lg transition-shadow">
                                    <div class="relative h-48 rounded-t-xl overflow-hidden">
                                        @if($participation->event->image)
                                            <img src="{{ $participation->event->image }}" 
                                                 alt="{{ $participation->event->titre }}" 
                                                 class="w-full h-full object-cover">
                                        @else
                                            <div class="h-full bg-gradient-to-r from-yellow-400 to-yellow-600"></div>
                                        @endif
                                        <div class="absolute inset-0 bg-black/50"></div>
                                        <div class="absolute top-4 right-4">
                                            <span class="px-3 py-1 bg-yellow-500 text-white rounded-full text-sm">
                                                En attente
                                            </span>
                                        </div>
                                    </div>

                                    <div class="p-6">
                                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $participation->event->titre }}</h3>
                                        <div class="space-y-3">
                                            <div class="flex items-center text-gray-500">
                                                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                {{ \Carbon\Carbon::parse($participation->event->date_heure)->format('d/m/Y H:i') }}
                                            </div>
                                            <div class="flex items-center text-gray-500">
                                                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                </svg>
                                                {{ $participation->event->lieu }}
                                            </div>
                                            <div class="flex items-center text-gray-500">
                                                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                </svg>
                                                Organisé par {{ $participation->event->user->name }}
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <button onclick="cancelParticipation({{ $participation->event->id }})"
                                                    class="w-full px-4 py-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition-colors">
                                                Annuler ma participation
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-full">
                                    <p class="text-gray-500 text-center">Aucune participation en attente</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Confirmées -->
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Participations confirmées</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @forelse($participations['accepted'] ?? [] as $participation)
                                <div class="bg-white rounded-xl border hover:shadow-lg transition-shadow">
                                    <div class="relative h-48 rounded-t-xl overflow-hidden">
                                        @if($participation->event->image)
                                            <img src="{{ $participation->event->image }}" 
                                                 alt="{{ $participation->event->titre }}" 
                                                 class="w-full h-full object-cover">
                                        @else
                                            <div class="h-full bg-gradient-to-r from-green-400 to-green-600"></div>
                                        @endif
                                        <div class="absolute inset-0 bg-black/50"></div>
                                        <div class="absolute top-4 right-4">
                                            <span class="px-3 py-1 bg-green-500 text-white rounded-full text-sm">
                                                Confirmé
                                            </span>
                                        </div>
                                    </div>

                                    <div class="p-6">
                                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $participation->event->titre }}</h3>
                                        <div class="space-y-3">
                                            <div class="flex items-center text-gray-500">
                                                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                {{ \Carbon\Carbon::parse($participation->event->date_heure)->format('d/m/Y H:i') }}
                                            </div>
                                            <div class="flex items-center text-gray-500">
                                                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                </svg>
                                                {{ $participation->event->lieu }}
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <a href="{{ route('events.show', $participation->event) }}" 
                                               class="block w-full px-4 py-2 bg-blue-600 text-white text-center rounded-lg hover:bg-blue-700 transition-colors">
                                                Voir les détails
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-full">
                                    <p class="text-gray-500 text-center">Aucune participation confirmée</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function cancelParticipation(eventId) {
            if (!confirm('Êtes-vous sûr de vouloir annuler votre participation ?')) {
                return;
            }

            fetch(`/events/${eventId}/participate`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Une erreur est survenue');
            });
        }
    </script>
</body>
</html>
