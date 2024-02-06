<?php
                echo'<h2>Bonjour    '.$_COOKIE['pseudo'].'</h2>';
                    $k=0;
                    if(isset($_POST['valider'])){
                        if(isset($_POST['reponse1'])){
                            if($_POST['reponse1']==1){
                            
                                $k++;
                            }  
                        }
                        if(isset($_POST['reponse2'])){
                            if($_POST['reponse2']==2){
                                
                                $k++;
                            }
                        }
                        if(isset($_POST['reponse3'])){
                            if($_POST['reponse3']==3){
                                $k++;
                            }
                        
                        }
                        
                        $temps=3000;
                        if(isset($_COOKIE['score'])){
                            if($k>$_COOKIE['score'])
                            setcookie("score",$k,time()+$temps);

                        }
                        else{
                            setcookie("score",$k,time()+$temps);

                        }
                    }
        ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qcm DevWeb</title>
</head>
<body>
    <form action="Qcm.php" method="POST">
    <H1 style="margin-left:35%;color:#6495ED;">QCM DEVELOPPEMENT WEB</H1>
    <br>
    <div style="display: flex; flex-direction: column;margin-top: 20px;color:#6495ED;">
            <label for="reponse1" style="margin-right: 160px;">comment annuler les marges de toutes les balises de la pages ?</label> 
            <div style="margin-top:20px;color:black;">
            <input type="radio" name="reponse1" id="reponse1" value="1" >*{margin: 0}
            <br>
            <input type="radio" name="reponse1" id="reponse1" value="2">padding{width: 0;}
            <br>
            <input type="radio" name="reponse1" id="reponse1" value="3">padding{width: 0;}
            <br>
            <input type="radio" name="reponse1" id="reponse1" value="4">padding{width: 0;}
            </div>
    </div><br>
    <div style="display: flex; flex-direction: column;margin-top: 20px;color:#6495ED; ">
            <label for="reponse2" style="margin-right:160px;">comment faire pour qu'une div prenne toute la largeur disponible ?</label> 
            <div style="margin-top:20px;color:black;">
            <input type="radio" name="reponse2" id="reponse2" value="1" >div{width: 100%; padding: 10%;}
            <br>
            <input type="radio" name="reponse2" id="reponse2" value="2">div{min-width: 100%;}
            <br>
            <input type="radio" name="reponse2" id="reponse2" value="3">div{width: 80%; padding: 10%;}
            <br>
            <input type="radio" name="reponse2" id="reponse2" value="4">C'est automatique,pas besoin de specifier une largeur.
            </div>
    </div><br>
    <div style="display: flex; flex-direction: column; margin-top: 20px;color:#6495ED;">
            <label for="reponse3" style="margin-right: 160px;">Quelle est l'orientation par defaut au sein d'un flex container ?</label> 
            <div style="margin-top:20px;color:black;">
            <input type="radio" name="reponse3" id="reponse3" value="1" >diagonale
            <br>
            <input type="radio" name="reponse3" id="reponse3" value="2">verticale
            <br>
            <input type="radio" name="reponse3" id="reponse3" value="3">horizentale
            <br>
            <input type="radio" name="reponse3" id="reponse3" value="4">perpendiculaire
            </div>
    </div><br>
    <input style="margin-left:0px;width:100px;" type="submit" value="valider" name="valider" >
    </form>
    <?php
        // Affichage des scores
        if(isset($_POST['valider'])){
            echo 'Votre score est : ' . $k.'<br>';
            echo 'Votre meilleur score : ' . $_COOKIE['score'] . '<br>';
        }
    ?> 
</body>
</html>