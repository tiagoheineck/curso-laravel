<nav class="navbar navbar-expand-lg navbar-light bg-light container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item {{ (strstr(Route::currentRouteName(),'cidades')) ? 'active' : '' }}">
        <a class="nav-link" href="/cidades">Cidades</a>
        </li>
        <li class="nav-item {{ (strstr(Route::currentRouteName(),'cursos')) ? 'active' : '' }}">
          <a class="nav-link" href="/cursos">Cursos</a>
        </li>
        <li class="nav-item {{ (strstr(Route::currentRouteName(),'departamentos')) ? 'active' : '' }}">
          <a class="nav-link" href="/departamentos">Departamentos</a>
        </li>
        <li class="nav-item {{ (strstr(Route::currentRouteName(),'disciplinas')) ? 'active' : '' }}">
            <a class="nav-link" href="/disciplinas">Disciplinas</a>
        </li>
        <li class="nav-item {{ (strstr(Route::currentRouteName(),'professores')) ? 'active' : '' }}">
            <a class="nav-link" href="/professores">Professores</a>
        </li>
        <li class="nav-item {{ (strstr(Route::currentRouteName(),'conteudos')) ? 'active' : '' }}">
          <a class="nav-link" href="/conteudos">Conteúdos</a>
      </li>
      </ul>
    </div>
  </nav>