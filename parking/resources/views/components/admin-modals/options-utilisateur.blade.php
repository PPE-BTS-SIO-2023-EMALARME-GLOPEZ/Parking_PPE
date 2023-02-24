<div class="w-1/2 xl:w-1/3 h-fit bg-white rounded-xl">
    <div class="w-full h-fit px-5 py-2 flex flex-row justify-between border-b border-timberwolf">
        <h3 class="text-xl">Options utilisateur</h3>
        <button type="button" @@click="optionsUtilisateur = false"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <!-- Contenu de la modale -->
    <div class="w-full h-fit flex flex-row justify-around py-5">
        <button type="submit" form="" x-ref="desactiver_user_btn" class="px-2 py-1 bg-middle-grey text-white rounded-lg">
            Desactiver
        </button>
    </div>
</div>
