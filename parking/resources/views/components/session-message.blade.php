<div class="p-4 {{ session()->has('message') ? 'bg-timberwolf text-lavande border-lavande border-2' : 'hidden' }} w-fit rounded-lg">
  {{ session()->get('message') }}
</div>
