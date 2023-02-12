<x-layout title="Editar aula">

    <div class="ui segment">
        <h2 class="">
            Duplicando o Registro [{{date('d/m/Y', strtotime($post->date));}}] [{{$post->time_from}} | {{$post->time_to}}] [{{$post->class}}]
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

        <x-form :action="route('posts.store')" :duplicate="true" :date="$post->date" :timefrom="$post->time_from" :timeto="$post->time_to" :class="$post->class" :day="$post->day" :title="$post->title" :quantity="$post->quantity_classroom" :subject="$post->subject" :object="$post->subject" :hability="$post->hability" :methodology="$post->methodology" :activities="$post->activities" :systematization="$post->systematization" :extrainfo="$post->extrainfo" />
        

    </div>

</x-layout>