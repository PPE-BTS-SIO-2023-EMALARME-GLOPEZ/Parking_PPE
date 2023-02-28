<div class="w-full h-fit xl:mb-0 flex flex-col rounded-xl bg-white text-black shadow-lg">
    <h1 class="text-xl my-5 px-5">Utilisateurs - <span>{{ $utilisateurs->count()}}</span></h1>
    <div class="h-44 px-5 overflow-auto scrollbar-thin scrollbar-thumb-spanish-gray scrollbar-track-grey">
        <table class="table-fixed w-full">
            <tbody class="">
                @foreach($utilisateurs as $utilisateur)
                <tr class="w-full h-fit mb-3 last:mb-0 px-5 py-3 hover:bg-grey border-timberwolf hover:border-3 border-2 rounded-lg flex flex-row justify-between items-center">
                    <td class="w-1/2 flex flex-row">
                        <div class="w-12 h-12 mr-5 bg-middle-grey flex flex-col justify-end align-bottom items-end rounded-full"></div> 
                        <div class="h-12 flex flex-row items-center">
                            <span>{{ $utilisateur->prenom_utilisateur}}&nbsp;</span>
                            <span>{{ $utilisateur->nom_utilisateur}}</span>
                        </div>
                    </td>
                    @if( $utilisateur->est_actif)
                    <td class="w-1/4 text-xs sm:text-base px-2 "><span class="bg-lavande/25 text-black text-xs py-1 px-2 rounded-lg">Actif</span></td>
                    @else
                    <td class="w-1/4 text-xs sm:text-base px-2 "><span class="bg-coquelicot/25 text-black text-xs py-1 px-2 rounded-lg">Inactif</span></td>
                    @endif
                    <td class="flex justify-center items-center font-bold">
                        <button type="button" @@click="optionsUtilisateur2 = true, 
                            $refs.desactiver_user_btn.setAttribute('form', 'desactiver_{{$utilisateur->id}}'),
                            $refs.supprimer_user_btn.setAttribute('form', 'supprimer_{{$utilisateur->id}}'),
                            selected_user_id = {{$utilisateur->id}} 
                            @if($utilisateur->est_actif) user_est_actif = true @endif">
                            <i class="fa-solid fa-ellipsis"></i>
                        </button>
                    </td>
            </tr>

            <form action="{{ route('admin.desactiver_utilisateur')}}" id="desactiver_{{$utilisateur->id}}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{$utilisateur->id}}">

            </form>

            <!-- Supprimer -->
            <form action="{{route('user.delete')}}" id="supprimer_{{$utilisateur->id}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="user_id" value="{{$utilisateur->id}}" />
            </form>           
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- Bouton d'ajout d'un nouvel utilisateur -->
    <div class="w-full h-20 p-5 flex flex-row justify-end">
        <button type="button" class="bg-grey px-2 py-1 shadow rounded-lg border border-timberwolf" @@click="creerUtilisateur = true">
            <i class="fa-solid fa-plus p-1"></i>
            <span>Ajouter</span>
        </button>
    </div>

</div>
