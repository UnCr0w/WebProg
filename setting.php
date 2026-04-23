<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project WEBPROG</title>
    <style>
        a:link{color:blue;}
        a{text-decoration:none;}
    </style>
</head>
<body>
    <form method="post" action="setting.php">
        <h1>Setting</h1>
        <?php
            // 1. Tentukan nilai default dulu
            $urutan = 'Tanggal';
            $arah = 'Ascending';

            // 2. Jika user menekan tombol submit, pakai data dari $_POST (data terbaru)
            if (isset($_POST['submit'])) {
                $urutan = isset($_POST['urut']) ? $_POST['urut'] : 'Tanggal';
                $arah = isset($_POST['arah']) ? $_POST['arah'] : 'Ascending';
                
                setcookie('set_urut', $urutan, time() + 3600);
                setcookie('set_arah', $arah, time() + 3600);

                echo "<p style='color:red;'>Data berhasil disimpan</p>";
            } 
            // 3. Jika tidak sedang submit, cek apakah ada data di Cookie (user baru datang ke halaman)
            else {
                if (isset($_COOKIE['set_urut'])) {
                    $urutan = $_COOKIE['set_urut'];
                }
                if (isset($_COOKIE['set_arah'])) {
                    $arah = $_COOKIE['set_arah'];
                }
            }
        ?>
        Urut Berdasarkan :
        <input type="radio" name="urut" value="Tanggal" 
        <?php echo ($urutan == 'Tanggal') ? 'checked' : '' ?>>
        Tanggal
        <input type="radio" name="urut" value="Nominal" 
        <?php echo ($urutan == 'Nominal') ? 'checked' : '' ?>>
        Nominal<br><br>

        Arah : 
        <input type="radio" name="arah" value="Ascending" 
        <?php echo ($arah == 'Ascending') ? 'checked' : '' ?>>
        Ascending
        <input type="radio" name="arah" value="Descending" 
        <?php echo ($arah == 'Descending') ? 'checked' : '' ?>>
        Descending<br><br>

        <input type="submit" name="submit" value="Simpan"><br><br>
        
        <div> <a href="index.php">&lt&lt Kembali</a> </div>
    </form>
</body>
</html>