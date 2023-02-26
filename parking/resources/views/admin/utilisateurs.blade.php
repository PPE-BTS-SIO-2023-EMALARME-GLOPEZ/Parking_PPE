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
    <title>Parking</title>
</head>

<body class="flex flex-row bg-spanish-gray" x-data="{optionsUtilisateur2 : false, creerUtilisateur : false, modifierMotDePasse : false, selected_user_id : null, user_est_actif : false}">

    <!-- Fenêtres modales -->
    <x-admin-modals.options-utilisateur2 /> 
    <x-modal nom="creerUtilisateur" />
    <x-admin-modals.modifier-mot-de-passe />

    <x-dashboard.sidebar :user="$user" />

    <!-- Dashboard -->
    <div class="w-full h-fit xl:h-screen sm:max-lg:ml-36 text-clip grow flex flex-col bg-timberwolf max-lg:static">
            
        <!-- Navigation supérieure -->
        <x-dashboard.top-nav titre="Gestion des utilisateurs" />

        <!-- Contenu -->
        <div class="w-full h-full p-10 flex flex-col xl:p-10 xl:grid xl:grid-cols-2 xl:grid-rows-1 gap-10">

            <!-- Colonne de gauche -->
            <div class="w-full flex flex-col justify-start xl:col-span-1">
                <x-validation-inscriptions :utilisateurs="$utilisateurs" />
            </div>
            <!-- Colonne de droite -->
            <div class="w-full flex flex-col">
                <x-cards.liste-utilisateurs :utilisateurs="$utilisateurs" />
            </div>
            
        </div>
</body>

</html>