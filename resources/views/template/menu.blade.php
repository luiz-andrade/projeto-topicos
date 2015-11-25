<div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar">Menu</span>
        {{--<span class="icon-bar"></span>--}}
        {{--<span class="icon-bar"></span>--}}
    </button>
    <a class="navbar-brand" href="/"></a>
</div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav nav-tabs">
    <li class=" {!! Request::is('propostatcc*') ? 'active': '' !!}"><a href="/propostatcc/">Inicio</a></li>

{{--    {{ dd(Request::path()) }}--}}
    @if(Request::path() === "propostatcc" )

        @if(isset($dados))
            <li class="{!! Request::is('propostatcc/cadastrar*') ? 'active': '' !!}"><a href="/propostatcc/cadastrar">Cadastrar</a></li>
        @endif

    @endif
    <li><a href="#">Contato</a></li>

    @if(Auth::check())
        <li role="presentation" class="navbar-right dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-user"></span> Ola
                {!! Auth::user()->name !!} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="/auth/logout"> Sair</a>
                </li>
            </ul>
        </li>
    @else
        <li>
            <a href="">Olá Visitante</a>
        </li>
        <li>
            <a href="/auth/login"><span class="badge"> Entrar</span></a>
        </li>
    @endif
</ul>
</div>


    {{--<nav class="ZZnavbar navbar-defaultZZ">--}}
    {{--<div class="container-fluid">--}}
        {{--<div class="navbar-header">--}}
            {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">--}}
                {{--<span class="sr-only">Toggle navigation</span>--}}
                {{--<span class="icon-bar">Menu</span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
            {{--</button>--}}
            {{--<a class="navbar-brand" href="/"></a>--}}
        {{--</div>--}}
        {{--<div id="navbar" class="navbar-collapse collapse">--}}
            {{--<ul class="nav navbar-nav">--}}
                {{--<li class=" {!! Request::is('/propostatcc*') ? 'active': '' !!}"><a href="/propostatcc/">Inicio</a></li>--}}

                {{--@if(Request::is('/propostatcc/'))--}}

                    {{--@if(empty($dados))--}}
                        {{--<li class="{!! Request::is('propostatcc/cadastrar*') ? 'active': '' !!}"><a href="/propostatcc/cadastrar">Cadastrar</a></li>--}}
                    {{--@endif--}}

                {{--@endif--}}
                {{--<li><a href="#">Contato</a></li>--}}
                {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li><a href="#">Action</a></li>--}}
                        {{--<li><a href="#">Another action</a></li>--}}
                        {{--<li><a href="#">Something else here</a></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}
                        {{--<li class="dropdown-header">Nav header</li>--}}
                        {{--<li><a href="#">Separated link</a></li>--}}
                        {{--<li><a href="#">One more separated link</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
            {{--</ul>--}}
            {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--@if(Auth::check())--}}
                {{--<li class="disabled"><a href="#">--}}
                        {{--<span class="glyphicon glyphicon-user"></span> Ola--}}
                            {{--{!! Auth::user()->name !!}--}}
                    {{--</a>--}}
                {{--</li class="active">--}}
                {{--<li>--}}
                    {{--<a href="/auth/logout"> Sair</a>--}}
                {{--</li>--}}
                {{--@else--}}
                    {{--<li>--}}
                        {{--<a href="">Olá Visitante</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="/auth/login"><span class="badge"> Entrar</span></a>--}}
                    {{--</li>--}}
                {{--@endif--}}
            {{--</ul>--}}
        {{--</div><!--/.nav-collapse -->--}}
    {{--</div><!--/.container-fluid -->--}}
{{--</nav>--}}