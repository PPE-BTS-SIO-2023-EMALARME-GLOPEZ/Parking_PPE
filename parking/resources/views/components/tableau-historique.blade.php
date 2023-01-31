<table class="table-auto w-full">
    <thead>
        <tr>
            <th>Place n°</th>
            <th>Début</th>
            <th>Fin</th>
            <th>Durée</th>
        </tr>
    </thead>
    <tbody>
        @foreach($historique as $reservation)
            <tr class="text-center">
                <td>{{ $reservation->place_id }}</td>
                <td>{{ $formatDate($reservation->date_debut_reservation) }}</td>
                <td>{{ $formatDate($reservation->date_fin_reservation) }}</td>
                <td>indefini</td>
            </tr>
        @endforeach
    </tbody>
</table>
