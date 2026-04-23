<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Project WEBPROG</title>
	<style>
	    a:link {
			color: midnightblue;
			background-color: transparent;
			text-decoration: none;
		}

		a:hover {
            font-weight: bold;
            text-decoration: underline;
		}
	</style>
</head>
<body>
    <h1>Tambah Transaksi</h1>
    <?php
    $notif = "";
    
    if (isset($_POST["submit"])) {
        $tanggal = $_POST["date"];
        $nominal = $_POST["nominal"];
    $list_transaksi = [];
    if (isset($_COOKIE["list_transaksi"])) {
        $list_transaksi = json_decode($_COOKIE["list_transaksi"], true);
    }
    $date_exist = false;
    foreach ($list_transaksi as $key => $value) {
        if ($value['date'] == $tanggal) {
            $list_transaksi[$key]['nominal'] = $nominal;
            $date_exist = true;
            break;
        }
    }

    if (!$date_exist) {
        $list_transaksi[] =[
            "date" => $tanggal,
            "nominal" => $nominal
        ];
    }

    setcookie("list_transaksi", json_encode($list_transaksi), time() + 3600);
    $notif = "Data Berhasil Ditambah";
    }
    if ($notif != ""){
        echo "<p style='color: red ;'>$notif</p>";
    }
    ?>
    <form method="post" action="tambah.php">
        Tanggal: <input type="date" name="date" required> <br> <br>
        Nominal: <input type="number" name="nominal" required> <br> <br>
        <input type="submit" name="submit" value="Simpan">
    </form>
    <br>
    <div> <a href="index.php">&lt&lt Kembali</a> </div>
</body>
</html>
