
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('modifier') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
<h1>modifier le post</h1>

<!-- Si nous avons un Post $post -->
@if (isset($post))

<!-- Le formulaire est géré par la route "posts.update" -->
<form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data" >

    <!-- <input type="hidden" name="_method" value="PUT"> -->
    @method('PUT')

@else

<!-- Le formulaire est géré par la route "posts.store" -->
<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" >

@endif

    <!-- Le token CSRF -->
    @csrf
    
    <p>
        <label for="title" >Message</label><br/>

        <!-- S'il y a un $post->title, on complète la valeur de l'input -->
        <input type="text" name="message" value="{{ isset($post->message) ? $post->title : old('title') }}"  id="title" placeholder="Le message" >

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

