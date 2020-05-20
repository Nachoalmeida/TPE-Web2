{include 'header.tpl'}
    <div class="container">
        <form action="logueo" method="post" class="form-signin">
        <h1 class="mt-2">Login</h1>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" name="mail" class="form-control" placeholder="Email address" required="" autofocus="">
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                        {if $mensaje}
                            <div class="alert alert-danger" role="alert">
                                {$mensaje}
                            </div>
                        {/if}
                    </div>
                </div>
            </div>
            <button class="btn btn-lg btn-dark btn-block" type="submit">Entrar</button>
            <a class="btn btn-light mt-3" href="administrador">Volver al panel</a>
        </form>
    </div>
{include 'footer.tpl'}