
<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('POSTS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                    
	<h1>Tous les post</h1>

<p>
    <a href="{{ route('posts.create') }}" title="Créer un post" >Créer un nouveau post</a>
</p>

<table border="1" >
    <thead>
        <tr>
            <th>Titre</th>
            <th colspan="2" >Opérations</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>
                <a href="{{ route('posts.show', $post) }}" title="Lire l'article" >{{ $post->message }}</a>
            </td>
            <td>
                <a href="{{ route('posts.edit', $post->id) }}" title="Modifier l'article" >Modifier</a>
            </td>
            <td>
                <form method="POST" action="{{ route('posts.destroy', $post) }}" >
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="x Supprimer" >
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

            </div>
        </div>
    </div>
</x-app-layout>
