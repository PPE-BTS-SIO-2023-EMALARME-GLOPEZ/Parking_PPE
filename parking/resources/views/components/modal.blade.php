<div class="w-screen h-screen fixed bg-black/50 flex flex-col justify-center items-center z-20" 
    x-show="afficherModale">
    <div class="w-1/3 h-fit bg-white rounded-xl">
        <div class="w-full h-fit px-5 py-2 flex flex-row justify-between border-b border-timberwolf">
            <h3 class="text-xl">Ajouter un utilisateur</h3>
            <button type="button" @@click="afficherModale = false"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <!-- Formulaire d'inscription -->
        <form action="{{ route('inscription.store') }}" method="post" class="h-full w-full flex flex-col justify-start px-5 py-2">

            @csrf

            <fieldset class="pb-4 @error('nom_utilisateur') pb-0 @enderror">
                <label for="nom_utilisateur">Nom</label>
                <input type="text" name="nom_utilisateur" class="w-full h-7 px-2 text-sm opacity-60 rounded-md border 
                    border-middle-grey focus:outline-none focus:border-black
                    focus:ring-1 focus:ring-middle-grey
                    @error('nom_utilisateur') border-coquelicot @enderror"
                    value="{{ old('nom_utilisateur')}}">
                    @error('nom_utilisateur')
                        <span class="text-xs">
                            <i class="fa-solid fa-exclamation w-4 h-4 pt-px text-xs text-white bg-coquelicot text-center rounded-full"></i>
                            {{ $message}}
                        </span>
                    @enderror
            </fieldset>


            <fieldset class="pb-4 @error('prenom_utilisateur') pb-0 @enderror">
                <label for="prenom_utilisateur">Prénom</label>
                <input type="text" name="prenom_utilisateur" class="w-full h-7 px-2 text-sm opacity-60 rounded-md border 
                    border-middle-grey focus:outline-none focus:border-black
                    focus:ring-1 focus:ring-middle-grey @error('prenom_utilisateur') border-coquelicot @enderror"
                    value="{{old('prenom_utilisateur')}}">
                        @error('prenom_utilisateur')
                        <span class="text-xs">
                            <i class="fa-solid fa-exclamation w-4 h-4 pt-px text-xs text-white bg-coquelicot text-center rounded-full"></i>
                            {{ $message}}
                        </span>
                    @enderror               
                </fieldset>

            <fieldset class="pb-4 @error('username') pb-0 @enderror">
                <label for="username">Nom d'utilisateur</label><br>
                <input type="text" name="username" class="w-full h-7 px-2  text-sm opacity-50 rounded-md border 
                    border-middle-grey focus:outline-none focus:border-black
                    focus:ring-1 focus:ring-middle-grey @error('username') border-coquelicot @enderror"
                    value="{{ old('username')}}">
                    @error('username')
                        <span class="text-xs">
                            <i class="fa-solid fa-exclamation w-4 h-4 pt-px text-xs text-white bg-coquelicot text-center rounded-full"></i>
                            {{ $message}}
                        </span>
                    @enderror               
            </fieldset>

            <fieldset class="pb-4 @error('password') pb-0 @enderror">
                <label for="password">Mot de passe</label><br>
                <input type="password" name="password" class="w-full h-7 px-2 opacity-50 rounded-md border 
                    border-middle-grey focus:outline-none focus:border-black
                    focus:ring-1 focus:ring-middle-grey @error('password') border-coquelicot @enderror"
                    value="{{old('password')}}">
                    @error('password')
                        <span class="text-xs">
                            <i class="fa-solid fa-exclamation w-4 h-4 pt-px text-xs text-white bg-coquelicot text-center rounded-full"></i>
                            {{ $message}}
                        </span>
                    @enderror               
            </fieldset>

            <fieldset class="pb-4 @error('password_confirmation') pb-0 @enderror">
                <label for="password_confirmation">Confirmer le mot de passe</label><br>
                <input type="password" name="password_confirmation" class="w-full h-7 px-2 opacity-50 rounded-md border 
                    border-middle-grey focus:outline-none focus:border-black focus:ring-1 focus:ring-middle-grey 
                    @error('password_confirmation') border-coquelicot @enderror" value="{{ old('password_confirmation')}}">
                    @error('password_confirmation')
                        <span class="text-xs">
                            <i class="fa-solid fa-exclamation w-4 h-4 pt-px text-xs text-white bg-coquelicot text-center rounded-full"></i>
                            {{ $message}}
                        </span>
                    @enderror               
            </fieldset>

            <div class="my-2 flex flex-row justify-end justify-self-end">
                <button type="reset" class="p-2 mx-2 w-fit h-fit rounded-lg bg-timberwolf hover:opacity-80 text-black shadow-md 
                    flex flex-col justify-end self-end border border-middle-grey">
                    Annuler
                </button>
               <button type="submit" class="p-2 w-fit h-fit rounded-lg bg-middle-grey hover:opacity-80 text-white shadow-md 
                    flex flex-col justify-end self-end">
                    Valider
                </button>
           </div>
        </form>

    </div>
</div>