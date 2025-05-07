<?php
$resultat = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST['nombre1'];
    $b = $_POST['nombre2'];
    $operation = $_POST['operation'];

    if (!is_numeric($a) || !is_numeric($b)) {
        $resultat = "Veuillez entrer des nombres valides.";
    } else {
        switch ($operation) {
            case "add":
                $resultat = $a + $b;
                break;
            case "sub":
                $resultat = $a - $b;
                break;
            case "mul":
                $resultat = $a * $b;
                break;
            case "div":
                if ($b == 0) {
                    $resultat = "Division par zéro impossible.";
                } else {
                    $resultat = $a / $b;
                }
                break;
            default:
                $resultat = "Opération invalide.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculatrice PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="vh">
<div class="section">
<h1>Calculatrice PHP</h1>
<form method="POST">
    <input type="number" name="nombre1" placeholder=" Veuillez saisir le premier nombre" required>
    <input type="number" name="nombre2" placeholder="Veuillez saisir la deuxième nombre" required>
    <select name="operation" required>
        <option value="add">+</option>
        <option value="sub">-</option>
        <option value="mul">×</option>
        <option value="div">÷</option>
    </select>
    <button type="submit">Calculer</button>
</form>

<?php if ($resultat !== ""): ?>
    <h2>Résultat : <?= htmlspecialchars($resultat) ?></h2>
<?php endif; ?>
</div>
</div>

</body>
</html>
