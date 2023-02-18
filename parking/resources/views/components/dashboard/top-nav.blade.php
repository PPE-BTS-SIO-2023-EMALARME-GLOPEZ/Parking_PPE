<div class="w-full h-fit pt-10 px-10 flex flex-row  justify-between max-lg:items-center">

    <h3 class="text-md sm:text-lg xl:text-xl flex flex-col md:flex-row">
        <span>Disponibilité</span> 
        @if($nbPlaces <= 0)
            <span class="text-xs ml-1 px-2 py-1 w-fit h-fit text-white  bg-coquelicot text-center rounded-full translate-y-1">{{ $nbPlaces }}<span class="max-sm:hidden"> places</span></span>
        @else 
            <span class="text-xs ml-1 px-2 py-1 w-fit h-fit text-white  bg-black text-center rounded-full translate-y-1">{{ $nbPlaces }}<span class="max-sm:hidden"> places</span></span>
        @endif
    </h3>

    <div class="w-fit max-xl:text-lg flex flex-row justify-between align-middle ">
        <button class="w-10 h-10 p-1 mr-3 text-base rounded-lg border-solid border-spanish-gray border-2 text-black shadow-sm"
        onclick="toggleMenuVisibility()">
            <i class="fa-regular fa-bell"></i>
        </button>
        <button class="w-10 h-10 p-1 mr-3 text-base rounded-lg border-solid border-spanish-gray border-2 text-black shadow-sm" onclick="document.getElementById('logout-form').submit()">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
        </button>
        <button class="w-fit h-10 px-2 text-base rounded-lg  text-white bg-middle-grey shadow-lg">
            Cliquez moi !
        </button>
    </div>
</div>