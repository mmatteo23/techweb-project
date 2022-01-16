<?php

function redirect($url, $statusCode = 200)
{
   header('Location: ' . $url, false, $statusCode);
   die();
}

function buildError(string $msg){
    return "<li class='error'>" . $msg . "</li>";
}

// $idInputFrom è l'id nel campo img del form
function checkImageToUpload(&$img, string $target_dir, string $idInputForm, string $img_name, string $defaultImage/*, string $type*/){
    $errors = "";

    if(isset($_FILES[$idInputForm]) && $_FILES[$idInputForm]['name']){

        $target_file = $target_dir . basename($_FILES[$idInputForm]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $img = $img_name . "." . $imageFileType;

        $maxsize    = 2097152;  // about 2 MB
        $acceptable = array(
            'image/jpeg',
            'image/jpg',
            'image/gif',
            'image/png'
        );

        if(($_FILES[$idInputForm]['size'] >= $maxsize) || ($_FILES[$idInputForm]["size"] == 0)) {
            $errors .= '<li>File too large. File must be less than 2 MB.</li>';
        }

        if((!in_array($_FILES[$idInputForm]['type'], $acceptable)) && (!empty($_FILES["uploaded_file"]["type"]))) {
            $errors .= '<li>Invalid file type. Only JPG, GIF and PNG types are accepted.</li>';
        }

        if($errors == "") {
            move_uploaded_file($_FILES[$idInputForm]["tmp_name"], $target_dir . $img);
        }

    } else {
        if ($defaultImage != "")
            $img = $defaultImage;
        else 
            $errors = "Image is required";
    }
    
    return $errors;
    
}

function preventMaliciousCodeArray (array &$userInputs){
    foreach($userInputs as $stringhetta)
        $stringhetta=htmlspecialchars($stringhetta);
}

function preventMaliciousCode (string &$userInput, bool $longText = false) {
    //se è il text controllo che non ci siano tags vietati, se è input normale accetto ma li rendo innocui ("<"  ==>  "&lt;")
    //$allowedTags = [];
    $allowedTags = '';
    if($longText){/*
        //$allowedTags = ['p', 'h2', 'h3', 'h4', 'a', 'strong', 'ul', 'li', 'ol'];
        $allowedTags = '<p><h2><h3><h4><a><strong><ul><li><ol>';
        $filteredString = strip_tags($userInput, $allowedTags);
        //echo "<p>" . $filteredString . "</p>";
        //echo "<p>" . htmlspecialchars($userInput) . "</p>";
        if($filteredString === $userInput)
            return TRUE;
        return FALSE;*/
        $inputPieces = explode('script', $userInput);
        if(count($inputPieces)>0 && strpos($inputPieces[0], '&lt;')!==false && strpos($inputPieces[1], '&gt;')!==false){
            echo ("\n io gli ho dato false fra!");  
            return false;
        }
        return true;
    }
    $userInput = htmlspecialchars($userInput);
}

?>