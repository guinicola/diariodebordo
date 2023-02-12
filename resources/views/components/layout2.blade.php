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

    <title>{{ $title ? $title : '' }}</title>

</head>
<body>

    <header id="header">
        <div class="ui top fixed inverted black menu">
            <a href="{{ url('/') }}" class="header item">
                <i class="chalkboard teacher icon"></i> Diário de Bordo do Professor(a)
            </a>
        </div>
    </header>

    <main>
        <div class="ui container">
            {{$slot}}
        </div>
    </main>
    
    <div class="ui modal default">
        <i class="close icon"></i>
        <div class="header"></div>
        <div class="content"></div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"></script>
    <script>
        $(function(){
            $('.popupIt').popup();
            $('.dropdown').dropdown();
        })

        function viewRegister(id,title){
            var url = '{{ route("posts.show", ":id") }}';
            url = url.replace(':id', id);
            $.ajax({
                type: "GET",
                url: url,
                beforeSend: function(){
                    $(".default").modal("show");
                },
                success: function (response) {
                    $(".default .content").html(response);
                }
            });
        }


    </script>

</body>
</html>