{include 'header.tpl'}
    <div class="text-center col-12">
        <form action="logueo" method="post" class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal mt-3">Ingresar:</h1>
            <div class="col-md-4 mb-3 mx-auto">       
                {if $mensaje}
                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="email" name="mail" class="form-control is-invalid" placeholder="Email address">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name="password" class="form-control is-invalid" placeholder="Password">
                    <div class="invalid-feedback">
                        {$mensaje}
                    </div>    
                {else}
                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="email" name="mail" class="form-control" placeholder="Email address">  
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                {/if} 
                <button class="btn btn-lg btn-dark btn-block mt-3" type="submit">Entrar</button>
                <a class="btn btn-light mt-3" href="inicio">Volver al inicio</a>
            </div>
        </form>    
            
    </div>
{include 'footer.tpl'}