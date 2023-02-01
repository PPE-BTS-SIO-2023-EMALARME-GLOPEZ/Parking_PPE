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
    <title>Parking</title>
</head>

<body class="flex flex-row bg-gradient-to-t from-spanish-gray to-pale-silver">

    <!-- Menu sidebar -->
    <div class="h-screen w-screen sm:w-1/4 xl:w-1/6  px-6 py-10 text-black bg-gradient-to-t from-spanish-gray to-pale-silver flex flex-col z-10 absolute sm:static">

        <!-- Sidebar logo -->
        <div class="h-8 w-full text-center text-2xl sm:text-xl lg:text-2xl xl:text-xl">
            <i class=" fa-solid fa-car-side text-middle-grey"></i>
            <span class="ml-1">Parking</span>
        </div>

        <!-- User profile card -->
        <div class="w-full h-fit my-11 py-3 flex flex-col justify-center align-middle items-center">
            <!-- Profile pic -->
            <div class="w-16 h-16 mb-3 bg-white flex flex-col justify-end align-bottom items-end rounded-full">
                <!-- Edit badge -->
                <div class="flex flex-row justify-center items-center">
                    @if( $user->est_actif) 
                        <i class="fa-solid fa-check w-4 h-4 pt-px text-xs text-white bg-black text-center rounded-full"></i>
                    @else
                        <i class="fa-solid fa-exclamation w-4 h-4 pt-px text-xs text-white bg-coquelicot text-center rounded-full"></i>
                    @endif
               </div>
            </div>
            <!-- Profile name -->
            <div class="text-lg lg:text-xl xl:text-lg text-center">
                <!-- add blade user full name -->
                <span class="">{{ $user->nom_utilisateur }}</span>
                <span>{{ $user->prenom_utilisateur }}</span>
            </div>
        </div>

        <!-- Nav links -->
        <nav class="w-full h-fit text-base lg:text-lg xl:text-base flex row justify-center">
            <ul class="text-center">
                <li class="py-2">Dashboard</li>
                <li class="py-2"><span>Folders</span></li>
                <li class="py-2"><span>Favorites</span></li>
                <li class="py-2"><span>Settings</span></li>
            </ul>
        </nav>

        <!-- Déconnexion -->
        <div class="w-full h-full grow text-xs align-end flex flex-col justify-end">
            <form action="{{ route('logout') }}" method="post" id="logout-form">@csrf</form>
            <button class="w-full text-center" onclick="document.getElementById('logout-form').submit()">
                <i class="fa-solid fa-door-open visible"></i>
                <span>Déconnexion</span>
            </button>
        </div>
    </div>

    <!-- Dashboard -->
    <div class="w-full h-screen text-clip grow flex flex-col bg-timberwolf sm:static">

        <!-- Moitié supérieure -->
        <div class="h-fill grow flex flex-col">

            <!-- Barre supérieure -->
            <div class="w-fill h-1/4 pt-10 mx-10 flex flex-row justify-between ">

                <h3 class="text-xl">
                    Disponibilité
                    @if($nb_places <= 0)
                        <span class="text-xs ml-1 px-2 py-1 h-fit text-white  bg-coquelicot text-center rounded-full translate-y-1">{{ $nb_places }} places</span>
                    @else
                        <span class="text-xs ml-1 px-2 py-1 h-fit text-white  bg-black text-center rounded-full translate-y-1">{{ $nb_places }} places</span>
                    @endif
               </h3>

                <div class="w-fit flex flex-row justify-between align-middle">
                    <button class="w-10 h-10 p-1 mr-3 text-base rounded-lg border-solid border-spanish-gray border-2 text-black shadow-sm">
                        <i class="fa-regular fa-bell"></i>
                    </button>
                    <button class="w-10 h-10 p-1 mr-3 text-base rounded-lg border-solid border-spanish-gray border-2 text-black shadow-sm" onclick="document.getElementById('logout-form').submit()">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </button>
                    <button class="w-fit h-10 px-2 text-base rounded-lg  text-white bg-middle-grey shadow-lg">
                        Cliquez moi !
                    </button>
                </div>
            </div>

            <!-- Contenu partie supérieure -->
            <div class="w-fill h-3/4 mt-11 mx-10 flex flex-row justify-start">

                <!-- Gros texte -->
                <div class="w-5/12 flex flex-col">
                    <span class="text-4xl mb-3 font-normal">
                        Gestion des réservations
                    </span>
                    <span class="text-base">
                        Vous ne pouvez avoir qu'une seule réservation active à la fois,
                        cependant vous pouvez l'annuler a tout moment pour en faire une nouvelle.
                        L'attribution d'une place se fait en fonction des disponibilités.
                    </span>
                </div>


                <!-- Carrousel -->
                <div class="w-7/12 h-full flex flex-col justify-center items-center">
                    <x-session-message />
                </div>
            </div>

        </div>

        <!-- Moitié inférieure -->
        <div class="h-1/2 my-10 w-full flex flex-row justify-around">

            <!-- Reservation -->
            <div class="w-4/12 ml-10 p-6 rounded-3xl drop-shadow-lg bg-white opacity-75 flex flex-col justify-between">
                <x-user-reservation :user="$user" />
            </div>

            <!-- Historique -->
            <div class="w-8/12 mx-10 p-6 bg-white rounded-3xl flex flex-col drop-shadow-lg opacity-75">
                <x-tableau-historique :user="$user" />
            </div>

        </div>
    </div>
</body>

</html>