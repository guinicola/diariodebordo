<form action="{{$action}}" method="post" class="ui form" enctype="multipart/form-data">
    @csrf

    @isset($title)
        @method("PUT")
    @endisset

    <div class="ui grid">
                      
        <div class="five wide column">
            <div class="field">
                <label for="date">
                    Data:
                    <input required type="date" name="date" id="date" @isset($date) value="{{ $date }}" @endisset>
                </label>
            </div>
        </div>

        <div class="three wide column">
            <div class="field">
                <label for="time_from">
                    Horário de:
                    <input type="time" name="time_from" id="time_from" @isset($timefrom) value="{{ $timefrom }}" @endisset>
                </label>
            </div>
        </div>
        <div class="three wide column">
            <div class="field">
                <label for="time_to">
                    Horário até:
                    <input type="time" name="time_to" id="time_to" @isset($timeto) value="{{ $timeto }}" @endisset>
                   
                </label>
            </div>
        </div>


        <div class="four wide column">
            <div class="field">
                <label for="class">
                    Sala:
                    <input placeholder="Ex: 6A" type="text" maxlength="2" name="class" id="class" @isset($class) value="{{ $class }}" @endisset>
                </label>
            </div>
        </div>

            


        <div class="sixteen wide column">
        
            <label for="fruit"><b>Selecione o dia da semana:</b></label>
            
                <div class="inline equal width fields">
                <div class="field">
                    <label for="ckb_Segunda-feira">
                        <input id="ckb_Segunda-feira" type="radio" name="day" value="Segunda-feira"
                        @isset($day) {{($day=="Segunda-feira") ? "checked" : "" }}  @endisset> 
                        Segunda-feira
                    </label>
                </div>
                <div class="field">
                    <label for="ckb_Terça-feira">
                        <input id="ckb_Terça-feira" type="radio" name="day" value="Terça-feira"
                        @isset($day) {{($day=="Terça-feira") ? "checked" : "" }}  @endisset> 
                        Terça-feira
                    </label>
                </div>
                <div class="field">
                    <label for="ckb_Quarta-feira">
                        <input id="ckb_Quarta-feira" type="radio" name="day" value="Quarta-feira"
                        @isset($day) {{($day=="Quarta-feira") ? "checked" : "" }}  @endisset> 
                        Quarta-feira
                    </label>
                </div>
                <div class="field">
                    <label for="ckb_Quinta-feira">
                        <input id="ckb_Quinta-feira" type="radio" name="day" value="Quinta-feira"
                        @isset($day) {{($day=="Quinta-feira") ? "checked" : "" }}  @endisset> 
                        Quinta-feira
                    </label>
                </div>
                <div class="field">
                    <label for="ckb_Sexta-feira">
                        <input id="ckb_Sexta-feira" type="radio" name="day" value="Sexta-feira"
                        @isset($day) {{($day=="Sexta-feira") ? "checked" : "" }}  @endisset> 
                        Sexta-feira
                    </label>
                </div>
                <div class="field">
                    <label for="ckb_Sábad">
                        <input id="ckb_Sábad" type="radio" name="day" value="Sábado"
                        @isset($day) {{($day=="Sábado") ? "checked" : "" }}  @endisset> 
                        Sábado
                    </label>
                </div>
            </div>
        </div>

        <div class="sixteen wide column">
            <div class="field">
                <label for="title" >
                    Título:
                    <input required type="text" name="title" id="title" @isset($title) value="{{ $title }}" @endisset>

                </label>
            </div>
        </div>
        
        <div class="three wide column">
            <div class="field">
                <label for="quantity_classroom" >
                    Nº de Aulas Previstas:
                    <input type="number" min="1"  @isset($quantity) value="{{ $quantity }}" @else value="1" @endisset name="quantity_classroom" id="quantity_classroom">
                </label>
            </div>
        </div>
        <div class="seven wide column">
            <div class="field">
                <label for="subject" >
                    Objetivo da Aula:
                    <input type="text" name="subject" id="subject" @isset($subject) value="{{ $subject }}" @endisset>
                </label>
            </div>
        </div>
        <div class="six wide column">
            <div class="field">
                <label for="subject" >
                    Objeto do Conhecimento:
                    <input type="text" name="object" id="object" @isset($object) value="{{ $object }}" @endisset>
                </label>
            </div>
        </div>


        <div class="five wide column">
            <div class="field">
                <label for="hability" >
                    Habilidade(s) a ser desenvolvida:
                    <input type="text" name="hability" placeholder="Ex: EF01LP02B" id="hability" @isset($hability) value="{{ $hability }}" @endisset>
                </label>
            </div>
        </div>
        <div class="eleven wide column">
            <div class="field">
                <label for="methodology" >
                    Metodologia Utilizada:
                    <input type="text" name="methodology" id="methodology" @isset($methodology) value="{{ $methodology }}" @endisset>
                </label>
            </div>
        </div>
        
        
        <div class="sixteen wide column">
            <div class="field">
                <label for="activities" >
                    Atividades Propostas:
                    <textarea rows='20' name="activities" id="activities">@isset($activities) {!! $activities !!} @endisset</textarea>
                </label>
            </div>
        </div>
        <div class="sixteen wide column">
            <div class="field">
                <label for="systematization" >
                    Sistematização/Avaliação :
                    <input type="text" name="systematization" id="systematization" @isset($systematization) value="{{ $systematization }}" @endisset>
                </label>
            </div>
        </div>
        


        <div class="sixteen wide column">
            <div class="field">
                <label for="extrainfo">
                    IMPORTANTE: destacar no plano de aula AGRUPAMENTOS PRODUTIVOS (quando usar); <br> ATIVIDADES ADEQUADAS (alunos com deficiência, transtornos ou dificuldades):
                    <textarea type="text" rows="20" name="extrainfo" id="extrainfo"> @isset($extrainfo) {!! $extrainfo !!} @endisset</textarea>
                </label>
            </div>
        </div>
        

        <div class="four wide right floated right aligned column">
            @isset($title)
                <a  href="{{ url()->previous() }}" class="ui red icon button"><i class="reply icon"></i> Cancelar</a>
            @endisset
            <button class="ui {{auth()->user()->color}} icon button"><i class="save outline icon"></i> Salvar Registro</button>
        </div>

    </div>


