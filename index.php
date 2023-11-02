<?php
require('./components/header.php');

// récupère la première valeur de l'input démarer pour générer un nombre aléatoire
if (isset($_POST['start'])) {
    function start()
    {
        $rand = rand(0, 1000);
        return $rand;
    }
    $_SESSION['start'] = start();
}

// on récupère la valeur de l'input type array pour stocker les tentatives de l'utilisateur dans un tableau
if (isset($_POST['number']) && !empty($_POST['number'])) {
    $_SESSION['number'][] = $_POST['number'];
    $tentative = $_SESSION['number'];
    // var_dump($tentative);
    $_SESSION['guess'] = end($tentative);
    // var_dump($_SESSION['guess']);
}


// on détruit les différents session avec l'input reset 
if (isset($_POST['reset'])) {
    session_unset();
}


if (isset($_SESSION['start']) && !empty($_POST['start'])) {
    echo '<pre>';
    // var_dump($_SESSION['start']);
    echo '</pre>';
}

echo '<pre>';
// var_dump($_SESSION['start']);
echo '</pre>';


?>


<div class=" m-auto mt-4">
    <p class="text-center">Bienvenue au juste prix le but du jeux et de deviner un nombre qui représentera le juste prix </p>
</div>
<div class="text-center m-auto mt-4">
    <p>Pour commencer générer un nombre aléatoire entre 0 et 1000 en cliquant sur le bouton çi dessous</p>
</div>


<div class="text-center m-auto mt-4">
    <p>Ensuite tout se passe dans le formulaire , bon jeux :)</p>
</div>
<div class="mt-4 fs-5">
    <?php if (isset($_SESSION['start']) && isset($_SESSION['guess'])) : ?>
        <?php if ($_SESSION['start']  == $_SESSION['guess']) : ?>
            <p style="color:rgb(30,144,255) ;" class="w-50 m-auto text-center">Le juste prix est : <?= $_SESSION['start'] ?></p>
        <?php elseif ($_SESSION['start']  != $_SESSION['guess']) : ?>
            <p>Dommage , essayé encore !</p>
        <?php endif; ?>
        <div class="mt-4 fs-5">
            Voici vos différentes tentative :
            <?php
            $count = count($tentative);
            // var_dump($count);
            foreach ($tentative as $key => $value) {
                $results[] = $value . " ,";
            }

            // var_dump($results);
            ?>
            <div class='d-flex flex-column'>
                <p>
                    <?= $count ?> tentative<?= $count > 1 ?  's' : '' ?> :
                    <?php
                    foreach ($results as $result) {
                        echo $result;
                    }
                    ?>
                </p>
            </div>
        <?php else : ?>
            <?php if (isset($_SESSION['start']) != 0) : ?>
                <p>C'est partit !</p>
            <?php else : ?>
                <p>Veuillez cliquer sur Démarrer pour débuter !</p>
            <?php endif; ?>
        <?php endif; ?>
        </div>
        <div class="mt-4 fs-5">
            Indications :
            <?php
            require('./functions/function.php');
            if (isset($_SESSION['guess']) && isset($_SESSION['start'])) {
                indications($_SESSION['guess'], $_SESSION['start']);
            }
            ?>
        </div>

        <form action="" method="post" class="mt-4">
            <div class="d-flex flex-wrap justify-content-center">
                <div class="me-4">
                    <?php if (isset($_SESSION['start']) != 0) : ?>
                        <button class="btn btn-secondary" type="submit" name="start" disabled>Démarrer</button>
                    <?php else : ?>
                        <button class="btn btn-primary" type="submit" name="start">Démarrer</button>
                    <?php endif; ?>
                </div>
                <div>
                    <button class="btn btn-danger" type="submit" name="reset">Recommencer</button>
                </div>
            </div>
        </form>

        <form action="index.php" method="post" class="mt-4 d-flex flex-column">
            <label for="number" class="mt-4 text-center">Veuillez rentrer un nombre</label>
            <input type="number" name="number" id="number" class="form-control text-center mt-4 mb-4 w-50 m-auto">
            <div>
                <input type="submit" value="Validez" class="btn btn-primary w-25 float-end mb-4">
            </div>

        </form>


        <?php
        require('./components/footer.php');
        ?>