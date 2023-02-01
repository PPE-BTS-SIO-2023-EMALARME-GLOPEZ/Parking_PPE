<div class="{{ session()->has('message') ? 'inline' : 'hidden' }} ">
    <span>
        <i class="fa-solid fa-check w-4 h-4 pt-px text-xs text-white bg-lavande text-center rounded-full"></i>
        {{ session()->get('message') }}
    </span>
</div>
