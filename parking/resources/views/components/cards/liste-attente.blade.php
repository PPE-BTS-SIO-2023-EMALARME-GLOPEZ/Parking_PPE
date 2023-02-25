<div class="flex flex-col col-span-1 justify-start">
    <div class="w-full h-fit px-3 flex flex-col rounded-xl bg-white text-black shadow-lg">
        <h1 class="text-xl my-5 px-5">Liste d'attente</h1>
        <div class="h-44 rounded-lg overflow-auto scrollbar-thin scrollbar-thumb-spanish-gray scrollbar-track-grey border-2 border-timberwolf">
            <table class="table-auto w-full">
                <thead class="">
                    <tr class="bg-grey">
                        <th class="text-xs sm:text-base py-2">Position</th>
                        <th class="text-xs sm:text-base py-2">Utilisateur</th>
                        <th class="text-xs sm:text-base py-2">Réservation</th>
                        <th class="text-xs sm:text-base py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($liste as $ticket)
                    <tr class="text-center border-y-2 last:border-b-0 border-timberwolf bg-white group">
                            <td class="text-xs sm:text-base py-2">#{{ $ticket->position }}</td>
                            <td class="text-xs sm:text-base py-2">{{ $getNomPrenomUtilisateur($ticket) }}</td>
                            <td class="text-xs sm:text-base py-2">n°{{ $getReservation($ticket)->id}}</td>

                            <td class="text-xs sm:text-base py-2">
                                <!-- Reculer dans la file d'attente -->
                                <button type="submit" form="down{{$ticket->id}}" class="group-last:hidden">
                                    <i class="fa-solid fa-down-long"></i>
                                </button>
                                <!-- Avancer dans la file d'attente -->
                                <button type="submit" form="up{{$ticket->id}}" class="group-first:hidden">
                                    <i class="fa-solid fa-up-long"></i>
                                </button>
                            </td>

                        <form action="{{route('waitlist.down')}}" method="POST" id="down{{$ticket->id}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$ticket->id}}">
                        </form>

                        <form action="{{route('waitlist.up')}}" method="POST" id="up{{$ticket->id}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$ticket->id}}">
                        </form>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="w-full h-20 p-5 flex flex-row justify-end">

        </div>
    </div>
</div>
