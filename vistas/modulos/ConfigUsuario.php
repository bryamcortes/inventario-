<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Configuracion de Perfil
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Configuracion de Perfil</li>
    
    </ol>

  </section>

  <section class="content">

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th>Nombre</th>
           <th>Usuario</th>
           <th>Foto</th>
           <th>Perfil</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php
         
          echo ' <tr>
                  <td>'.$_SESSION["nombre"].'</td>
                  <td>'.$_SESSION["usuario"].'</td>';

                  if($_SESSION["foto"] != ""){

                    echo '<td><img src="'.$_SESSION["foto"].'" class="img-thumbnail" width="40px"></td>';

                  }else{

                    echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                  }

                  echo '<td>'.$_SESSION["perfil"].'</td>';       

                  echo '<td>

                  <div class="btn-group">

                  <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$_SESSION["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                  </div>  

                </td>

                </tr>';

        ?> 

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>



<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>

              </div>

            </div>

            <!-- BOTON PARA VER CONTRASEÑA -->
            <script type="text/javascript">
            
            function mostrarPassword(){
              var cambio = document.getElementById("txtPassword");
              
		          if(cambio.type == "password"){
			        cambio.type = "text";
			          $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		          }else{
			        cambio.type = "password";
			        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		          }
          	}

            function mostrarPassword2(){
              var cambio = document.getElementById("txtPassword2");
              
		          if(cambio.type == "password"){
			        cambio.type = "text";
			          $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		          }else{
			        cambio.type = "password";
			        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		          }
          	}  
	
	          $(document).ready(function () {
	          //CheckBox mostrar contraseña
	            $('#ShowPassword').click(function () {
		            $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
          	  });
            });
            </script>
            
            <!-- ENTRADA PARA LA CONTRASEÑA ACTUAL -->

                <div class="row">
                  <div class="col-md-10">

                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                        <input ID="txtPassword" type="password" class="form-control input-lg" name="actualPassword" placeholder="Escriba su contraseña actual">

                      <div class="input-group-append">

                        <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>

                        

                      </div>

                    </div>

                  </div>

                </div>

            <!-- ENTRADA PARA LA NUEVA CONTRASEÑA -->

            <div class="row">
                  <div class="col-md-10">

                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                        <input ID="txtPassword2" type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">
                        <span id="passstrength"style="color: red"></span>
                        <input type="hidden" id="passwordActual" name="passwordActual">

                      <div class="input-group-append">

                        <button id="show_password2" class="btn btn-primary" type="button" onclick="mostrarPassword2()"> <span class="fa fa-eye-slash icon"></span> </button>

                        

                      </div>

                    </div>

                  </div>

                </div>

             <script>

                // MEDIDOR DE CONTRASEÑA
               
                $('#txtPassword2').keyup(function(e) {
                  var strongRegex = new RegExp("^(?=.{14,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");

                  var mediumRegex = new RegExp("^(?=.{12,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");

                  var enoughRegex = new RegExp("(?=.{8,}).*", "g");

                  if (false == enoughRegex.test($(this).val())) {

                    $('#passstrength').html('Más caracteres.');

                  } else if (strongRegex.test($(this).val())) {

                    $('#passstrength').className = 'ok';

                    $('#passstrength').html('Fuerte!');
                    $('#passstrength').html
                    

                  } else if (mediumRegex.test($(this).val())) {

                    $('#passstrength').className = 'alert';

                    $('#passstrength').html('Media!');

                  } else {

                    $('#passstrength').className = 'error';

                    $('#passstrength').html('Débil!');

                  }

                  return true;

                });

             </script>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizarEditar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar usuario</button>

        </div>

     <?php

          $editarUsuario2 = new ControladorUsuarios();
          $editarUsuario2 -> ctrEditarUsuario2();

        ?> 

      </form>

    </div>

  </div>

</div>