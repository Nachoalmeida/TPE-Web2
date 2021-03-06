    <nav class="navbar navbar-expand-lg navbar navbar-light  bg-light  mb-3">
            <a class="navbar-brand" href="inicio"><img  class="logo" src="images/icono/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="inicio">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown mr-5">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Marcas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            {foreach $marcas item= marca}
                                <a class="dropdown-item {if $marca->nombre_marca==Nissan}active {/if}" href="marca/{$marca->nombre_marca}">{$marca->nombre_marca}</a>
                            {/foreach}
                            {if $Admin}
                                <a class="dropdown-item" href="nueva_marca">Crear Marca..</a>
                            {/if}
                        </div>
                    </li
                    {if $logueo}
                    <li class="nav-item active">
                        <a class="nav-link" href="salir">Salir <span class="sr-only"></span></a>
                        <a class="nav-link" href="administrador">Administrador <span class="sr-only"></span></a>
                    </li>
                    {else}
                    <li class="nav-item active">
                        <a class="nav-link" href="ingresar">Ingresar <span class="sr-only"></span></a>
                        <a class="nav-link" href="registrarse">Registrarse <span class="sr-only"></span></a>
                    </li>
                    {/if}
                </ul>
            </div>
    </nav>

        