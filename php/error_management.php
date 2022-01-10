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
?>