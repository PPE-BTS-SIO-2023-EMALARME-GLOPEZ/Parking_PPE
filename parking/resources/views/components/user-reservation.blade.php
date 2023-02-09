
    <!-- Titre -->
    <h3 class="w-full h-fit text-2xl mb-2 border-b-2 border-black flex flex-row justify-between">
        <span>
            Réservation
        </span> 
        <span>
            @if($user->reservation_id)#{{ $user->reservation_id }}@endif
        </span>
    </h3>

    
    <div class="w-full h-full flex flex-col items-center">

    @if(is_null($user->reservation_id))

        <div class="max-xl:h-40 text-center grow flex flex-col justify-center align-middle">
            <span>
                <i class="fa-solid fa-exclamation w-4 h-4 pt-px text-xs text-white bg-coquelicot text-center rounded-full"></i>
                Vous n'avez pas encore demandé de place
            </span>
        </div>

        <a class="w-fit h-fit px-3 py-1 text-white bg-black rounded-full" href="{{ route('reservation.create') }}">
            Réserver
        </a>
            
    @elseif(isset($reservation->place_id))
        <div class="grow w-full h-full mb-3 flex flex-col justify-center align-middle items-center">
            <span class="w-full h-fit text-left text-lg">
                Place n°{{ $reservation->place_id }}
            </span>
            <span class="w-full h-1/2 mx-6 mb-6 mt-2 rounded-xl flex flex-col justify-center items-center">
            </span>
            <ul class="w-full">
                <li>
                   <i class="fa-regular fa-calendar-check"></i> 
                    Du {{  $formatDate($reservation->date_debut_reservation) }}
                </li>
                <li>
                    <i class="fa-regular fa-calendar-xmark"></i>
                    Jusqu'au {{ $formatDate($reservation->date_fin_reservation) }}
                </li>
            </ul>
        </div>

        <form id="close-reservation" action="{{ route('reservation.close') }}" method="POST" class="hidden">
            @csrf
            @method('PUT')
        </form>

        <a class="w-fit h-fit px-3 py-1 text-white bg-black rounded-full" href="#" onclick="event.preventDefault();
            document.getElementById('close-reservation').submit();"">
            Annuler
        </a>
    @else
        <div class="text-center grow flex flex-col justify-center align-middle">
            <span>
                <i class="fa-solid fa-exclamation w-4 h-4 pt-px text-xs text-white bg-coquelicot text-center rounded-full"></i>
                Il n'y a aucune place disponible, vous avez été placé dans la liste d'attente
            </span>
            <span class="text-lg font-bold">
                Votre position : {{ $reservation->position_liste_attente }}
            </span>
        </div>

        <form id="close-reservation" action="{{ route('reservation.close') }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>

        <a class="w-fit h-fit px-3 py-1 text-white bg-black rounded-full" href="#" onclick="event.preventDefault();
            document.getElementById('close-reservation').submit();"">
            Annuler
        </a>
    @endif
    </div>


