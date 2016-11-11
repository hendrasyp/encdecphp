<?php include 'menu.php'; ?>

<?php
// ENKRIPSI
// DEKLARASI VARIABLE
// 
$key_enc = 1;
$key_dec = 1;

// Kalimat yang akan di encrypt
$phrase_enc = "";
$phrase_dec = "";

// Penampungan Hasil Encrypt 
$result_enc = "";
$result_dec = "";

// counter perulangan
$i = 0;

//variable penampung Nilai Ascii dari setiap karakter
$ascii_value = "";

$mode = "encrypt";

if (isset($_POST["send"])) {
    $mode = $_POST["arah"];
    $phrase_enc = $_POST["phrase_enc"];
    $result_enc = $_POST["result_enc"];
    $key_enc = $_POST["key_enc"];
}
if (isset($_POST["send"])) {
    // $_GET["mode"] = variable kiriman dari URL (http://localhost/index.php?mode=encrypt
    switch ($mode) {
        case "encrypt":
            // tampung kalimat pada form kedalam variable $phrase_enc
            $phrase_enc = $_POST["phrase_enc"];

            // tampung banyak geseran pada form kedalam variable $phrase_enc
            $key_enc = $_POST["key_enc"];

            // proses pemecahan kalimat menjadi karakter single
            // strlen = fungsi menghitung panjang kalimat
            if (strlen($phrase_enc) > 0) {
                for ($i = 0; $i <= strlen($phrase_enc) - 1; $i++) {

                    // perubahan dari karakter single ke nilai ASCII, kemudian ditambahkan dengan banyak geseran
                    $ascii_value[] = ord($phrase_enc[$i]) + $key_enc;
                }

                $result_enc = "";
                for ($i = 0; $i < sizeof($ascii_value); $i++) {
                    // perubahan dari karakter nilai ASCII ke single karakter
                    $result_enc .= chr($ascii_value[$i]);
                }
            } else {
                $phrase_enc = "isi kalimat";
                $result_enc = "isi kalimat";
            }


            break;
        case "decrypt":
            $phrase_dec = $_POST["result_enc"];
            $key_dec = $_POST["key_enc"];
            if (strlen($phrase_dec) > 0) {
                for ($i = 0; $i <= strlen($phrase_dec) - 1; $i++) {
                    $ascii_value[] = ord($phrase_dec[$i]) - $key_dec;
                }
                for ($i = 0; $i < sizeof($ascii_value); $i++) {
                    $result_dec .= chr($ascii_value[$i]);
                }
            } else {
                $phrase_dec = "isi kalimat";
                $result_dec = "isi kalimat";
            }
            break;
    }
    
}

?>

<form action="index.php" method="POST">
    <table>
        <tr>
            <td>Arah</td>
            <td>:</td>
            <td>
                <input type="radio" name="arah" value="encrypt" <?php echo ($mode == "encrypt") ? "checked = 'checked'" : "" ?> /> Enkripsi
                <input type="radio" name="arah" value="decrypt" <?php echo ($mode == "decrypt") ? "checked = 'checked'" : "" ?>/> Dekripsi
            </td>
        </tr>
        <tr>
            <td>Banyak Geseran</td>
            <td>:</td>
            <td><input type="text" name="key_enc" value="<?php echo $key_enc ?>"/></td>
        </tr>
        <tr>
            <td>Kalimat</td>
            <td>:</td>
            <td><input type="text" value="<?php echo $phrase_enc; ?>" name="phrase_enc"/></td>
        </tr>
        <tr>
            <td>Hasil Encrypt</td>
            <td>:</td>
            <td><input type="text" name="result_enc" value="<?php echo $result_enc ?>"/></td>
        </tr>
        <tr>
            <td>Hasil Decrypt</td>
            <td>:</td>
            <td><input type="text" name="result_dec" value="<?php echo $result_dec ?>"/></td>
        </tr>
        <tr>
            <td colspan="3" ><input type="submit" name="send" value="Kirim" /></td>
        </tr>
    </table>
</form>
