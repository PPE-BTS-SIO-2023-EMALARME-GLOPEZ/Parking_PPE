

<div class="h-full max-h-72">
    <!-- Titre -->
    <h3 class="h-1/6 text-lg sm:text-2xl mb-2 border-b-2 border-black">Historique</h3>
    
    <div class="h-5/6 px-2 shadow rounded-lg overflow-auto scrollbar-thin scrollbar-thumb-spanish-gray scrollbar-track-grey ">
        <table class="table-auto w-full">
            <thead class="">
                <tr class="bg-grey">
                    <th class="text-xs sm:text-base py-2">Place</th>
                    <th class="text-xs sm:text-base py-2">Début</th>
                    <th class="text-xs sm:text-base py-2">Fin</th>
                    <th class="text-xs sm:text-base py-2">Durée</th>
                </tr>
            </thead>
            <tbody>
                @foreach($historique as $reservation)
                    <tr class="text-center hover:font-medium hover:text-lavande ease-in-out even:bg-grey odd:bg-white">
                        <td class="text-xs sm:text-base py-1 font-medium">#{{ $reservation->place_id }}</td>
                        <td class="text-xs sm:text-base py-1">{{ $formatDate($reservation->date_debut_reservation) }}</td>
                        <td class="text-xs sm:text-base py-1">{{ $formatDate($reservation->date_fin_reservation) }}</td>
                        <td class="text-xs sm:text-base py-1">{{ $reservationDuration($reservation) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>