<!doctype html>
<html lang="pt_Br">
<head>
    <meta charset="UTF-8">
    <title>{!! $title !!}</title>

    <link rel="stylesheet" href="assets/css/pdf.css" />
    {{--{!! Html::style('/assets/css/bootstrap.css') !!}--}}
</head>
<body>

<span style="font-size: 1.5em;" class="text-center space-50">CURSO DE SISTEMAS DE INFORMAÇÃO</span>

<h3 class="text-center">PROPOSTA DE TRABALHO DE CONCLUSÃO DE CURSO</h3>

{{--{!! dd($proposta->titulo) !!}--}}

<h1 class="text-center space-50">{!! $proposta->titulo !!}</h1>

<p class="text-center space-25"> Por <br />{!! $proposta->nome !!}</p>

<p class="text-center space-50">
    Professor {!! $proposta->orientador !!}
    <br />Orientador
</p>

<span class="text-center footer">{!! $proposta->local !!}, {!! $ano !!}
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
</span>
<span class="text-right footer">
    Página 1
</span>



<p class="next-page">Página 1</p>


<h2 class="text-center space-50">{!! $empresa !!}</h2>

<p class="text-center space-25">{!! $proposta->nome !!}</p>

<h3 class="text-center space-50">PROPOSTA DE TRABALHO DE CONCLUSÃO DE CURSO</h3>

<p style="padding-left: 450px" class="text-right text-justify lead">

    Proposta de trabalho de conclusão
    apresentado ao curso de Sistemas de
    Informação da Universidade de Santa
    Cruz do Sul.
    <br /> <br />
    Orientador(a): {!! $proposta->orientador !!}
</p>


</body>
</html>