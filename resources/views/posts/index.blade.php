<x-layout title="Registos de aulas">

    <div class="ui grid">

        <div class="four wide column">
            <div class="ui segment">
                <h5>Filtros</h5> 
                <div class="ui divider"></div>
                
                <form action="" method="GET" class="ui tiny form" enctype="multipart/form-data">
                    <div class="field">
                        <label for="">
                            Data Única:
                            <input type="date" name="data"  value="{{ request()->get('data') }}"  >
                        </label>
                    </div>
                    <div class="field">
                        <label for="">
                            Data Inicial:
                            <input type="date" name="dateFrom" value="{{ request()->get('dateFrom') }}"  >
                        </label>
                    </div>
                    <div class="field">
                        <label for="">
                            Data Final:
                            <input type="date" name="dateTo" value="{{ request()->get('dateTo') }}"  >
                        </label>
                    </div>

                    <div class="field">
                        <label for="">
                            Sala:
                            <input type="text" name="class" placeholder="Ex: 6A">
                        </label>
                    </div>
                    
                    <div class="field">
                        <label for="hability">
                            Hablilidade:
                            <input type="text" id="hability" name="hability" value="{{ request()->get('hability') }}" placeholder="Ex: EF01LP02B">
                        </label>
                    </div>

                    <div class="field">
                        <button class="ui tiny black fluid icon button" type="submit"><i class="search icon"></i> Filtrar</button>
                    </div>
                    @if(count($_GET) > 0)
                    <div class="field">
                        <a class="ui tiny red fluid icon button" href="{{ route('posts.index') }}"><i class="erase icon"></i> Limpar Filtros</a>
                    </div>
                    <p>
                        Filtrando por: 
                    </p>
                        <div class="ui divider"></div>
                        @php
                            echo !empty(request()->get('data')) ? "<p><i class='circle mini icon'></i> Data</p>" : "";
                            echo (!empty(request()->get('dateFrom')) || !empty(request()->get('dateTo'))) ? "<p><i class='circle mini icon'></i> Data</p>" : "";
                            echo !empty(request()->get('class')) ? "<p><i class='circle mini icon'></i> Sala</p>" : "";
                        @endphp
                    @endif

                </form>

            </div>
        </div>

        <div class="twelve wide column">

            <div class="ui segment">
                <h2 class="">
                    Diário de Bordo 
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
        
                <table class="ui celled striped table">
        
                    <thead>
                        <tr>
                            <th width="45%">Data / Horário</th>
                            <th width="25%">Sala</th>
                            <th width="30%" class="center aligned">Ações</th>
                        </tr>
                    </thead>
        
                    <tbody>
        
                        @forelse ($posts as $post)
                        
                            <tr>
                                <td class="item">
                                    <i class="calendar alternate outline icon"></i> <a href="?data={{$post->date}}">{{date('d/m/Y', strtotime($post->date));}}</a> | <i class="clock outline icon"></i> {{$post->time_from}} | {{$post->time_to}} 
                                    <br>
                                    <span class="popupIt" data-content="Habilidade" data-variation="mini"><i class="book reader icon"></i>[{{ $post->hability}}]</span>
                                   
                                </td>
                                <td class="item">
                                    <a href="?class={{$post->class}}"> {{$post->class}} </a>
                                </td>
                                <td class="item center aligned" style="display:flex; justify-content:center;">
                                    <a href="javascript:viewRegister({{$post->id}},'{{$post->title}}');" class="ui mini circular blue icon button popupIt" data-content="Ver Registro"><i class="eye icon"></i></a>
                                    @if(Auth::check())
                                    <a href='{{ route('posts.edit',$post->id) }}' class="ui mini circular green icon button popupIt" data-content="Editar Registro"><i class="edit icon"></i></a>
                                    <a href='/posts/{{$post->id}}/duplicate' class="ui mini circular yellow icon button popupIt" data-content="Duplicar Registro"><i class="copy icon"></i></a>
                                    <a href="javascript:void(0);" data-id="{{$post->id}}" data-hour="{{$post->time_from}} | {{$post->time_to}}" class="ui mini circular red icon button popupIt destroyRegister" data-content="Remover Registro"><i class="remove icon"></i></a>
                                    <form method="POST" id='destroyRegister_{{$post->id}}' style="display: none;" action="{{ route('posts.destroy',$post->id) }}">
                                        @method("DELETE")
                                        @csrf
                                    </form>
                                    @endif
                                </td>
                            </tr>
                
                            @empty
                            <tr>
                                <td colspan="3" class="p-3">
                                    Não existem registros{{ $_GET ? ' para este filtro' : '' }}.
                                </td>
                            </tr>
                        @endforelse
        
                    </tbody>
        
                </table>
        
            </div>
                
            {{ $posts->links() }}
        </div>
    </div>


</x-layout>