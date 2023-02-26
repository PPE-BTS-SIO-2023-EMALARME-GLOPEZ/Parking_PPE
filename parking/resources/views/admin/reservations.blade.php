<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/69c46c92d5.js" crossorigin="anonymous"></script>
    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    <!-- Tailwind UI font -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- JavaScript -->
    @vite('resources/js/app.js')
    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>[x-cloak] { display: none !important; }</style>
    <!-- Titre -->
    <title>Réservations</title>
</head>

<body class="flex flex-row bg-spanish-gray" x-data="{}">

    <x-dashboard.sidebar :user="$user" />

    <!-- Dashboard -->
    <div class="w-full h-fit xl:h-screen sm:max-lg:ml-36 text-clip grow flex flex-col bg-timberwolf max-lg:static">
            
        <!-- Navigation supérieure -->
        <x-dashboard.top-nav titre="Réservations" />

        <!-- Contenu -->
        <div class="w-full h-5/6 p-10 flex flex-col">
            <x-cards.liste-reservations :reservations="$reservations" /> 
        </div>
</body>

</html>