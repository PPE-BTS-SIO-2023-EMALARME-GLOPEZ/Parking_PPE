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
        <x-dashboard.top-nav titre="Gestion des places" />

        <!-- Contenu -->
        <div class="w-full h-full px-10 xl:p-10 xl:grid xl:grid-cols-2 gap-10">

            <!-- Places -->
            <div class="flex flex-col justify-start">
                <div class="w-full h-fit px-3 flex flex-col rounded-xl bg-white text-black shadow-lg">
                    <h1 class="text-xl my-5 px-5">Places</h1>
                    <div class="h-44 rounded-lg overflow-auto scrollbar-thin scrollbar-thumb-spanish-gray scrollbar-track-grey border-2 border-timberwolf">
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
                                    <tr class="text-center ease-in-out border-y-2 last:border-b-0 border-timberwolf bg-white group">
                                        <td class="text-xs sm:text-base py-2">#{{ $place->id }}</td>
                                        @if($place->est_occupee)
                                        <td class="text-xs sm:text-base py-2 "><span class="bg-coquelicot/25 text-xs  py-1 px-2 rounded-lg">Occupée</span></td>
                                        @else 
                                        <td class="text-xs sm:text-base py-2 "><span class="bg-lavande/25  text-xs py-1 px-2 rounded-lg">Disponible</span></td>
                                        @endif
                                        <td class="text-xs sm:text-base py-2">
                                            <button x-on:click="validerSuppressionPlace = true">
                                                <i class="fa-solid fa-xmark text-sm"></i>
                                            </button>
                                        </td>
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

            </div>
            <div class="flex flex-col justify-center"></div>
            

        </div>
</body>

</html>