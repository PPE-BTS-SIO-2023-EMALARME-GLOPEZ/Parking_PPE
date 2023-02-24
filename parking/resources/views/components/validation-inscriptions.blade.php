<div class="w-full h-fit mt-10 xl:mt-5 flex flex-col rounded-xl bg-white text-black shadow-lg">

    <h1 class="text-xl my-5 px-5">Demandes d'inscription - <span>{{ $nb_utilisateurs_en_attente }}</span></h1>

    <div class="h-44 px-5 overflow-auto scrollbar-thin scrollbar-thumb-spanish-gray scrollbar-track-grey">
        <table class="table-fixed w-full">
            <tbody class="h-fit">
                @foreach($utilisateurs_en_attente as $utilisateur)
                <tr class="w-full h-fit mb-3 last:mb-0 px-5 py-3 hover:bg-grey border-timberwolf hover:border-3 border-2 rounded-lg flex flex-row justify-between items-center">
                    <td class="flex flex-row w-1/2">
                        <div class="w-12 h-12 mr-5 bg-middle-grey flex flex-col justify-end align-bottom items-end rounded-full"></div> 
                        <div class="h-12 flex flex-row items-center">
                            <span>{{ $utilisateur->prenom_utilisateur}}&nbsp;</span>
                            <span>{{ $utilisateur->nom_utilisateur}}</span>
                        </div>
                    </td>
 
                    <td class="w-1/2 flex justify-end items-center font-normal">
                        <button for="supprimer_utilisateur" class="mx-1 px-2 text-black bg-timberwolf rounded-lg">Refuser</button>
                        <button type="submit" form="valider_inscription_{{$utilisateur->id}}" class="mx-1 px-2 text-white bg-lavande rounded-lg">Autoriser</button>
                    </td>
                </tr>
                <form action="{{ route('admin.valider_inscription')}}" method="POST" name="valider_inscription" id="valider_inscription_{{$utilisateur->id}}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user" value="{{$utilisateur->id}}">
                </form>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="w-full p-5 flex flex-row justify-end">
        <a href="#" class="bg-grey px-2 py-1 shadow rounded-lg border border-timberwolf">
            <span>Valider</span>
        </a>
    </div>
</div>

