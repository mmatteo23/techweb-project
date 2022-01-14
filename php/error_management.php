<?php
    function createDBErrorHTML(){
        return "
            <section class='error-display error-text'>
                    <h1 class='error-title'>We're sincerly sorry, gamers</h1>
                    <p>Our servers seem to be down for the moment.</p>
                    <p>Things you can do while waiting for your favorite site to be back up: </p>
                    <ul>
                        <li>Tell us!!! we might have not noticed <a href = 'mailto: support@penta-news.com'>support@penta-news.com</a></li>
                        <li>Refresh the page, it might just be that easy.</li>
                        <li>It could be a great time to learn <a href = 'html/aboutUs.html'>about us</a>!</li>
                        <li>Wait a little, time heals everything.</li>
                    </ul>
                <img id='imgNoDB' src='images/OfflineDatabase.png'/>
            </section>";
    }

    function createEmptyDBErrorHTML($table){
        return "
        <section class='error-display'>
                <h1 class='error-title'>The page seems to be empty</h1>
                <h2>Looks like there are no ".$table." on our site.</h2>
                <p>Things you can do about it: </p>
                <ul>
                    <li>Refresh the page, it might just be that easy.</li>
                    <li>Visit our other pages.</li>
                    <li>Wait a little, time heals everything.</li>
                </ul>
        </section>";
    }

    function accessNotAllowed($not){
        return "
        <section class='error-display'>
            <h1 class='error-title'>You're not a ".$not."!</h1>
            <h2>You don't have access to this part of the website</h2>
            <a href='index.php'>Return to home</a>
        </section>";
    }

    function genericErrorHTML($title, $subtitle, $thingToDo=null){
        $returnHTML = "
        <section class='error-display'>
                <h1 class='error-title'>".$title."</h1>
                <p>".$subtitle."</p>";
        if($thingToDo&&count($thingToDo)>0){
            $returnHTML .= "<p>Things you can do about it: </p><ul>";
            foreach($thingToDo as $thing)
                $returnHTML .= "<li>".$thing."</li>";
            $returnHTML .= "</ul>";
        }
        $returnHTML .= "</section>";
        return $returnHTML;
    }
?>