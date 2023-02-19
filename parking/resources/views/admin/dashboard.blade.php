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

    <x-dashboard.sidebar :user="$user" />

    <!-- Dashboard -->
    <div class="w-full h-fit xl:h-screen sm:max-lg:ml-36 text-clip grow flex flex-col bg-timberwolf max-lg:static">
            
        <!-- Navigation supérieure -->
        <x-dashboard.top-nav :nbPlaces="$nb_places" />

        <!-- Contenu -->
        <div class="w-full h-full px-10 flex flex-col xl:justify-around">

            <!-- Conteneur utilisateurs et places (XL) -->
            <div class="w-full h-fit xl:h-1/2 flex flex-col xl:flex-row justify-between">
                <!-- Utilisateurs -->
                <div class="w-full xl:w-5/12 h-fit mt-10 xl:mb-0 xl:mt-5 flex flex-col rounded-xl bg-white text-black shadow-lg">
                    <h1 class="text-xl my-5 px-5">Utilisateurs</h1>
                    <div class="h-44 px-5 overflow-auto scrollbar-thin scrollbar-thumb-spanish-gray scrollbar-track-grey">
                        <table class="table-fixed w-full">
                            <tbody class="">
                                @foreach($utilisateurs as $utilisateur)
                                <tr class="w-full h-fit mb-3 last:mb-0 px-5 py-3 hover:bg-grey border-timberwolf hover:border-3 border-2 rounded-lg flex flex-row justify-between items-center">
                                    <td class="flex flex-row">
                                        <div class="w-12 h-12 mr-5 bg-middle-grey flex flex-col justify-end align-bottom items-end rounded-full"></div> 
                                        <div class="h-12 flex flex-row items-center">
                                            <span>{{ $utilisateur->prenom_utilisateur}}&nbsp;</span>
                                            <span>{{ $utilisateur->nom_utilisateur}}</span>
                                        </div>
                                    </td>
                                    @if( $utilisateur->est_actif)
                                    <td class="text-xs sm:text-base px-2 "><span class="bg-lavande text-white text-xs py-1 px-2 rounded-full">Actif</span></td>
                                    @else
                                    <td class="text-xs sm:text-base px-2 "><span class="bg-coquelicot text-white text-xs py-1 px-2 rounded-full">Inactif</span></td>
                                    @endif
                                    <td class="flex justify-center items-center font-bold"><i class="fa-solid fa-ellipsis"></i></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="w-full p-5 flex flex-row justify-end">
                        <a href="#" class="bg-grey px-2 py-1 shadow rounded-lg">
                            <i class="fa-solid fa-plus p-1"></i>
                            <span>Ajouter</span>
                        </a>
                    </div>
                </div>

            <!-- Places -->
                <div class="w-full h-fit xl:w-6/12 my-10 xl:mb-0 xl:mt-5 px-3 flex flex-col rounded-xl bg-white text-black shadow-lg">
                    <h1 class="text-xl my-5 px-5">Places</h1>
                    <div class="h-5/6 rounded-lg overflow-auto scrollbar-thin scrollbar-thumb-spanish-gray scrollbar-track-grey border-2 border-timberwolf">
                        <table class="table-auto w-full">
                            <thead class="">
                                <tr class="bg-grey">
                                    <th class="text-xs sm:text-base py-2">ID</th>
                                    <th class="text-xs sm:text-base py-2">Statut</th>
                                    <th class="text-xs sm:text-base py-2"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($places as $place)
                                    <tr class="text-center hover:font-medium ease-in-out border-y-2 last:border-b-0 border-timberwolf bg-white group">
                                        <td class="text-xs sm:text-base py-2">#{{ $place->id }}</td>
                                        @if($place->est_occupee)
                                        <td class="text-xs sm:text-base py-2 "><span class="group-hover:bg-coquelicot text-xs group-hover:text-white py-1 px-2 rounded-full">Occupée</span></td>
                                        @else 
                                        <td class="text-xs sm:text-base py-2 "><span class="group-hover:bg-lavande group-hover:text-white text-xs py-1 px-2 rounded-full">Disponible</span></td>
                                    @endif
                                        <td class="text-xs sm:text-base py-2"><i class="fa-regular fa-pen-to-square"></i></td>
                                </tr>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="w-full p-5 flex flex-row justify-end">
                        <a href="#" class="bg-grey px-2 py-1 shadow rounded-lg">
                            <i class="fa-solid fa-plus p-1"></i>
                            <span>Ajouter</span>
                        </a>
                    </div>
              </div>

            </div>
            

           <!-- Reservations -->
           <x-liste-reservations :reservations="$reservations"/>
     </div>
</body>

</html>