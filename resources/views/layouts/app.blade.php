<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>ImmoReserv</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white shadow-lg flex flex-col">
        <div class="p-6 text-xl font-bold text-blue-600">
            ImmoReserv
        </div>

        <nav class="space-y-2 px-4 flex-1">
            <a href="/dashboard"
               class="block px-4 py-2 rounded hover:bg-blue-100">
                Tableau de bord
            </a>

            <a href="/properties"
               class="block px-4 py-2 rounded hover:bg-blue-100">
                Propriétés
            </a>

            <a href="/my-bookings"
               class="block px-4 py-2 rounded hover:bg-blue-100">
                Réservations
            </a>
        </nav>

        <!-- DÉCONNEXION EN BAS -->
        <div class="p-4 border-t border-gray-200">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full text-left px-4 py-2 rounded text-red-500 hover:bg-red-50 hover:text-red-700 transition font-medium">
                    Déconnexion
                </button>
            </form>
        </div>

    </aside>

    <!-- CONTENU -->
    <main class="flex-1 p-6">
        {{ $slot }}
    </main>

</div>

</body>
</html>