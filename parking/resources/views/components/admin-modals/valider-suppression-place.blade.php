<div class="w-1/2 xl:w-1/3 h-fit bg-white rounded-xl">
    <div class="w-full h-fit px-5 py-2 flex flex-row justify-between border-b border-timberwolf">
        <h3 class="text-xl">Confirmer suppression ?</h3>
        <button type="button" @@click="validerSuppressionPlace = false"><i class="fa-solid fa-xmark"></i></button>
    </div>

    <!-- Contenu de la modale -->
    <div class="w-full h-fit flex flex-row justify-center py-5">
        <button type="button" class="w-1/6 px-2 py-1 bg-timberwolf text-black rounded-lg" @@click="validerSuppressionPlace = false">
            Annuler
        </button>
        <button type="submit" form="" x-ref="supprimer_place_btn" class="w-1/6 py-1 mx-5 bg-coquelicot/60 text-black rounded-lg">
            Confirmer
        </button>

   </div>
</div>