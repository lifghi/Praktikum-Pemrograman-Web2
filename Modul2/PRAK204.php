<?php
$hasil;
if(isset($_POST["konversi"])) {
    if( $_POST["nilai"] == 0 ) {
        $hasil = "Nol";
    } else if( $_POST["nilai"] > 0 && $_POST["nilai"] < 10 ) {
        $hasil = "Satuan";
    } else if( $_POST["nilai"] == 10 ) {
        $hasil = "Puluhan";
    } else if( $_POST["nilai"] > 10 && $_POST["nilai"] < 20 ) {
        $hasil = "Belasan";
    } else if( $_POST["nilai"] >= 20 && $_POST["nilai"] < 100 ) {
        $hasil = "Puluhan";
    } else if( $_POST["nilai"] >= 100 && $_POST["nilai"] < 1000 ) {
        $hasil = "Ratusan";
    } else {
        $hasil = "Anda Menginput Melebihi Limit Bilangan";
    }
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Soal_4_Modul_2</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                <label for="nilai">Nilai :</label>
                <input type="text" name="nilai" id="nilai">
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="konversi">Konversi</button></td>
            </tr>
        </table>
        <?php if(isset($_POST["konversi"])) : ?>
            <table>
                <h1>Hasil: <?= $hasil; ?></h1>
            </table>
        <?php endif ?>
    </form>
</body>
</html>