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
    <title>Parking</title>
</head>

<body class="flex flex-row bg-spanish-gray" x-data="{validerSuppressionPlace : false}">

    <!-- Modals -->
    <x-modal nom="validerSuppressionPlace" />

    <x-dashboard.sidebar :user="$user" />

    <!-- Dashboard -->
    <div class="w-full h-fit xl:h-screen sm:max-lg:ml-36 text-clip grow flex flex-col bg-timberwolf max-lg:static">
            
        <!-- Navigation supérieure -->
        <x-dashboard.top-nav titre="Gestion des places" />

        <!-- Contenu -->
        <div class="w-full h-full px-10 xl:p-10 xl:grid xl:grid-cols-2 xl:grid-rows-1 gap-10">

            <!-- Places -->
            <div class="flex flex-col col-span-1 justify-start">
                <x-cards.liste-places :places="$places" />
            </div>

            <!-- Liste attente -->
            <x-cards.liste-attente :liste="$liste_attente" />

        </div>
</body>

</html>