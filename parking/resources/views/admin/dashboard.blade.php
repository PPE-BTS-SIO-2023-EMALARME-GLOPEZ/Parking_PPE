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
    <title>Parking</title>
    <style>[x-cloak] { display: none !important; }</style>
</head>

<body class="flex flex-row bg-spanish-gray" x-data="{creerUtilisateur : false, optionsUtilisateur2 : false, validerSuppressionPlace : false}">

    <!-- Modales -->
    <x-admin-modals.options-utilisateur2 /> 
    <x-modal nom="creerUtilisateur"/>
    <x-modal nom="optionsUtilisateur" />
    <x-modal nom="validerSuppressionPlace" />

    <x-dashboard.sidebar :user="$user"/>

    <!-- Dashboard -->
    <div class="w-full h-fit xl:h-screen sm:max-lg:ml-36 text-clip grow flex flex-col bg-timberwolf max-lg:static">

            
        <!-- Navigation supérieure -->
        <x-dashboard.top-nav titre="Administration" />

        <!-- Contenu -->
        <div class="w-full h-full xl:h-full p-10 flex flex-col xl:justify-around xl:grid xl:grid-cols-2 xl:grid-rows-2 xl:gap-10 bg-timberwolf">

            <div class="xl:w-full xl:h-full xl:col-start-1 xl:col-end-2 xl:row-span-1">
                <x-cards.liste-utilisateurs :utilisateurs="$utilisateurs" />
            </div>

            <!-- Places -->
            <div class="w-full h-full col-start-2 col-span-1">
                <x-cards.liste-places :places="$places" />
            </div>
            
           <!-- Reservations -->
            <div class="xl:h-full xl:col-span-2">
                <x-cards.liste-reservations :reservations="$reservations" />
            </div>

        </div>
    </div>
</body>

</html>