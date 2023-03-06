<div class="w-full h-fit px-3 flex flex-col rounded-xl bg-white text-black shadow-lg">
    <h1 class="text-xl my-5 px-5">Places</h1>
    <div class="h-44 rounded-lg overflow-auto scrollbar-thin scrollbar-thumb-spanish-gray scrollbar-track-grey border-2 border-timberwolf">
        <table class="table-fixed w-full">
            <thead class="">
                <tr class="bg-grey">
                    <th class="w-2/12 text-xs sm:text-base py-2">ID</th>
                    <th class="w-5/12 text-xs sm:text-base py-2">Statut</th>
                    <th class="w-4/12 text-xs sm:text-base py-2">Utilisateur</th>
                    <th class="w-1/12 text-xs sm:text-base py-2"></th>
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
                        <td class="text-xs sm:text-sm py-2">
                        {{$fetchUsername($place)}}
                        </td>
                        <td class="text-xs sm:text-base py-2">
                            <button type="button" x-on:click="validerSuppressionPlace = true, $refs.supprimer_place_btn.setAttribute('form', 'supprimer_place_{{$place->id}}')">
                                <i class="fa-solid fa-xmark text-sm"></i>
                            </button>
                        </td>
                    </tr>

                    <form action="{{route('place.supprimer')}}" id="supprimer_place_{{$place->id}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="place_id" value="{{$place->id}}">
                    </form>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="w-full h-20 p-5 flex flex-row justify-end">

        <form action="{{route('place.ajouter')}}" method="POST" id="ajouter_place">
            @csrf 
            @method('post') 
        </form>

        <button type="submit" form="ajouter_place" class="bg-grey px-2 py-2 h-fit shadow rounded-lg">
            <i class="fa-solid fa-plus p-1"></i>
            <span>Ajouter</span>
        </button>
    </div>
</div>