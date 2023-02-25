
<div class="w-full h-fit mb-10 xl:mb-2 px-3 flex flex-col rounded-xl bg-white text-black shadow-lg">

    <h1 class="text-xl my-5 px-5">Reservations</h1>
    <div class="max-h-40 xl:h-5/6 overflow-auto scrollbar-thin scrollbar-thumb-spanish-gray scrollbar-track-grey border-2 border-timberwolf rounded-lg ">
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-grey">
                    <th class="text-xs sm:text-base py-2">ID</th>
                    <th class="text-xs sm:text-base py-2">Statut</th>
                    <th class="text-xs sm:text-base py-2">Place</th>
                    <th class="text-xs sm:text-base py-2">Début</th>
                    <th class="text-xs sm:text-base py-2">Fin</th>
            </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    <tr class="text-center  bg-white border-y-2 last:border-b-0 border-timberwolf group">
                        <td class="text-xs sm:text-base py-2 ">#{{ $reservation->id }}</td>
                        @if($reservation->est_active)
                        <td class="text-xs sm:text-base py-2"><span class="bg-lavande/25 text-xs lg:text-sm py-1 px-2 rounded-lg">Active</span></td>
                        @else 
                        <td class="text-xs sm:text-base py-2"><span class="bg-coquelicot/25 text-xs lg:text-sm py-1 px-2 rounded-lg">Terminée</span></td>
                        @endif
                        <td class="text-xs sm:text-base py-2">n°{{ $reservation->place_id}}</td>
                        <td class="text-xs sm:text-base py-2">{{ $formatDate($reservation->date_debut_reservation) }}</td>
                        <td class="text-xs sm:text-base py-2">{{ $formatDate($reservation->date_fin_reservation) }}</td>
                    </tr>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
    <x-bouton-ajouter route-name="dashboard" />
</div>


