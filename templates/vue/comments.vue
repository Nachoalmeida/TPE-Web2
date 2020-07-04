<section id="app-comments">

    <div v-for="comment in comments" class="alert alert-dark" role="alert">
        <div class="container">
            <div class="row media">

                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-mr-5">
                    <a class="pull-left" href="#">
                        <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg" alt="profile">
                    </a>
                </div>
                
                <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7">
                    
                    
                        <!-- foreach de vue -->
                        <p> 
                            {{ comment.mensaje }} 
                        </p>
                
                    

                    <!--<h4 class="alert-heading ">Well done!</h4>
                    <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                    <hr>-->
                </div>

            </div>
        </div>
    </div>

</section>


