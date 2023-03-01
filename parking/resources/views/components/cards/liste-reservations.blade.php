<div class="w-full h-full px-3 flex flex-col rounded-xl bg-white text-black shadow-lg">

    <h1 class="text-xl py-3 xl:py-5 px-5">Historique</h1>
    <div class="min-h-40 xl:h-fit overflow-auto scrollbar-thin scrollbar-thumb-spanish-gray scrollbar-track-grey border-2 border-timberwolf rounded-lg ">
        <table class="table-fixed w-full border-collapse">
            <thead class="sticky top-0 bg-grey" >
                <tr>
                    <th class="text-xs sm:text-base py-2 sticky top-0">Réservation</th>
                    <th class="text-xs sm:text-base py-2 sticky top-0">Statut</th>
                    <th class="text-xs sm:text-base py-2 sticky top-0">Place</th>
                    <th class="text-xs sm:text-base py-2 sticky top-0">Utilisateur</th>
                    <th class="text-xs sm:text-base py-2 sticky top-0">Début</th>
                    <th class="text-xs sm:text-base py-2 sticky top-0">Fin</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    <tr class="text-center  bg-white border-y-2 last:border-b-0 border-timberwolf group">
                        <td class="text-xs lg:text-base py-2 ">#{{ $reservation->id }}</td>
                        <!-- Affiche l'état de la réservation -->
                        @if($reservation->est_active)
                            <td class="text-xs lg:text-base py-2"><span class="bg-lavande/25 text-xs lg:text-sm py-1 px-2 rounded-lg">Active</span></td>
                        @else 
                            <td class="text-xs sm:text-base py-2"><span class="bg-coquelicot/25 text-xs lg:text-sm py-1 px-2 rounded-lg">Terminée</span></td>
                        @endif
                        <!-- Affiche le numéro de la place -->
                        @if(isset($reservation->place_id))
                            <td class="text-xs lg:text-base py-2">n°{{ $reservation->place_id}}</td>
                        @else
                            <td class="text-xs sm:text-base py-2">En attente</td>
                        @endif
                        <td class="text-xs lg:text-base py-2">{{$fetchUsername($reservation)}}</td>
                        <td class="text-xs lg:text-base py-2">{{ $fetchDate($reservation->date_debut_reservation)}}</td>
                        <td class="text-xs lg:text-base py-2">{{ $fetchDate($reservation->date_fin_reservation)}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Bouton ajouter -->
    <div class="w-full p-5 flex flex-row justify-end">
        <button type="button" class="bg-grey px-2 py-1 shadow rounded-lg border border-timberwolf" @@click="creationReservation = true">
            <i class="fa-solid fa-plus p-1"></i>
            <span>Ajouter</span>
        </button>
    </div>
</div>


