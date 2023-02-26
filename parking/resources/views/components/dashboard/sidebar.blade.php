<!-- Menu sidebar -->
<div id="sideBarMenu" class="h-screen w-screen max-xl:w-36 xl:w-1/6 px-6 py-5 text-black bg-gradient-to-t from-spanish-gray to-pale-silver lg:flex flex-col z-10 max-lg:fixed max-sm:hidden">

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
            <li class="py-2"><a href="{{ route('dashboard')}}">Accueil</a></li>
            <li class="py-2"><a href="{{ route('admin.places')}}">Places</a></li>
            <li class="py-2"><a href="{{ route('admin.utilisateurs')}}">Utilisateurs</a></li>
            <li class="py-2"><a href="{{ route('admin.reservations')}}">Réservations</a></li>
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