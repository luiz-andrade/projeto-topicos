new Vue({
    el: '#vue',

    data: {
        cep:'',
        endereco: {},
        naoLocalizado: false
    },

    //created - excuta ao iniciar a pagina
    attached: function()
    {
        jQuery(this.$$.cep).mask('00000-000');
    },

    methods: {
        buscar: function (){

            var self = this;

            self.endereco= {};
            naoLocalizado= false;

            if(/^[0-9]{5}-[0-9]{3}$/.test(this.cep))
            {
                jQuery.getJSON('http://viacep.com.br/ws/'+this.cep+'/json/', function(endereco)
                {
                    if(endereco.erro)
                    {
                        jQuery(self.$$.logradouro).focus();
                        self.naoLocalizado= true;
                        return;
                    }
                    naoLocalizado= false;
                    self.endereco = endereco;
                    jQuery(self.$$.numero).focus();
                });
            }
        }
    }
});

jQuery(function () {
    $(".formatarTelefone").mask("9999-9999");
    $(".formatarCpf").mask("999.999.999-99");
    $(".formatarCep").mask("99999-999");
    $(".formatarData").mask("99/99/9999");
    $(".formatarCarteirinha").mask("9999999999999999");
});// colocar class= formatar???

//=========================================================================
$(function(){ //Função usada no botão pesquisar
    $('#submitPesquisar').click(function(){
        if(document.getElementById("inputPesquisar").value.length > 3){//verifica se o input está preenchido
            var btn = $(this);
            btn.button('loading');
            /*setTimeout(function () {
             btn.button('reset')
             }, 300)*/
        }
        else{
            document.getElementById("pesquisar").focus();
            return false
        }
    });
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

//=========================================================================
$('div.alertflash').delay(3000).slideUp(300);

//=========================================================================
$('#flash-overlay-modal').modal();

//=========================================================================
/*
function xmlhttp()  {
  if (window.XMLHttpRequest)
    {return new XMLHttpRequest();       }
  var versao = ['Microsoft.XMLHttp', 'Msxml2.XMLHttp', 'Msxml2.XMLHttp.6.0', 'Msxml2.XMLHttp.5.0', 'Msxml2.XMLHttp.4.0', 'Msxml2.XMLHttp.3.0','Msxml2.DOMDocument.3.0'];
  for (var i = 0; i < versao.length; i++)
    { try
     {return new ActiveXObject(versao[i]);}
     catch(e)
     {alert("Seu navegador nao possui recursos para o uso do AJAX!");}
   }
   return null;
 }
*/
//=========================================================================
function carregaBeneficiario() {

    var search  = $("#busca_beneficiario").val();
    var resposta= $('#resultado_beneficiario');

    if(search.length >= 16) {

        resposta.val('Aguarde pesquisando...');

        $.ajax({
            url: "/beneficiario/busca?busca_beneficiario=" + search
        }).done(function(data){

            if(data == ''){
                resposta.css('color', 'red');
                resposta.val('Código inválido');
                search.focus()
            }else {
                resposta.css('color', 'black');
                resposta.val(data[0]['nomeusua']);
            }
        });
    }
    else{
        resposta.val('O Código deve ter no mínimo 16 digitos');
        search.focus();
    }
}
//=========================================================================
function carregaUnimed(el) {
          //url: "/unimed/busca?busca_unimed=" + search
    var search = $('#' + el).val(),
        resposta = $('#' + el + '_resposta');

    if(search.length >= 3 ) {

        resposta.val('Aguarde pesquisando...');

        $.ajax({
            url: "/unimed/busca?busca_unimed=" + search
        }).done(function(data){

            if(data == ''){
                resposta.css('color', 'red');
                resposta.val('Código não localizado');
            }else{
                resposta.css('color', 'black');
                resposta.val(data[0]['cnomepres']);
            }
        }).fail(function () {
            resposta.val("Falha na conexão");
        });
    }
    else{
        resposta.val('O código de ter no mínimo 3 digitos');
        resposta.css('color', 'red');
        //document.getElementById('error').style.display = 'block';
    }
}
//=========================================================================
function carregaMedico() {
    var search   = $("#busca_med_solic").val();
    var resposta = $("#resultado_med_solic");

  if(search.length >= 3) {

      resposta.val('Aguarde pesquisando...');

      $.ajax({
          url: "/medico/busca?busca_med_solic=" + search
      }).done(function(data){

          console.log(data);
          if(data == ''){
              resposta.val('Código inválido');
          }else {
              resposta.css('color', 'black');
              resposta.val(data[0]['cnomepres']);
          }
      });
  }
  else{
      resposta.css('color', 'red');
      resposta.val('O código de ter no mínimo 3 digitos');
  }
}
//=========================================================================
function carregaProcedimento(el) {
    var search = $('#' + el).val(),
        resposta = $('#' + el + '_resposta');

    if(search.length == 8 ) {

        resposta.val('Aguarde pesquisando...');

        $.ajax({
            url: "/procedimento/busca?busca_procedimento=" + search
        }).done(function(data){

            if(data.value == null){
                resposta.val('Código não localizado');
            }
            resposta.css('color', 'black');
            resposta.val(data[0]['cnomepmed']);
      });
  }
    else{
        console.log(resposta);
        resposta.val('O código de ter 8 digitos');
        resposta.css('color', 'red');
      //document.getElementById('error').style.display = 'block';
  }
}
//=========================================================================
function calcular(qtd, valor) {

    var qtd1 = $('#' + qtd).val(),
        valor1 = $('#' + valor).val(),
        total = parseFloat(qtd1) * parseFloat(valor1),
        resposta = $('#' + valor + '_total');

        resposta.val(total.toFixed(2));
}
//=========================================================================
function calcularTotal() {

    $(function(){
        var soma = 0;
        $('.subtotal').each(function(){
            var valor= $(this).val();
            soma += Number(valor);

        });

        $("#calculartotal").val(soma.toFixed(2));
    });
}