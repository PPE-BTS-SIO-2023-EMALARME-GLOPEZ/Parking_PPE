<h3 class="text-md sm:text-lg xl:text-xl flex flex-col md:flex-row">
    <span>Disponibilité</span> 
    @if($nbPlaces <= 0)
        <span class="text-xs ml-1 px-2 py-1 w-fit h-fit text-white  bg-coquelicot text-center rounded-full translate-y-1">{{ $nbPlaces }}<span class="max-sm:hidden"> places</span></span>
    @else 
        <span class="text-xs ml-1 px-2 py-1 w-fit h-fit text-white  bg-black text-center rounded-full translate-y-1">{{ $nbPlaces }}<span class="max-sm:hidden"> places</span></span>
    @endif
</h3>