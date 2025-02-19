<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventHub - Découvrez des Événements Extraordinaires</title>
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

    <!-- Hero Section -->
    <section class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Contenu gauche -->
                <div>
                    <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-6">
                        Trouvez les meilleurs événements près de chez vous
                    </h1>
                    <p class="text-lg text-gray-600 mb-8">
                        Découvrez et participez à des événements uniques qui correspondent à vos centres d'intérêt.
                    </p>
                    
                    <!-- Search Bar -->
                    <div class="bg-white shadow-lg rounded-xl p-2 border border-gray-200">
                        <div class="flex flex-col md:flex-row gap-2">
                            <div class="flex-1">
                                <input type="text" 
                                       class="w-full px-4 py-3 rounded-lg bg-gray-50 border-0 focus:ring-2 focus:ring-blue-600" 
                                       placeholder="Rechercher un événement...">
                            </div>
                            <button class="w-full md:w-auto px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                Rechercher
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Image de droite -->
                <div class="hidden lg:block">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3" 
                         alt="Événement" 
                         class="w-full h-[400px] object-cover rounded-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Catégories populaires</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach(['Musique', 'Sport', 'Art', 'Tech'] as $category)
                    <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition">
                        <h3 class="font-semibold text-gray-900">{{ $category }}</h3>
                        <p class="text-sm text-gray-600 mt-1">Voir les événements</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Events -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900">Événements à venir</h2>
                <a href="#" class="text-blue-600 hover:text-blue-700">Voir tout</a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach([
                    ['Festival de Jazz', '25 Mars', 'Paris'],
                    ['Marathon de Paris', '15 Avril', 'Paris'],
                    ['Expo Art Moderne', '10 Mai', 'Lyon']
                ] as [$title, $date, $location])
                    <div class="bg-white rounded-xl border hover:border-blue-600 transition overflow-hidden">
                        <img src="https://picsum.photos/seed/{{ $loop->index }}/800/400" 
                             class="w-full h-48 object-cover" alt="{{ $title }}">
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $title }}</h3>
                            <div class="flex items-center text-gray-600 text-sm">
                                <span>{{ $date }} • {{ $location }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Prêt à créer votre événement ?</h2>
            <p class="text-gray-600 mb-8">Rejoignez notre communauté d'organisateurs</p>
            <a href="#" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Commencer
            </a>
        </div>
    </section>

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
                <div>
                    <h3 class="font-semibold text-gray-900 mb-4">Organisateurs</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-blue-600">Créer un événement</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600">Tarification</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600">Ressources</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-4">Support</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-blue-600">Aide</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600">FAQ</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600">Conditions</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-4">Suivez-nous</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-blue-600">
                            <span class="sr-only">Facebook</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-blue-600">
                            <span class="sr-only">Instagram</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-blue-600">
                            <span class="sr-only">Twitter</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8 text-center text-gray-600">
                <p>&copy; 2024 EventHub. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>