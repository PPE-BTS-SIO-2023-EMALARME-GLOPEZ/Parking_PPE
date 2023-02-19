<div class="w-full xl:w-5/12 h-fit mt-10 xl:mb-0 xl:mt-5 flex flex-col rounded-xl bg-white text-black shadow-lg">
    <h1 class="text-xl my-5 px-5">Valider inscription</h1>
    <div class="h-44 px-5 overflow-auto scrollbar-thin scrollbar-thumb-spanish-gray scrollbar-track-grey">
        <table class="table-fixed w-full">
            <tbody class="">
                @foreach($utilisateurs_en_attente as $utilisateur)
                <tr class="w-full h-fit mb-3 last:mb-0 px-5 py-3 hover:bg-grey border-timberwolf hover:border-3 border-2 rounded-lg flex flex-row justify-between items-center">
                    <td class="flex flex-row">
                        <div class="w-12 h-12 mr-5 bg-middle-grey flex flex-col justify-end align-bottom items-end rounded-full"></div> 
                        <div class="h-12 flex flex-row items-center">
                            <span>{{ $utilisateur->prenom_utilisateur}}&nbsp;</span>
                            <span>{{ $utilisateur->nom_utilisateur}}</span>
                        </div>
                    </td>
                    @if( $utilisateur->est_actif)
                    <td class="text-xs sm:text-base px-2 "><span class="bg-lavande text-white text-xs py-1 px-2 rounded-full">Actif</span></td>
                    @else
                    <td class="text-xs sm:text-base px-2 "><span class="bg-coquelicot text-white text-xs py-1 px-2 rounded-full">Inactif</span></td>
                    @endif
                    <td class="flex justify-center items-center font-bold"><i class="fa-solid fa-ellipsis"></i></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="w-full p-5 flex flex-row justify-end">
        <a href="#" class="bg-grey px-2 py-1 shadow rounded-lg">
            <i class="fa-solid fa-plus p-1"></i>
            <span>Ajouter</span>
        </a>
    </div>
</div>

