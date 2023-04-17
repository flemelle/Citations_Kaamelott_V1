<!DOCTYPE html>
<?php
    session_start();
    include('db/PDO.php');
    include ('log.php');
    $reponse = file_get_contents('https://kaamelott.chaudie.re/api/random');
    $tableresponse = json_decode($reponse, true);
    $personnage = $tableresponse['citation']['infos']['personnage'];
    $photot = strtolower($personnage);
    $livre = trim($tableresponse['citation']['infos']['saison'], " ");
    $episodet = trim($tableresponse['citation']['infos']['episode'], " ");
    $episoder = trim($episodet, '"');
    $episode = trim($episoder, ":");
    $photor = str_replace("'", "", $photot);
    $photo = str_replace("ê", "e", $photor);
    $livrelow = strtolower($livre);
    $livrere = str_replace(" ", "_", $livrelow);
    $headers = get_headers('https://www.korra.dev/citation_kaamelott/img/background/kaamelott_'.$livrere.'.jpeg', 1);
    if (strpos($headers['Content-Type'], 'image/') !== false) {
    } else {
        $livrere = 'default';
    }
    echo("
        <html>
            <head>
                <meta charset = \"utf-8\" />
                <title>Citations Kaamelott</title>
                <link rel = 'stylesheet' href = 'style/style.css'/>
                <link rel=\"icon\" href=\"img/icone/favicon.gif\" type=\"image/gif\">
            </head>
            <body style = \"background-image: url('img/background/kaamelott_".$livrere.".jpeg');\">
                <section>
                    <div id = 'up'>
                        <div id ='image' style =\"background-image: url('img/personnages/".$photo.".jpg');\">
                        </div>
                        <div id ='citation'>
                            ".$tableresponse['citation']['citation']."
                        </div>
                    </div>
                    <div id = 'info'>
                        <div>".$personnage."</div>
                        <div>".$livre."</div>
                        <div>Episode ".$episode."</div>
                    </div>
                </section>  
                <button onclick = 'reload()'>suivant</button>
                <script src = 'script/script.js' type='text/javascript'></script>        
            </body>
        </html>
    ");