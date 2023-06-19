  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Biblioteca Laravel</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a class="nav nav-link" href="{{ route('member.index') }}">Socios</a></li>
          <li ><a class="nav nav-link" href="{{ route('author.index') }}">Autores</a></li>
          <li ><a class="nav nav-link" href="{{ route('book.index') }}">Libros</a></li>
          <li ><a class="nav nav-link" href="{{ route('loan.index') }}">Préstamos</a></li>
        </ul>
      </div>
    </div>
  </nav>
