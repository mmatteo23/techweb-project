<?php
    function createDBErrorHTML(){
        return "
            <div class='error-display'>
                <div class='error-text'>
                    <h1 class='error-title'>We're sincerly sorry, gamers</h1>
                    <p>Our servers seem to be down for the moment.</p>
                    <p>Things you can do while waiting for your favorite site to be back up: </p>
                    <ul>
                        <li>Tell us!!! we might have not noticed <a href = 'mailto: support@penta-news.com'>support@penta-news.com</a></li>
                        <li>Refresh the page, it might just be that easy.</li>
                        <li>It could be a great time to learn <a href = 'html/aboutUs.html'>about us</a>!</li>
                        <li>Wait a little, time heals everything.</li>
                    </ul>
                </div>
                <img id='imgNoDB' src='images/OfflineDatabase.png'/>
            </div>";
    }

    function createEmptyDBErrorHTML($table){
        return "
        <div class='error-display'>
            <div>
                <h1 class='error-title'>The page seems to be empty</h1>
                <h2>Looks like there are no ".$table." on our site.</h2>
                <p>Things you can do about it: </p>
                <ul>
                    <li>Refresh the page, it might just be that easy.</li>
                    <li>Visit our other pages.</li>
                    <li>Wait a little, time heals everything.</li>
                </ul>
            </div>
        </div>";
    }

    function genericErrorHTML($title, $subtitle, $thingToDo=null){
        $returnHTML = "
        <div class='error-display'>
            <div>
                <h1 class='error-title'>".$title."</h1>
                <h2>".$subtitle."</h2>";
        if($thingToDo&&count($thingToDo)>0){
            $returnHTML .= "<p>Things you can do about it: </p><ul>";
            foreach($thingToDo as $thing)
                $returnHTML .= "<li>".$thing."</li>";
            $returnHTML .= "</ul>";
        }
        $returnHTML .= "</div></div>";
        return $returnHTML;
    }
?>