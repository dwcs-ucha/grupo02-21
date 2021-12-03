<?php
/*
 * Author: Jorge Carreño Miranda
 * Version:1.0.0
 * Last modified: 02/12/2021
 */
//HACER COMO LA GESTIÓN DE USUARIOS PERO CON ENTRADAS(DOCUMENTOS);
include './Class/ClassPublicacion.php';
include './Class/ClassDAO.php';

$DAO = new DAO();
$datosCorrectos=true;
$datos=array();
?>
<html>
<head>
<meta charset="utf-8">
<link type="text/css" href="ckeditor/sample/css/sample.css" rel="stylesheet" media="screen" />
<title>Indice</title>
</head>
<body><br>
    
    <?php
    $titulo="";//hay q pasarle validacion de solo letras
    $cuerpo="";
    $errorTitulo="";
    $errorCuerpo="";
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="formulario" id="formulario">
        <div class="centered">
            <h1>Titulo</h1><br>
            <?php echo validaTitulo();?>
            <input type="text" name="titulo" maxlength="150" value="<?php echo $titulo;?>" size="107">
            <?php echo $errorTitulo;?><br></br>
            <?php validaCuerpo(); ?>
        <textarea name="cuerpo" id="editor"><?php echo $cuerpo;?></textarea>
            <?php echo $errorCuerpo;?>
                <input type="submit" value="publicar" name="enviar" />
                <input type="submit" value="borrar todo" name="borrar"/><br></br>
        </div>
    </form>
    <script src="ckeditor/ckeditor.js"></script>
<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			 //toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>

<?php
$publicaciones="./CSV/articulos.csv";
$articulos=$DAO->obtenerArticulo($publicaciones);

if(isset($_POST['enviar'])&& $datosCorrectos){
    $nuevo= new Publicacion($titulo,$cuerpo);
    $articulos[]=$nuevo;
    $DAO->escribirArticulo($publicaciones,$articulos);
}

function validaTitulo(){
    global $titulo;
    global $errorTitulo;
    global $datosCorrectos;
    if(isset($_POST['enviar']) && empty($_POST['titulo'])){
        $errorTitulo="<p style='color:red;'>El campo título es obligatorio</p>";  
        $datosCorrectos=false;
    }
    elseif(isset($_POST['enviar'])&& isset($_POST['titulo'])){
        if(preg_match("/[^\D]/", $_POST['titulo'])){
        $errorTitulo="<p style='color:red;'>El campo título solo admite letras</p>";     
        $datosCorrectos=false;
        }
        else{
        $titulo=$_POST['titulo'];     
    }
}
}

function validaCuerpo(){
    global $cuerpo;
    global $errorCuerpo;
    global $datosCorrectos;
        if (isset($_POST['enviar']) && isset($_POST['cuerpo'])){
            $cuerpo=$_POST['cuerpo'];
        }
        else {$errorCuerpo="<p style='color:red;'>El campo es obligatorio</p>";  
        $datosCorrectos=false;
}}

if(isset($_POST['borrar'])){
    $titulo="";
    $cuerpo="";
}
if(isset($_POST['eliminar'])){
    var_dump($articulos);
    $articulos->eliminarArticulo($titulo,$cuerpo);
}
?>
<table border="1" >
	<tr>
		<th>Titulo</th>
		<th>Cuerpo </th>
                <th>Operación</th>
             
        </tr>
        <?php
$contFila=0;
foreach ($articulos as $novas){
	?>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="formulario" id="formulario">
	<tr>
            <td><?php echo $novas->getTitulo() ?></td>
            <td><?php echo $novas->getCuerpo() ?></td>
            <td>Que quieres hacer?<input type="submit" name="eliminar" value="eliminar"><input type="submit" name="editar" value="editar"></td>
        </tr>
       
        <?php
        $contFila++;
	}
        ?>
 </table>
</body>
    </html>