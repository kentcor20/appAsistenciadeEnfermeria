<?php
    
    include 'conexion_be.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $query = "INSERT INTO usuarios(nombre_completo,correo,usuario,contrasena)
               VALUES('$nombre_completo', '$correo','$usuario', '$contrasena')";
    //verificar que el correo no se repita en la base de datos
    
    $verificar_correo = mysqli_query($conexio, "SELECT * FROM usuarios WHERE correo='$correo' ");

    if(mysqli_num_rows($verificar_correo) > 0 ){
       echo'
          <script>
                 alert("Este correo ya esta registrado intenta con otro diferente");
                 windows.location = "../iniciar sesion.php";
          </script>';
       ';
    }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
                 alert("Usuario almacenamiento exitosamente");
                 window.location = "../iniciar sesion.php";
            </script>   
        ';
    }else{ 
        echo '
        <script>
             alert("Usuario almacenamiento exitosamente");
             window.location = "../iniciar sesion.php";
        </script>   
    ';
    } 
    mysqli_close($conexion);        
?>







