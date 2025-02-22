<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventHub - {{ $event->titre }}</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="font-['Plus_Jakarta_Sans'] bg-white">
    <!-- Navigation -->
    <nav class="bg-white border-b sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-8 py-4">
            <div class="flex items-center justify-between">
                <a href="{{ route('home') }}" class="text-2xl font-bold">
                    <span class="text-blue-600">Event</span>Hub
                </a>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('events.discover') }}" class="text-gray-600 hover:text-blue-600">Découvrir</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-blue-600">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                Déconnexion
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600">Se connecter</a>
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            S'inscrire
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>



    <!-- Hero Event -->
    <div class="relative h-[400px]">
        <div class="absolute inset-0">
            @if($event->image)
                <img src="{{ $event->image }}" 
                     alt="{{ $event->titre }}"
                     class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-gradient-to-r from-blue-600 to-indigo-600"></div>
            @endif
            <div class="absolute inset-0 bg-black/50"></div>
        </div>
        
        <!-- Event Info -->
        <div class="absolute bottom-0 left-0 right-0 p-8">
            <div class="max-w-7xl mx-auto">
                <span class="inline-block px-4 py-1 rounded-lg bg-blue-600 text-white text-sm mb-4">
                    {{ $event->categorie }}
                </span>
                <h1 class="text-4xl font-bold text-white mb-4">{{ $event->titre }}</h1>
                <div class="flex items-center space-x-6 text-white">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        {{ \Carbon\Carbon::parse($event->date_heure)->format('d/m/Y') }}
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ \Carbon\Carbon::parse($event->date_heure)->format('H:i') }}
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                        {{ $event->lieu }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Description -->
                <div class="bg-white rounded-xl border p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">À propos de l'événement</h2>
                    <p class="text-gray-600 leading-relaxed">
                        {{ $event->description }}
                    </p>
                </div>

                <!-- Liste des participants -->
                <div class="bg-white rounded-xl border p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Participants</h2>
                    <div class="space-y-4">
                        @forelse($event->participants()->with('user')->get() as $participant)
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                                        <span class="text-blue-600 font-medium">
                                            {{ substr($participant->user->name, 0, 2) }}
                                        </span>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $participant->user->name }}</p>
                                        <p class="text-sm text-gray-500">
                                            @switch($participant->status)
                                                @case('pending')
                                                    <span class="text-yellow-600">En attente</span>
                                                    @break
                                                @case('accepted')
                                                    <span class="text-green-600">Confirmé</span>
                                                    @break
                                                @case('declined')
                                                    <span class="text-red-600">Refusé</span>
                                                    @break
                                            @endswitch
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500">Aucun participant pour le moment.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- RSVP Card -->
                <div class="bg-white rounded-xl border p-6 sticky top-24">
                    @if($event->max_participants)
                        <div class="flex justify-between items-center mb-6">
                            <div>
                                <p class="text-sm text-gray-500">Places restantes</p>
                                <p class="text-2xl font-bold text-gray-900">
                                    {{ $event->max_participants - $event->participants()->count() }}
                                </p>
                            </div>
                            <div class="flex-1 ml-4">
                                <div class="h-2 bg-gray-100 rounded-full">
                                    <div class="h-2 bg-blue-600 rounded-full" 
                                         style="width: {{ ($event->participants()->count() / $event->max_participants) * 100 }}%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @auth
                        @if(Auth::id() !== $event->user_id)
                            @php
                                $participation = $event->participants()->where('user_id', Auth::id())->first();
                            @endphp

                            @if(!$participation)
                                <button onclick="participate({{ $event->id }}, 'pending')"
                                        class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium">
                                    Je participe
                                </button>
                            @else
                                <div class="text-center">
                                    @switch($participation->status)
                                        @case('pending')
                                            <p class="text-yellow-600 mb-2">En attente de confirmation</p>
                                            @break
                                        @case('accepted')
                                            <p class="text-green-600 mb-2">Participation confirmée</p>
                                            @break
                                        @case('declined')
                                            <p class="text-red-600 mb-2">Participation refusée</p>
                                            @break
                                    @endswitch
                                    
                                    @if($participation->status !== 'declined')
                                        <button onclick="cancelParticipation({{ $event->id }})"
                                                class="text-red-600 hover:text-red-700">
                                            Annuler ma participation
                                        </button>
                                    @endif
                                </div>
                            @endif
                        @else
                            <p class="text-center text-gray-500">Vous êtes l'organisateur de cet événement</p>
                        @endif
                    @else
                        <a href="{{ route('login') }}" 
                           class="block w-full py-3 bg-blue-600 text-white text-center rounded-lg hover:bg-blue-700 font-medium">
                            Se connecter pour participer
                        </a>
                    @endauth

                    <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                        <h3 class="font-medium text-gray-900 mb-2">Organisateur</h3>
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                <span class="text-blue-600">{{ substr($event->user->name, 0, 2) }}</span>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">{{ $event->user->name }}</p>
                                <p class="text-sm text-gray-500">
                                    Organisateur depuis {{ $event->user->created_at->format('M Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="border-t py-12">
        <div class="max-w-7xl mx-auto px-8">
            <div class="text-center text-gray-600">
                <p>&copy; {{ date('Y') }} EventHub. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts pour la participation -->
    <script>
        function participate(eventId, status) {
            fetch(`/events/${eventId}/participate`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ status: status })
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