</form>

    <script src="{{ asset('js/textboxio/textboxio.js') }}" charset="utf-8"></script>
    <script>
    // Create a Textbox.io Editor for the matched element(s)
    textboxio.replace('#activities', {
        ui: {
            locale: 'pt_br', //sets the editor language to br
            toolbar: {
                // groups can be defined inline as part of the toolbar items
                items: [{
                    label: 'Histórico',
                    items: ['undo', 'redo']
                }, {
                    label: 'Formatação',
                    items: ['bold', 'italic', 'underline', 'alignment', 'font-menu', 'superscript', 'subscript', 'indent', 'outdent']
                }, {
                    label: 'Inserir',
                    items: ['blockquote', 'ul', 'ol', 'link', 'hr', 'table', 'fileupload', 'media', 'specialchar']
                }, {
                    label: 'Configurações',
                    items: ['bookmark', 'wordcount', 'usersettings', 'accessibility', 'find', 'fullscreen']
                }]
            }
        },
        css : {
            documentStyles : '* { font-family:sans-serif; }' // a string of CSS
        },
        paste : {
        // Override default paste behavior, removing all inline styles
            style : 'clean'                                     
        },
        codeview: {
            showButton : false	// Hides the code view button, default is true (shown)
        }
    });
    textboxio.replace('#extrainfo', {
        codeview: {
            showButton : false	// Hides the code view button, default is true (shown)
        },
        ui: {
            locale: 'pt_br', //sets the editor language to french
            toolbar: {
                // groups can be defined inline as part of the toolbar items
                items: [{
                    label: 'Histórico',
                    items: ['undo', 'redo']
                }, {
                    label: 'Formatação',
                    items: ['bold', 'italic', 'underline', 'alignment', 'font-menu', 'superscript', 'subscript', 'indent', 'outdent']
                }, {
                    label: 'Inserir',
                    items: ['blockquote', 'ul', 'ol', 'link', 'hr', 'table', 'fileupload', 'media', 'specialchar']
                }, {
                    label: 'Configurações',
                    items: ['bookmark', 'wordcount', 'usersettings', 'accessibility', 'find', 'fullscreen']
                }]
            }
        },
        css : {
            documentStyles : '* { font-family:sans-serif; }' // a string of CSS
        },
        paste : {
        // Override default paste behavior, removing all inline styles
            style : 'clean'                                     
        },
    });
    // link,wordcount,media,hr,specialchar,fileupload,table,undo,redo,styles,language,ltrdir,rtldir,bold,italic,underline,bookmark,strikethrough,superscript,subscript,ul,ol,removeformat,alignment,outdent,indent,blockquote,font-menu,font-face,font-size,font-color,fullscreen,find,accessibility,usersettings
</script>