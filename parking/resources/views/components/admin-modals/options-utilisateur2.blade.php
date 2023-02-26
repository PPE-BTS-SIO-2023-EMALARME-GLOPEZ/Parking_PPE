<div class="w-screen h-screen fixed bg-black/50 flex flex-col justify-center items-center z-20" x-show="optionsUtilisateur2" x-cloak >
    <div class="w-1/2 xl:w-1/3 h-fit bg-white rounded-xl">
        <div class="w-full h-fit px-5 py-2 flex flex-row justify-between border-b border-timberwolf">
            <h3 class="text-xl">Options utilisateur</h3>
            <button type="button" @@click="optionsUtilisateur2 = false, selected_user_id = null"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <!-- Contenu de la modale -->
        <div class="w-full h-fit flex flex-row justify-around py-5">
            <button type="button" @@click="optionsUtilisateur2 = false; modifierMotDePasse = true, $refs.password_form_user_id.setAttribute('value', selected_user_id)" class="bg-grey px-2 py-1 shadow rounded-lg border border-middle-grey">
                Mot de passe
            </button>            
            <button type="submit" form="" x-ref="desactiver_user_btn" class="px-2 py-1 bg-middle-grey/70 hover:bg-middle-grey/90 text-black rounded-lg shadow">
                Désactiver
            </button>
            <button type="submit" form="" x-ref="supprimer_user_btn" class="px-2 py-1 bg-coquelicot/70 hover:bg-coquelicot/90 text-black rounded-lg shadow">
                Supprimer
            </button>

        </div>
    </div>
</div>