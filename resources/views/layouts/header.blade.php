<!-- Navigation -->
<nav class="bg-white border-b sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-8 py-4">
        <div class="flex items-center justify-between">
            <a href="/" class="text-2xl font-bold">
                <span class="text-blue-600">Event</span>Hub
            </a>
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('events.discover') }}" class="text-gray-600 hover:text-blue-600">Découvrir</a>
                <a href="#" class="text-gray-600 hover:text-blue-600">Catégories</a>
                <a href="#" class="text-gray-600 hover:text-blue-600">Créer un événement</a>
                @auth
                    <a href="{{route('dashboard')}}" class="text-gray-600 hover:text-blue-600">Dashboard</a>
                    <a href="#" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Mon compte
                    </a>
                @else
                    <a href="/login" class="text-gray-600 hover:text-blue-600">Se connecter</a>
                    <a href="/register" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        S'inscrire
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>