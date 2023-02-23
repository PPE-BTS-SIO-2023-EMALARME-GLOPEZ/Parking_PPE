<div class="w-screen h-screen fixed bg-black/50 flex flex-col justify-center items-center z-20" x-show="{{$nom}}" x-cloak >
    <x-dynamic-component :component="$content" />
</div>