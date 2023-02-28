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
    <title>Parking</title>
</head>

<body class="flex flex-row bg-spanish-gray">

    <!-- Menu sidebar -->
    <div id="sideBarMenu" class="h-screen w-screen max-xl:w-36 xl:w-1/6 px-6 py-10 text-black bg-gradient-to-t from-spanish-gray to-pale-silver lg:flex flex-col z-10 max-lg:fixed max-sm:hidden">

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
                        <i class="fa-solid fa-check w-4 h-4 pt-px text-xs text-white bg-lavande text-center rounded-full"></i>
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
                <li class="py-2"><a href="{{ route('parametres') }}">Paramètres</a></li>
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
    <div class="w-full h-fit xl:h-screen sm:max-lg:ml-36 text-clip grow flex flex-col bg-timberwolf max-lg:static">

        <!-- Moitié supérieure -->
        <div class="h-full xl:h-2/5 grow flex flex-col ">

            <!-- Navigation supérieure -->
            <div class="w-full h-1/4 pt-10 px-10 flex flex-row  justify-between max-lg:items-center">

                <h3 class="text-md sm:text-lg xl:text-xl flex flex-col md:flex-row">
                    <span>Disponibilité</span> 
                    @if($nb_places <= 0)
                        <span class="text-xs ml-1 px-2 py-1 w-fit h-fit text-white  bg-coquelicot text-center rounded-full translate-y-1">{{ $nb_places }}<span class="max-sm:hidden"> places</span></span>
                    @else 
                        <span class="text-xs ml-1 px-2 py-1 w-fit h-fit text-white  bg-black text-center rounded-full translate-y-1">{{ $nb_places }}<span class="max-sm:hidden"> places</span></span>
                    @endif
               </h3>

                <div class="w-fit max-xl:text-lg flex flex-row justify-between align-middle ">
                    <button class="w-10 h-10 p-1 mr-3 text-base rounded-lg border-solid border-spanish-gray border-2 text-black shadow-sm"
                    onclick="toggleMenuVisibility()">
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
            <div class="w-full h-3/4 xl:h-3/4 pt-11 px-10 flex flex-row max-xl:flex-col justify-start items-center xl:items-start">

                <!-- Gros texte -->
                <div class=" xl:h-full max-xl:w-5/6 xl:w-7/12 flex flex-col">
                    <span class="text-2xl sm:text-3xl xl:text-4xl pb-3 font-normal">
                        Gestion des réservations
                    </span>
                    <span class="text-xs sm:text-sm xl:text-lg text-justify ">
                        Vous ne pouvez avoir qu'une seule réservation active à la fois,
                        cependant vous pouvez l'annuler a tout moment pour en faire une nouvelle.
                        L'attribution d'une place se fait en fonction des disponibilités.
                    </span>
                </div>


                <!-- Carrousel -->
                <div class="w-7/12 h-full flex flex-col justify-center items-center max-xl:hidden">
                </div>
            </div>

        </div>

        <!-- Moitié inférieure -->
        <div class="max-xl:h-fit xl:h-3/5 py-10 px-10 w-full flex max-xl:flex-col flex-row justify-around xl:justify-between max-lg:items-center">

            <!-- Reservation -->
            <div class="w-11/12 max-xl:mb-6 max-xl:mx-5 p-6 rounded-3xl drop-shadow-lg bg-white opacity-75 flex flex-col justify-between">
                <x-user-reservation :user="$user" />
            </div>

            <!-- Historique -->
            <div class="w-11/12 xl:w-3/4 h-72 xl:h-full mx-5 xl:ml-10 p-6 bg-white rounded-3xl flex flex-col drop-shadow-lg opacity-75">
                <x-tableau-historique :user="$user" />
            </div>

        </div>
    </div>
</body>

</html>