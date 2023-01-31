
    <!-- Titre -->
    <h3 class="w-full h-fit text-2xl mb-2 border-b-2 border-black">Réservation @if($user->reservation_id)#{{ $user->reservation_id }}@endif</h3>

    
    <div class="w-full h-full flex flex-col items-center">

    @if(is_null($user->reservation_id))

        <div class="text-center grow flex flex-col justify-center align-middle">
            <span>
                <i class="fa-solid fa-exclamation w-4 h-4 pt-px text-xs text-white bg-coquelicot text-center rounded-full"></i>
                Vous n'avez pas encore demandé de place
            </span>
        </div>

        <a class="w-fit h-fit px-3 py-1 text-white bg-black rounded-full" href="{{ route('reservation.create') }}">
            Réserver
        </a>
            
    @elseif(isset($reservation->place_id))
        <div class=" grow flex flex-col justify-center align-middle">
            <span>
                Votre place :
            </span>
            <ul>
                <li>Place n°{{ $reservation->place_id }}</li>
                <li>Date de début : {{  $reservation->created_at->format('d/m/Y') }}</li>
                <li>Date de fin : {{ $reservation->date_fin_reservation }}</li>
            </ul>
        </div>

        <form id="close-reservation" action="{{ route('reservation.close') }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>

        <a class="w-fit h-fit px-3 py-1 text-white bg-black rounded-full" href="#" onclick="event.preventDefault();
            document.getElementById('close-reservation').submit();"">
            Supprimer
        </a>
    @else
        <div class="text-center grow flex flex-col justify-center align-middle">
            <span>
                <i class="fa-solid fa-exclamation w-4 h-4 pt-px text-xs text-white bg-coquelicot text-center rounded-full"></i>
                Il n'y a aucune place disponible, vous avez été placé dans la liste d'attente
            </span>
            <span>
                Votre position : {{ $reservation->position_liste_attente }}
            </span>
        </div>

        <a class="w-fit h-fit px-3 py-1 text-white bg-black rounded-full" href="{{ route('reservation.create') }}">
            Réserver
        </a>
    @endif
    </div>


