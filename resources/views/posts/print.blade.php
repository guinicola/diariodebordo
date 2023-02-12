<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= "[".date('d/m/Y', strtotime($post->date))."][{$post->time_from} - {$post->time_to}].pdf";?></title>
    <style>
        p{
            font-family: sans-serif;
            font-size: 11px;
        }
        .activity{
            font-size: 11px;
            font-family: sans-serif;
            border: 1px solid #000;
            border-radius: 5px;
            padding: 5px;
        }
    </style>
</head>
<body>
    
    <p><b>Data: </b>{{date('d/m/Y', strtotime($post->date));}} || <b>Horário: </b>{{$post->time_from}} - {{$post->time_to}}</p>
    <p><b>Ano/Série: </b><br>{{$post->class}}</p>
    <p><b>Nº de Aulas: </b><br>{{$post->quantity_classroom}}</p>

    @if (!empty($post->title))
    <p><b>Título: </b><br>{{$post->title}}</p>
    @endif

    @if (!empty($post->subject))
    <p><b>Objetivo da Aula: </b><br>{{$post->subject}}</p>
    @endif

    @if (!empty($post->object))
    <p><b>Objeto do Conhecimento: </b><br>{{$post->object}}</p>
    @endif

    @if (!empty($post->hability))
    <p><b>Habilidade: </b><br>{{$post->hability}}</p>
    @endif

    @if (!empty($post->methodology))
    <p><b>Metodologia Utilizada: </b><br>{{$post->methodology}}</p>
    @endif

    @if (($post->activities <> '<p><br /></p>'))
    <div><b>Atividades Propostas: </b><br>{!! $post->activities !!}</div>
    @endif

    @if (!empty($post->systematization))
    <p><b>Sistematização/Avaliação: </b><br>{{ $post->systematization }}</p>
    @endif

    @if ( !empty($post->extrainfo) || $post->extrainfo <> "" )
    <div><b>IMPORTANTE: destacar no plano de aula AGRUPAMENTOS PRODUTIVOS (quando usar); ATIVIDADES ADEQUADAS (alunos com deficiência, transtornos ou dificuldades); </b><br>{!!$post->extrainfo!!}</div>
    @endif
</body>
</html>



