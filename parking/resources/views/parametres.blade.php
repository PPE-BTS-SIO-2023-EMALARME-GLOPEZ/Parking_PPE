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
    <title>Parking - paramètres </title>
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
            <div class="w-16 h-16 mb-3 bg-beige flex flex-col justify-end align-bottom items-end rounded-full"
                style="background-image: url('https://source.boringavatars.com/beam/80/{{$user->username}}?colors=031C30,5A3546,B5485F,FC6747,FA8D3B)" >

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
                <li class="py-2">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>

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
    <div class="w-full h-screen text-clip grow flex flex-col bg-timberwolf sm:static">

        <!-- Contenu du Dasboard-->
        <div class="h-full grow flex flex-col">

            <!-- Navigation supérieure -->
            <nav class="w-full h-1/6 pt-10 px-10 flex flex-row justify-between ">

                <h3 class="text-md sm:text-lg xl:text-xl flex flex-col md:flex-row">
                    Disponibilité
                    @if($nb_places <= 0)
                        <span class="text-xs ml-1 px-2 py-1 h-fit text-white  bg-coquelicot text-center rounded-full translate-y-1">{{ $nb_places }} places</span>
                    @else
                        <span class="text-xs ml-1 px-2 py-1 h-fit text-white  bg-black text-center rounded-full translate-y-1">{{ $nb_places }} places</span>
                    @endif
               </h3>

                <div class="w-fit flex flex-row justify-between align-middle">
                    <a class="w-10 h-10 p-1 mr-3 text-base rounded-lg border-solid border-spanish-gray border-2 text-black shadow-sm flex flex-col justify-center items-center"
                        href="{{ route('dashboard')}}">
                        <i class="fa-solid fa-house"></i>
                    </a>
                    <button class="w-10 h-10 p-1 mr-3 text-base rounded-lg border-solid border-spanish-gray border-2 text-black shadow-sm" onclick="document.getElementById('logout-form').submit()">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </button>
                    <button class="w-fit h-10 px-2 text-base rounded-lg  text-white bg-middle-grey shadow-lg">
                        Cliquez moi !
                    </button>
                </div>
            </nav>

            <!-- Conteneur body -->
            <div class="w-full h-full p-10 flex flex-col lg:grid lg:grid-cols-4">

                <div class="w-full h-full lg:col-start-1 lg:col-span-2 ">
                        <!-- Container -->
                        <div>
                            <x-modify-password />
                        </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>