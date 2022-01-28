
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashbo01ard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <h1>Créer un post</h1>

<!-- Le formulaire est géré par la route "posts.store" -->
<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" >

    <!-- Le token CSRF -->
    @csrf
    
    <p>
        <label for="title" >Titre</label><br/>
        <input type="text" name="message" value="{{ old('title') }}"  id="title" placeholder="Le titre du message" >

        <!-- Le message d'erreur pour "title" -->
        @error("title")
        <div>{{ $message }}</div>
        @enderror
    </p>
    <input type="submit" name="valider" value="Valider" >

</form>


   </div>
            </div>
        </div>
    </div>
</x-app-layout>
