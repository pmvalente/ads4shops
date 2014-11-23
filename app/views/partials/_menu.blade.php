{{--
<nav>
    {{ link_to('principal', 'Principal') }}
    {{ link_to('negocio', 'Negócios') }}
    {{ link_to('acao', 'Ações') }}
    {{ link_to('perfil', 'Perfis') }}
    {{ link_to('anuncio', 'Anúncios') }}
    {{ link_to('utilizador', 'Utilizadores') }}
</nav>--}}

<div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
	{{ link_to('/', 'Autenticação', array('class' => 'navbar-brand')) }}
</div>
<div class="collapse navbar-collapse">
	<ul class="nav navbar-nav">
        {{ link_to('principal', 'Principal') }}
        {{ link_to('negocio', 'Negócios') }}
        {{ link_to('acao', 'Ações') }}
        {{ link_to('perfil', 'Perfis') }}
        {{ link_to('anuncio', 'Anúncios') }}
        {{ link_to('utilizador', 'Utilizadores') }}
	</ul>
	<ul class="nav navbar-nav navbar-right">
        <li></li>
    </ul>
</div>