<x-layout title="Adicionar nova aula">

    <div class="ui segment">
        <h2 class="">
            Incluir Registro 
        </h2>

        <div class="ui divider"></div>

        @if ($errors->any())
            <div class="ui red message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @isset($messageSuccess)
        <div class="ui green message">
            {{ $messageSuccess }}
        </div>
        @endisset

        <x-form :action="route('posts.store')" />
        
    </div>

</x-layout>