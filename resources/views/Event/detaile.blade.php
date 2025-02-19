<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventHub - Détails de l'événement</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-['Plus_Jakarta_Sans'] bg-white">
    <!-- Navigation -->
    <nav class="bg-white border-b sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-8 py-4">
            <div class="flex items-center justify-between">
                <a href="/" class="text-2xl font-bold">
                    <span class="text-blue-600">Event</span>Hub
                </a>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-gray-600 hover:text-blue-600">Découvrir</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600">Catégories</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600">Créer un événement</a>
                    @auth
                        <a href="#" class="text-gray-600 hover:text-blue-600">Dashboard</a>
                        <a href="#" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Mon compte
                        </a>
                    @else
                        <a href="#" class="text-gray-600 hover:text-blue-600">Se connecter</a>
                        <a href="#" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
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
            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3" 
                 alt="Event Banner"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>
        
        <!-- Event Info -->
        <div class="absolute bottom-0 left-0 right-0 p-8">
            <div class="max-w-7xl mx-auto">
                <span class="inline-block px-4 py-1 rounded-lg bg-blue-600 text-white text-sm mb-4">
                    Musique
                </span>
                <h1 class="text-4xl font-bold text-white mb-4">Concert Jazz Fusion</h1>
                <div class="flex items-center space-x-6 text-white">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        25 Mars 2024
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        20:00
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                        Paris, France
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
                        Rejoignez-nous pour une soirée exceptionnelle de jazz fusion mettant en vedette 
                        des musiciens talentueux. Une expérience musicale unique qui mélange le jazz 
                        traditionnel avec des influences contemporaines.
                    </p>
                </div>

                <!-- Comments -->
                <div class="bg-white rounded-xl border p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Commentaires</h2>
                    <!-- Comment Form -->
                    <div class="flex items-start space-x-4 mb-8">
                        <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">JD</span>
                        </div>
                        <div class="flex-1">
                            <textarea 
                                class="w-full p-4 rounded-lg border focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                placeholder="Ajouter un commentaire..."></textarea>
                            <button class="mt-2 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                Commenter
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- RSVP Card -->
                <div class="bg-white rounded-xl border p-6 sticky top-24">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <p class="text-sm text-gray-500">Prix</p>
                            <p class="text-2xl font-bold text-gray-900">Gratuit</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Places restantes</p>
                            <p class="text-2xl font-bold text-gray-900">45</p>
                        </div>
                    </div>
                    <button class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium">
                        Je participe
                    </button>
                    <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                        <h3 class="font-medium text-gray-900 mb-2">Organisateur</h3>
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center mr-3">
                                <span class="text-gray-500">JD</span>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">John Doe</p>
                                <p class="text-sm text-gray-500">Organisateur depuis 2023</p>
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
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="font-semibold text-gray-900 mb-4">À propos</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-blue-600">Qui sommes-nous</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600">Contact</a></li>
                    </ul>
                </div>
                <!-- ... Autres colonnes du footer ... -->
            </div>
            <div class="mt-8 text-center text-gray-600">
                <p>&copy; 2024 EventHub. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>