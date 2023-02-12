<x-layout2 title="Registos de aulas">

    <div class="ui middle aligned center aligned grid">
        <div class="eight wide column">
            <h2 class="ui header">
                <div class="content">
                    Login
                </div>
            </h2>
            <form class="ui large form" autocomplete="off" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="ui left aligned segment">
                   
    
                    <div class="field">
                        <div class="ui left icon @error('email') error @enderror input">
                            <i class="envelope icon"></i>
                            <input id="email" autocomplete="off" required type="email" name="email" placeholder="E-mail">
                        </div>
                    </div>
    
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input autocomplete="off" required  type="password" name="password" placeholder="Senha">
                        </div>
                    </div>

                    <div class="field">
                        <label for="remember">
                            <input {{ old('remember') ? 'checked' : '' }}  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            Lembrar-me
                        </label>
                    </div>

                    <div class="field">
                        <button type="submit" class="ui fluid ty black button">Entrar</button>
                    </div>

                    <div class="field" style="text-align: center;">
                        @if (Route::has('password.request'))
                            <a  href="{{ route('password.request') }}">
                                {{ __('Esqueci minha senha') }}
                            </a>
                        @endif
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

                    @isset($messageSuccess)
                    <div class="ui green message">
                        {{ $messageSuccess }}
                    </div>
                    @endisset
                    
                </div>
    
            </form>
      
        {{--   <div class="ui message">
             <a href="{{ route('register') }}">Registrar usuário</a>
          </div> --}}

        </div>

    </div>
    
</x-layout2>