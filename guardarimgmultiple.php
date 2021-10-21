<?php 
 
    $imagenes = 'imgusers/';
    if (!file_exists($imagenes)) 
    {
       mkdir($imagenes, 0777, true);
    }
   
    foreach($_FILES["archivos"]['tmp_name'] as $key => $tmp_name) 
    {
        if($_FILES["archivos"]["name"][$key])
        {
            $nombre_img = $_FILES["archivos"]["name"][$key];
            $tamano_img = $_FILES["archivos"]["size"][$key];
            $nombretmp_img = $_FILES['archivos']["tmp_name"][$key];
        }
            $carpeta = opendir($imagenes);
            $carpetadestino = $imagenes.'/'.$nombre_img;

            $archivoduplicado = "imgusers/$nombre_img";
        
            if(($tamano_img <= 200000) || ($archivoduplicado != $nombre_img))
            {
                if (move_uploaded_file($nombretmp_img, $carpetadestino))
                {
                    echo " <p>Imagen $nombre_img cargada </p> " ;
                }
                else
                {
                    echo " <p>* ERROR con la imagen: $nombre_img * </p>";
                }
            }
            else
            {
                echo "La imagen excede el tamaño de 200kb ( $tamano_img )";
            } 
        
    }
    
?> 