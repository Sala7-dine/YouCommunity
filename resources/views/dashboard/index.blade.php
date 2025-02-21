<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventHub - Dashboard</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-['Plus_Jakarta_Sans'] bg-gray-50">
    <x-app-layout>
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
            <div class="flex-1">
                <!-- Top Bar -->
                <div class="bg-white border-b px-8 py-4">
                    <div class="flex items-center justify-between">
                        <h1 class="text-2xl font-bold text-gray-900">Tableau de bord</h1>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Créer un événement
                        </button>
                    </div>
                </div>
    
                <!-- Dashboard Content -->
                <div class="p-8">
                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                        <div class="bg-white p-6 rounded-xl border">
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Total Participants</p>
                                    <p class="text-2xl font-bold text-gray-900">1,234</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white p-6 rounded-xl border">
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Revenus</p>
                                    <p class="text-2xl font-bold text-gray-900">2,500€</p>
                                </div>
                            </div>
                        </div>
    
                        <div class="bg-white p-6 rounded-xl border">
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Événements</p>
                                    <p class="text-2xl font-bold text-gray-900">12</p>
                                </div>
                            </div>
                        </div>
    
                        <div class="bg-white p-6 rounded-xl border">
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Note moyenne</p>
                                    <p class="text-2xl font-bold text-gray-900">4.8/5</p>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Recent Events -->
                    <div class="bg-white rounded-xl border">
                        <div class="p-6 border-b">
                            <h2 class="text-lg font-bold text-gray-900">Événements récents</h2>
                        </div>
                        <div class="p-6">
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead>
                                        <tr class="text-left text-sm text-gray-500">
                                            <th class="pb-4 pr-6">Événement</th>
                                            <th class="pb-4 pr-6">Date</th>
                                            <th class="pb-4 pr-6">Participants</th>
                                            <th class="pb-4 pr-6">Statut</th>
                                            <th class="pb-4">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-sm">
                                        <tr class="border-t">
                                            <td class="py-4 pr-6">
                                                <div class="flex items-center">
                                                    <img src="https://picsum.photos/seed/1/40/40" 
                                                         class="w-8 h-8 rounded-lg mr-3">
                                                    <span class="font-medium text-gray-900">Festival de Jazz</span>
                                                </div>
                                            </td>
                                            <td class="py-4 pr-6 text-gray-600">25 Mars 2024</td>
                                            <td class="py-4 pr-6 text-gray-600">89/100</td>
                                            <td class="py-4 pr-6">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Actif
                                                </span>
                                            </td>
                                            <td class="py-4">
                                                <div class="flex items-center space-x-3">
                                                    <button class="text-gray-400 hover:text-blue-600">
                                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                        </svg>
                                                    </button>
                                                    <button class="text-gray-400 hover:text-red-600">
                                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Autres lignes du tableau... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
  
</body>
</html>