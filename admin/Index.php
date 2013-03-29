
<?php
// Déclaration des paramètres de connexion
function Connexion() {
// Déclaration des paramètres de connexion
    $host = 'localhost:8889';$user = 'root';$bdd = 'zemia';$passwd  = 'root';
    //$host = 'mysql51-42.perso';$bdd = 'quadlionbase'; $user = 'quadlionbase';$passwd  = 'ThNsXVT4';
    // Connexion au serveur
    mysql_connect($host, $user,$passwd) or die("erreur de connexion au serveur");

    mysql_select_db($bdd) or die("erreur de connexion a la base de donnees");

}
if(isset($_POST["submit"])){
 Connexion();
$today = date("F j, Y, g:i a");
// Edit upload location here
$destination_path = getcwd() . DIRECTORY_SEPARATOR;

$nomImg = basename($_FILES['image']['name']);
if (@move_uploaded_file($_FILES['image']['tmp_name'], './images/' . $nomImg )) {
    echo 'INSERT INTO actus (date,contenu,titre,image,categorie) VALUES("' . $today . '","' . $_POST["contenu"] . '","' . $_POST["titre"] . '","' .$nomImg . '","' . $_POST["categorie"] . '")';
    mysql_query('INSERT INTO actus (date,contenu,titre,image,categorie) VALUES("' . $today . '","' . $_POST["contenu"] . '","' . $_POST["titre"] . '","' .$nomImg . '","' . $_POST["categorie"] . '")');
   
}

}              

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <link href="css/design.css" media="screen" rel="stylesheet" type="text/css">
    <title></title>
</head>
<body>
    <div id="header">
        <div class="usual">
            <img src="Images/logo_zemia.png" alt="Zemia_logo" id="logo"/>
            <div class="content"><span class="green title">EXPERTISE EN AGRICULTURE ET ECOLOGIE</span><span class="subtitle">Missions de conseils, √©tudes, √©valuations,  animations et formations</span></div>
        </div>

    </div>
    <div id="content">
        <div id="menu">
            <ul>
                <li>Home</li>
                <li>Comp√©tences</li>
                <li>Prestations</li>
                <li>R√©f√©rences client</li>
            </ul>
        </div>
        <div id="infos">
          
            <div class="content grey">
                <h1>Nouvelle actualit√©</h1>
                 <br/><br/>
                <form action="#" method="POST" enctype="multipart/form-data">
                    Titre :  <input type="text" name="titre" value="" size="100" />
                     
                    <br/><br/>
                    Contenu :  <textarea name="contenu" rows="4" cols="100"></textarea>
                     <br/><br/>
                    Cat√©gorie :  <select name="categorie">
                        <option>categorie1</option>
                        <option>categorie2</option>
                        <option>categorie3</option>
                        <option>categorie4</option>
                    </select>
                    <br/><br/>
                    Image : <input type="file" name="image" />
                     <br/><br/>
                    <input type="submit" value="Valider" name="submit" />
                </form>
                
            </div>
        </div>
       
    </div>
    <div id="footer">
        <div class="bandeau usual green">Zemia, la Terre, la Terre de nos ancètres, Terre de nos enfants, Terre √† pr√©server</div>
        <div class="content"></div>
    </div>
</body>
</html>