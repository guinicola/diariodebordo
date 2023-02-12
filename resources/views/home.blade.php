<x-layout title="Diário de Bordo">

    <div class="ui tiny message right aligned">
        <?php setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');?>
        <?php
            $date = \Carbon\Carbon::parse('Y')->locale('pt-BR');
            echo $date->translatedFormat('l, d \d\e F \d\e Y'); //  16 março 2018
        ?>
    </div>
    
    <div class="ui {{Auth::check() ? auth()->user()->color : "black"}} segment">
        <div class="ui dividing header">Últimos registros</div>

        <div class="ui four column doubling stackable grid">
           
            @forelse ($posts as $post)
            <div class="column">
                <div class="ui segment">
                    <p class="popupIt" data-content="Data" data-variation="mini"><b><i class="calendar alternate outline icon"></i> {{date('d/m/Y', strtotime($post->date));}} </b></p>
                    <p class="popupIt" data-content="Horário de Aula" data-variation="mini"><i class="clock outline icon"></i> {{ $post->time_from }} | {{ $post->time_to ;}}</p>
                    <p class="popupIt" data-content="Classe" data-variation="mini"><i class="chalkboard icon"></i> {{ $post->class }} </p>
                    <div class="ui divider"></div>
                    <p class="popupIt" data-content="Habilidade" data-variation="mini"><i class="book reader icon"></i>{{ $post->hability}}</p>
                    <p>{{ $post->title}}</p>
                    <div class="ui divider"></div>
                    <p>
                        <a href="javascript:viewRegister({{$post->id}},'{{$post->title}}');" class="ui mini blue icon fluid button popupIt" data-content="Ver Registro"><i class="eye icon"></i> Visualizar</a>
                    </p>
                </div>
            </div>
            @empty
            <div class="sixteen wide column">
                <div class="ui segment">
                    Nenhum registro cadastrado.
                </div>
            </div>
            @endforelse

        </div>

    </div>
   
</x-layout>