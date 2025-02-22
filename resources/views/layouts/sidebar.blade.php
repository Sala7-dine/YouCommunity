<!-- Sidebar -->
<div class="w-64 bg-white border-r hidden lg:flex lg:flex-col">
    <!-- Logo -->
    <div class="p-4 border-b">
        <div class="flex items-center">
            <span class="text-2xl font-bold text-blue-600">EventHub</span>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto">
        <div class="p-4 space-y-1">
            <!-- Home -->
            <a href="{{ route('home') }}" 
               class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-600' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Accueil
            </a>

            <!-- Découvrir -->
            <a href="{{ route('events.discover') }}" 
               class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg {{ request()->routeIs('events.discover') ? 'bg-blue-50 text-blue-600' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                Découvrir
            </a>

            <!-- Mes événements -->
            <a href="{{ route('dashboard') }}" 
               class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Mes événements
            </a>

            <!-- Participants -->
            <a href="#" 
               class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg">
                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                Participants
            </a>

            <!-- Statistiques -->
            <a href="#" 
               class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg">
                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                Statistiques
            </a>
        </div>

        <!-- Séparateur -->
        <div class="p-4">
            <div class="border-t"></div>
        </div>

        <!-- Section Configuration -->
        <div class="p-4 space-y-1">
            <div class="px-4 py-2">
                <h2 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Configuration</h2>
            </div>

            <!-- Paramètres -->
            <a href="{{ route('profile.edit') }}" 
               class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg">
                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Paramètres
            </a>

            <!-- Aide -->
            <a href="#" 
               class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg">
                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Aide
            </a>
        </div>
    </nav>

    <!-- User Profile -->
    <div class="p-4 border-t">
        <div class="flex items-center space-x-4">
            <div class="flex-shrink-0">
                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                    <span class="text-blue-600 font-medium">
                        {{ substr(Auth::user()->name, 0, 2) }}
                    </span>
                </div>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 truncate">
                    {{ Auth::user()->name }}
                </p>
                <p class="text-sm text-gray-500 truncate">
                    {{ Auth::user()->email }}
                </p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-400 hover:text-gray-500">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
