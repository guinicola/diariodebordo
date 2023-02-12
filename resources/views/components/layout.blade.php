<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="theme-color" media="(prefers-color-scheme: light)" content="{{Auth::check() ? auth()->user()->color : "black"}}">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="{{Auth::check() ? auth()->user()->color : "black"}}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>{{ $title ? $title : '' }} - {{Auth::check() ? auth()->user()->name : "Convidado"}}</title>

</head>
<body>

    <header id="header">
        <div class="ui top fixed inverted {{Auth::check() ? auth()->user()->color : "black"}} menu">
            <a href="{{ url('/') }}" class="header item">
                <i class="chalkboard teacher icon"></i> {{ Auth::check() ? "Prof. ". auth()->user()->name : "Diário de Bordo do Professor(a)"}}
            </a>
            <div class="right menu">
                @if (Auth::check())
                <a href="{{ route('posts.create') }}" class="item">
                    <i class="plus icon"></i> Incluir Registro
                </a>
                @endif
                <a href="{{ route('posts.index') }}" class="item">
                    <i class="list icon"></i> Listar Registros
                </a>
                @if (Auth::check())
                <a href="#" class="item popupIt" data-content="Em desenvolvimento">
                    <i class="file alternate outline icon"></i> Relatório 
                </a>
                <a href="#" class="item popupIt" data-content="Configurações (Em desenvolvimento)">
                    <i class="cog icon"></i> 
                </a>
                @endif

                @if (Auth::check())
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="item popupIt" data-content="Sair">
                    <i class="sign out icon"></i> 
                </a>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                @else
                <a href="{{ route('login') }}" class="item popupIt" data-content="Acessar">
                    <i class="sign in icon"></i> 
                </a>
                @endif
            </div>
        </div>
    </header>

    <main>
        <div class="ui container">
            {{$slot}}
        </div>
    </main>
    
    <div class="ui modal default">
        <i class="close icon"></i>
        <div class="header txtRt">
            <a href="#" target="_blank" class="ui mini black icon button btnPrintRegister"><i class="print icon"></i> Imprimir</a>
        </div>
        <div class="scrolling content"></div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"></script>
    <script>
        $(function(){
            $('.popupIt').popup();
        })

        function viewRegister(id,title){
            var url = '{{ route("posts.show", ":id") }}';
            url = url.replace(':id', id);
            $.ajax({
                type: "GET",
                url: url,
                beforeSend: function(){
                    $(".default .content").html("<i class='loading spinner icon'></i>");
                    $(".default").modal("show");
                },
                success: function (response) {
                    $(".default .content").html(response);
                    $(".default .header a").attr("href","/posts/print/"+id);
                }
            });
        }

        $(function(){
            $(".destroyRegister").click(function (e) { 
                e.preventDefault();
            
                let id = $(this).attr("data-id");
                
                console.log('Exclusão do '+id+' solicitada');
                
                $.modal('confirm',{
                    title: 'Desja mesmo excluir o registro '+id +'?',
                    handler: function(choice){
                        if(choice){
                            $("#destroyRegister_"+id).submit()
                        } else {
                            console.log('Exclusão '+id+' cancelada');
                        }
                    }
                });

            });
        })

    </script>

</body>
</html>