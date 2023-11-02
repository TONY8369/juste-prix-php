<?php
function indications($guess, $start): void
{

    if ($guess > $start) {
        $_SESSION['max'] = $guess;
        // var_dump($_SESSION['max']);
?>
        <p style='color:rgb(255,0,0)'>Votre nombre est superieur à notre prix , veuillez rentré un nombre entre <?= isset($_SESSION['min']) ? $_SESSION['min'] : '0' ?> et <?= isset($_SESSION['max']) ? $_SESSION['max'] : '1000' ?> </p>
    <?php
    } elseif ($guess < $start) {
        $_SESSION['min'] = $guess;
    ?>
        <p style='color:rgb(255,0,0)'>Votre nombre est inferieur à notre prix , veuillez rentré un nombre entre <?= isset($_SESSION['min']) ? $_SESSION['min'] : '0' ?> et <?= isset($_SESSION['max']) ? $_SESSION['max'] : '1000' ?></p>;
    <?php
    } else {
    ?>
        <p style='color:rgb(50,205,50)'>Bravo vous avez gagné !!!!</p>
<?php
    }
    // var_dump($_SESSION['min']);
    // var_dump($_SESSION['max']);
}
?>