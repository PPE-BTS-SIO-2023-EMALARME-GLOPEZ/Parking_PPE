<div class="w-screen h-screen fixed bg-black/50 flex flex-col justify-center items-center z-20" x-show="modifierMotDePasse" x-cloak >
    <div class="w-1/2 xl:w-1/3 h-fit bg-white rounded-xl">
        <!-- Barre supérieure -->
        <div class="w-full h-fit px-5 py-2 flex flex-row justify-between border-b border-timberwolf">
            <h3 class="text-xl">Réinitialiser mot de passe</h3>
            <button type="button" @@click="modifierMotDePasse = false; optionsUtilisateur2 = true;"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <!-- Contenu de la modale -->
        <form action="{{ route('user.password') }}" method="post" class="w-full h-fit p-3 flex flex-col justify-start">
            @csrf
            <input type="hidden" name="user_id" value="" x-ref="password_form_user_id">

            <div class="w-full h-full pt-3 flex flex-col justify-start">

                <fieldset class="h-fit pb-6">
                    <label for="password">Mot de passe actuel</label><br>
                    <input type="password" name="password" value="{{ old('password') }}" class="w-full h-7 px-2 opacity-50 rounded-md border 
                        border-middle-grey focus:outline-none focus:border-black
                        focus:ring-1 focus:ring-middle-grey">
                        @error('password')
                            <span class="my-3 text-xs">
                                <i class="fa-solid fa-exclamation w-4 h-4 pt-px text-xs text-white bg-coquelicot text-center rounded-full"></i>
                                {{ $message}}
                            </span>
                        @enderror               
                </fieldset>

            <fieldset class="h-fit pb-6">
                    <label for="new_password">Nouveau mot de passe</label><br>
                    <input type="password" name="new_password" value="{{ old('new_password') }}" class="w-full h-7 px-2 opacity-50 rounded-md border 
                        border-middle-grey focus:outline-none focus:border-black
                        focus:ring-1 focus:ring-middle-grey">
                        @error('password')
                            <span class="my-3 text-xs">
                                <i class="fa-solid fa-exclamation w-4 h-4 pt-px text-xs text-white bg-coquelicot text-center rounded-full"></i>
                                {{ $message}}
                            </span>
                        @enderror               
                </fieldset>

                <fieldset class="h-fit pb-6">
                    <label for="new_password_confirmation">Confirmer nouveau mot de passe</label><br>
                    <input type="password" name="new_password_confirmation" value="{{ old('password_confirmation') }}" class="w-full h-7 px-2 opacity-50 rounded-md border 
                        border-middle-grey focus:outline-none focus:border-black
                        focus:ring-1 focus:ring-middle-grey">
                        @error('password_confirmation')
                            <span class="my-3 text-xs">
                                <i class="fa-solid fa-exclamation w-4 h-4 pt-px text-xs text-white bg-coquelicot text-center rounded-full"></i>
                                {{ $message}}
                            </span>
                        @enderror               
                </fieldset>
            </div>

            <div class=" h-fit flex flex-row justify-center justify-self-end">
                <button type="submit" class="p-2 w-fit h-fit rounded-lg bg-middle-grey hover:opacity-80 text-white shadow-md 
                    flex flex-col justify-center self-end">
                    Modifier
                </button>
            </div>
        </form>

        </div>
    </div>    
</div>