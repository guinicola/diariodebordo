<x-layout2 title="Registos de aulas">

    
<div class="ui middle aligned center aligned grid">
    <div class="eight wide column">
        <h2 class="ui header">
            <div class="content">
                Criar um novo usuário
            </div>
        </h2>
        <form class="ui large form" autocomplete="off" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="ui segment">
               
                <div class="field">
                    <div class="ui left icon @error('name') error @enderror input">
                        <i class="user icon"></i>
                        <input type="text" id="name" name="name" placeholder="Nome completo">
                    </div>
                </div>

                <div class="field">
                        <div class="ui left icon @error('date_of_birth') error @enderror input">
                            <i class="calendar alternate icon"></i>
                            <input id="date_of_birth" autocomplete="off" type="text" onfocus="(this.type='date')"  name="date_of_birth" placeholder="Data de nascimento">
                        </div>
                </div>

                <div class="field">
                    <div class="ui left icon @error('email') error @enderror input">
                        <i class="envelope icon"></i>
                        <input id="email" autocomplete="off" type="email" name="email" placeholder="E-mail">
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input autocomplete="off"  type="password" name="password" placeholder="Senha">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input autocomplete="off"  type="password" name="password_confirmation" placeholder="Confirme sua senha">
                        </div>
                    </div>
                </div>

                <div class="ui fluid selection dropdown menuTema">
                    <input type="hidden" name="color">
                    <i class="dropdown icon"></i>
                    <div class="default text"><i class="palette icon"></i> Selecione o tema</div>
                    <div class="menu">
                        <div class="item" data-value="red"><i class="red circle icon"></i >Vermelho</div>
                        <div class="item" data-value="orange"><i class="orange circle icon"></i >Laranja</div>
                        <div class="item" data-value="yellow"><i class="yellow circle icon"></i >Amarelo</div>
                        <div class="item" data-value="olive"><i class="olive circle icon"></i >Oliva</div>
                        <div class="item" data-value="green"><i class="green circle icon"></i >Verde</div>
                        <div class="item" data-value="teal"><i class="teal circle icon"></i >Verde Água</div>
                        <div class="item" data-value="blue"><i class="blue circle icon"></i >Azul</div>
                        <div class="item" data-value="violet"><i class="violet circle icon"></i >Violeta</div>
                        <div class="item" data-value="purple"><i class="purple circle icon"></i >Roxo</div>
                        <div class="item" data-value="pink"><i class="pink circle icon"></i >Pink</div>
                        <div class="item" data-value="brown"><i class="brown circle icon"></i >Marrom</div>
                        <div class="item" data-value="grey"><i class="grey circle icon"></i >Cinza</div>
                        <div class="item" data-value="black"><i class="black circle icon"></i >Preto</div>
                    </div>
                </div>
                <br>

                <div class="field">
                    <button type="submit" class="ui fluid ty black button">Cadastrar</button>
                </div>

                @error('password')
                    <div class="ui red mini message">
                        {{ $message }}
                    </div>
                @enderror
                @error('email')
                    <div class="ui red mini message">
                        {{ $message }}
                    </div>
                @enderror

            </div>


        </form>
  
      <div class="ui message">
        Já tem cadastro? <a href="{{ route('login') }}">Entrar</a>
      </div>
    </div>
  </div>


</x-layout2>