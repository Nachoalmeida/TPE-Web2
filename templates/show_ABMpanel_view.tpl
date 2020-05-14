{include 'header.tpl'}

    
    <ul class="list-group">
        {foreach $autos item= auto}
            <form action="eliminar_publicacion" method="post">
                <li class="list-group-item list-group-item-dark">
                    <a class="btn btn-dark" href="">Editar</a>
                    <button name="id_auto" type="submit" class="btn btn-danger" value= "{$auto->id_auto}">Eliminar</button>
                    {$auto->titulo}
                </li>   
            </form> 
        {/foreach}
    </ul>
    <div>
        <a class="btn btn-dark" href="nueva_publicacion">Subir publicacion</a>
    </div>

{include 'footer.tpl'}