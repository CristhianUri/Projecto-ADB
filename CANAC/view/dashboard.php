<?php
# Si no entiendes el código, primero mira a login.php
# Iniciar sesión para usar $_SESSION
//session_start();
# Y ahora leer si NO hay algo llamado usuario en la sesión,
# usando empty (vacío, ¿está vacío?)
# Recomiendo: https://parzibyte.me/blog/2018/08/09/isset-vs-empty-en-php/
//if (empty($_SESSION["email"])) {
    # Lo redireccionamos al formulario de inicio de sesión
  //  header("Location: index.php");
    # Y salimos del script
    //exit();
//}
?>
<?php 
 //  ob_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/estilo.css" rel="stylesheet" />
    <!-- CSS only -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="admin.php">Chatbot</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">

            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="register.php">Crear nuevo administrador</a></li>

                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="../../controllers/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Inicio
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Modificar contenido
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="dash.php">Preguntas no registradas</a>
                                <a class="nav-link" href="contenidochat.php">Editar contenido del chat</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Servicios
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="ingenieros.php">Registrar ingeniero</a>
                                <a class="nav-link" href="servicios.php">Tabla de servicios terminados</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="card mb-4 mt-2">
                        <div class="card-header ">
                            <h6><i class="fas fa-table me-1"></i>Tabla de Preguntas y respuestas por agregar
                            </h6>
                            <div class="d-flex justify-content-between align-items-center">
                            </div>
                            <form action="files.php" method="post" enctype="multipart/form-data" id="formFiles" >
                               
                                <div class="col-md-6  ">
                                    <div class="col-md-6">
                                        <input class="form-control" type="file" name="alumnoFile">
                                        <button type="button" onclick="subirArchivo()" class=" btn btn-primary form-control ">Cargar
                                            Archivo</button>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid col-md-12 ">

                                <table id="example"
                                    class="shadow-lg  col-md-8 col-sm-4 display ml-5 table table-bordered border-dark">
                                    <thead class="">

                                        <tr>
                                            <th>ID</th>
                                            <th>Respuesta no registrada</th>
                                            <th>Pregunta no registrada</th>
                                            <th>Actualizar</th>
                                            <th>Eliminar</th>


                                        </tr>
                                    </thead>
                                    <tbody id="mitabla">
                                        <div>
                                            <h1>Hola</h1>
                                        </div>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Respuesta no registrada</th>
                                            <th>Pregunta no registrada</th>
                                            <th>Accion</th>
                                            <th>Eliminar</th>

                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">

                        <div>

                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../js/scripts.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
<!-- <script src="../js/datatables-simple-demo.js"></script> -->
    <!-- <script>
    function tiemporeal() {
        var tabla = $.ajax({
            url: '../../infochat/noresponse.php',
            dataType: 'text',

            async: false,
        }).responseText;
        document.getElementById('mitabla').innerHTML = tabla;
    }
    setInterval(tiemporeal, 1000);
    </script> -->
   <!--  <script type="text/javascript">
        function ()
        {
            var form = new FormData($('#formFiles')[0]);
            $.ajax({
                url: "../controllers/importar.php",
                type: "post",
                data: form,
                processData: false,
                contentType: false,
                success: function(data){
                    alert('Archivo registrado');
                }
            })
        }
    </script> -->
    <script>
function subirArchivo() {
    // Obtén el formulario y el archivo seleccionado
    var formData = new FormData(document.getElementById('formFiles'));

    // Crea una instancia de XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configura la solicitud POST al script PHP que procesará el archivo
    xhr.open('POST', '../controllers/importar.php', true);

    // Define el evento onload que se ejecutará cuando la solicitud se complete
    xhr.onload = function() {
        if (xhr.status === 200) {
            // La solicitud fue exitosa, muestra la respuesta del servidor (mensaje de éxito o error)
            alert(xhr.responseText);
        } else {
            // Hubo un error en la solicitud
            alert('Error al subir el archivo.');
        }
    };

    // Envía la solicitud con los datos del formulario (incluyendo el archivo)
    xhr.send(formData);
}
</script>
</body>

</html>
<?php 
//$html = ob_get_clean();
 /// libreria Dompdf 2.0.3 necesaria para convertir
 // codigo html a pdf
//require_once '../libreria/dompdf/autoload.inc.php';
//use Dompdf\Dompdf;
//$dompdf = new Dompdf();
//$options = $dompdf ->getOptions();
//$options -> set(array('isRemoteEnabled'=> true));
//$dompdf -> setOptions($options); 
//$dompdf ->loadhtml($html);
//$dompdf->setPaper('A4','portrait');
//$dompdf ->setPaper('A4','landscape');
// Convierte el HTML en un PDF
//$dompdf ->render();
// Mediante esta linea de codigo especificamos si queremos 
//imprimir automaticamente el PDF o no
// Para imprimirlo de forma auntomatica es necesario cambiar 
//el false a true 
//$dompdf ->stream("archivo_.pdf",array("Attachment"=> false));
//echo $dompdf->output();
?>