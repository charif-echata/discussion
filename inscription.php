<html>

<head>
    <title>Inscription</title>
    <meta charset="utf-8">
</head>



<body>
    <main>
        <h1>Inscription</h1>

        <div class="formulaire">
            <div class="carré">
                <form method="POST" action="">

                    <label for="login">Identifiant :</label>
                    <input type="text" placeholder="login" name="login" />

                    <label for="mot de passe">Mot de passe :</label>
                    <input type="password" placeholder="password" name="password" />

                    <label for="confirmation">Confirmer mot de passe :</label>
                    <input type="password" placeholder="confirm" name="confirmpass" />
                    <br>
                    <input type="submit" value="Inscription" name="inscription">
            </div>
            </form>
        </div>

    </main>
</body>

</html>

<?php
session_start();

$connexion = mysqli_connect("localhost","root","","discussion");

if(isset($_POST["inscription"])) 
{

    $login = $_POST["login"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $confirmpass = password_hash($_POST["confirmpass"], PASSWORD_DEFAULT);
    $requete = "SELECT login FROM `utilisateurs` WHERE login = '$login'";
    $query = mysqli_query($connexion, $requete);
    $resultat = mysqli_num_rows($query);
    echo $requete;
    if($resultat == 1)
    { 
        echo'login pris';
    }
    else{ 
        
        $insertusers = "INSERT INTO utilisateurs(login, password) VALUES ($login,$password)"; 
            $execute = mysqli_query($connexion,$insertusers);
            var_dump($execute);
            var_dump($login);

            var_dump($password);
    }
}
    






















?>