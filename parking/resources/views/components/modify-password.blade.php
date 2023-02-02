<!-- Formulaire de modification du mot de passe -->

<div class="h-full w-full p-6 pb-8  text-black bg-white opacity-75 rounded-3xl shadow-lg flex col justify-center align-middle">

    <form action="{{ route('changePassword') }}" method="post" class="w-full h-full flex flex-col justify-start">
        <h2 class="text-xl pb-3">Modifier le mot de passe</h2>
        @csrf

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

        <div class="mt-5 h-1/6 flex flex-row justify-center justify-self-end">
            <button type="submit" class="p-2 w-fit h-fit rounded-lg bg-middle-grey hover:opacity-80 text-white shadow-md 
                flex flex-col justify-center self-end">
                Modifier
            </button>
        </div>
    </form>
</div>