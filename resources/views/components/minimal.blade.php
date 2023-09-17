<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <x-slot:description>{{ $description }}</x-slot>

   <div class="container">
        <div class="row text-center align-middle">
            <div class="col">
                <h1 class="text-white">{{ $message }}</h1>
            </div>
        </div>
   </div>

</x-layout>