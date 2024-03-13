<?php
$chiffre1 = '';
$chiffre2 = '';
$symbole = '';
$resultat = '';
$symboles = ["+", "-", "x", "/"];

if (isset($_GET['chiffre1']) && is_numeric($_GET['chiffre1'])) {
    $chiffre1 = ($_GET['chiffre1']);
}

if (isset($_GET['chiffre2']) && is_numeric($_GET['chiffre2'])) {
    $chiffre2 = ($_GET['chiffre2']);
}

if (!empty($_GET['choix']) && in_array($_GET['choix'], $symboles)) {
    $symbole = $_GET['choix'];
}

if (!empty($symbole) && is_numeric($chiffre1) && is_numeric($chiffre2)) {
    switch ($symbole) {
        case '+':
            $resultat = $chiffre1 + $chiffre2;
            break;
        case '-':
            $resultat = $chiffre1 - $chiffre2;
            break;
        case 'x':
            $resultat = $chiffre1 * $chiffre2;
            break;
        case '/':
            if ($chiffre2 == 0) {
                $resultat = 'IMPOSSIBLE';
            } else {
                $resultat = $chiffre1 / $chiffre2;
            }
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice</title>
</head>
<body>
    <form method="GET">
        <input type="number" name="chiffre1" value="<?= $chiffre1 ?>">
        <select name="choix">
            <?php
            foreach ($symboles as $option) {
                echo "<option value=\"$option\" " . ($option == $symbole ? 'selected' : '') . ">$option</option>";
            }
            ?>
        </select>
        <input type="number" name="chiffre2" value="<?= $chiffre2 ?>">
        <input type="submit">
    </form>

    <?php
    if (!empty($symbole) && is_numeric($chiffre1) && is_numeric($chiffre2)) {
        echo "<p>$chiffre1 $symbole $chiffre2 = $resultat</p>";
    }
    ?>
</body>
</html>