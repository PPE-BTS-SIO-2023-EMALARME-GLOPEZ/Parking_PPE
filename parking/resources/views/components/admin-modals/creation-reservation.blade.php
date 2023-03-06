<div class="w-screen h-screen fixed bg-black/50 flex flex-col justify-center items-center z-20" x-show="creationReservation" x-cloak >
    <div class="w-1/2 xl:w-1/3 h-fit bg-white rounded-xl">
        <!-- Barre supérieure -->
        <div class="w-full h-fit px-5 py-2 flex flex-row justify-between border-b border-timberwolf">
            <h3 class="text-xl">Créer une réservation</h3>
            <button type="button" @@click="creationReservation = false"><i class="fa-solid fa-xmark"></i></button>
        </div>

        <form action="{{ route('reservation.create')}}" method="POST" class="h-full w-full flex flex-col justify-start px-5 py-2">

            @csrf

            <fieldset  class="pb-3 @error('user_id') pb-0 @enderror">
                <label for="user">Utilisateur</label>
                <select name="user_id" id="user" required class="w-full h-7 px-2 text-sm opacity-60 rounded-md border 
                    border-middle-grey focus:outline-none focus:border-black
                    focus:ring-1 focus:ring-middle-grey
                    @error('nom_utilisateur') border-coquelicot @enderror">
                    <option value="">Choisir un utilisateur</option>
                    @foreach ($users as $user)
                       <option value="{{$user->id}}">{{$fetchFullName($user)}}</option> 
                    @endforeach
                </select>
                @error('nom_utilisateur')
                    <span class="text-xs">
                        <i class="fa-solid fa-exclamation w-4 h-4 pt-px text-xs text-white bg-coquelicot text-center rounded-full"></i>
                        {{ $message}}
                    </span>
                @enderror
            </fieldset>

            <fieldset class="pb-3 @error('place_id') pb-0 @enderror">
                <label for="place">Place</label>
                <select name="place_id" id="place" required class="w-full h-7 px-2 text-sm opacity-60 rounded-md border 
                        border-middle-grey focus:outline-none focus:border-black
                        focus:ring-1 focus:ring-middle-grey
                        @error('nom_utilisateur') border-coquelicot @enderror">
                        <option value="">Choisir une place</option>
                        @foreach ($places as $place)
                            <option value="{{$place->id}}">{{$place->id}}</option>
                        @endforeach
                </select>
            </fieldset>

            <div class="my-2 flex flex-row justify-end justify-self-end">
                <button type="submit" class="px-2 py-1 mx-2 w-fit h-fit rounded-lg bg-timberwolf hover:opacity-80 text-black shadow-md 
                    flex flex-col justify-end self-end border border-middle-grey">
                    Valider 
                </button>
            </div>

        </form>


    </div>
</div>