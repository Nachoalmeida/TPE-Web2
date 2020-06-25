{include 'header.tpl'}
    <div class="text-center col-12">
        <form action="nuevo_usuario" method="post" class="form-signin" enctype="multipart/form-data">
            <h1 class="h3 mb-3 font-weight-normal mt-3">Registrarse:</h1>
            <div class="col-md-4 mb-3 mx-auto">  
                <label>Nombre de ususario:</label>
                <input name="user_name" type="text" class="form-control {if $mensaje_usuario}is-invalid{/if}" placeholder="User Name" required>  
                {if $mensaje_usuario}
                <div class="invalid-feedback">
                    {$mensaje_usuario}
                </div>  
                {/if}
                <label>Email:</label>                  
                <label for="inputEmail" class="sr-only">Email</label>
                <input type="email" name="mail" class="form-control {if $mensaje_mail}is-invalid{/if}" placeholder="Email address" required>  
                {if $mensaje_mail}
                <div class="invalid-feedback">
                    {$mensaje_mail}
                </div>  
                {/if}
                <label>Contraseña:</label>     
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <label for="exampleFormControlFile1">Foto de perfil (opcional)</label>
                <input type="file" name="input_name" id="imageToUpload">
                <button class="btn btn-lg btn-dark btn-block mt-3" type="submit">Registrarme</button>
                <a class="btn btn-light mt-3" href="inicio">Volver al inicio</a>
            </div>
        </form>    
            
    </div>
{include 'footer.tpl'}