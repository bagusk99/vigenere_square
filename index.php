<?php
    require_once('Encryption.php');

    $encryption = new Encryption();
    $vigenere_square = $encryption->build_data();

    if (isset($_GET['kata'])) {
        $kata = $_GET['kata'];
        $result = $encryption->encrypt($kata);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vigenere Squere</title>
</head>
<body>
    <h1>Vigenere Squere</h1>

    <?php

    ?>

    <table border="1" cellpadding="3" cellspacing="0">
        <?php
            foreach ($vigenere_square as $data_index => $data_row) {
                echo "<tr>";
                foreach ($vigenere_square[$data_index] as $data_column) {
                    echo "<td>{$data_column}</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>

    <form action="">
        <br>
        <label for="">Kata awal</label>
        <br>
        <input type="text" name="kata" value="<?= $kata ?? '' ?>">
        <button>Enkripsi</button>
    </form>

    <?php
        if (isset($result)) {
            echo "<h3 style='color:green'>{$result}</h3>";
        }
    ?>

</body>
</html>