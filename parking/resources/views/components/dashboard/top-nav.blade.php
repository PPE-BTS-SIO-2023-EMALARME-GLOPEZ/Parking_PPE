<div class="w-full h-fit pt-5 px-10 flex flex-row justify-between max-lg:items-center">

        @if($titre == 'Disponibilité')
            <x-places-disponibles />
        @else
            <h3 class="text-md sm:text-2xl xl:text-2xl flex flex-col md:flex-row">{{$titre}}</h3>
        @endif

    <div class="w-fit max-xl:text-lg flex flex-row justify-between align-middle ">
        <a class="w-10 h-10 p-1 mr-3 text-base rounded-lg border-solid border-spanish-gray border-2 text-black shadow-sm flex flex-col justify-center items-center"
        href="{{ route('dashboard')}}">
            <i class="fa-solid fa-house"></i>
        </a>
        <button class="w-10 h-10 p-1 mr-3 text-base rounded-lg border-solid border-spanish-gray border-2 text-black shadow-sm" onclick="document.getElementById('logout-form').submit()">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
        </button>
        <button class="w-fit h-10 px-2 text-base rounded-lg  text-white bg-middle-grey shadow-lg">
            Cliquez moi !
        </button>
    </div>
</div>