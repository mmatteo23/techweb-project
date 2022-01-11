<?php



function redirect($url, $statusCode = 200)
{
   header('location: ' . $url, false, $statusCode);
   die();
}

function buildError(string $msg){
    return "<li class='error'>" . $msg . "</li>";
}

// $idInputFrom è l'id nel campo img del form
function checkImageToUpload(&$img, string $target_dir, string $idInputForm, string $img_name, string $defaultImage){
    $errors = "";
    if(isset($_FILES[$idInputForm]) && $_FILES[$idInputForm]['name']){
        //$profile_img = basename($_FILES["profile_img"]["name"]);
        $target_file = $target_dir . basename($_FILES[$idInputForm]["name"]);
        //$target_file = $target_dir . $_SESSION['username'] . $imageFileType;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $img = $img_name . "." . $imageFileType;
        $uploadOk = 1;

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES[$idInputForm]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $errors = "<li>File is not an image.</li>";
            $uploadOk = 0;
        }

        // Check if file already exists => NO NOI VOGLIAMO IL REPLACE
        /*
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        */

        // Check file size
        if ($_FILES[$idInputForm]["size"] > 3000000) {
            $errors .= "<li>Sorry, your file is too large.</li>";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $errors .= "<li>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</li>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $errors .= "<li>Sorry, your file was not uploaded.</li>";
            // if everything is ok, try to upload file
        } else {
            if (!move_uploaded_file($_FILES[$idInputForm]["tmp_name"], $target_dir . $img)) {
                $errors .= "<li>There was an error during profile image uploading.</li>";
            }
        }
    }
    else{
        $img = $defaultImage;
    }    
    return $errors;
}

?>