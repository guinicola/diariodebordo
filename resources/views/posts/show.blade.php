
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