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

		a:visited{
		    color: midnightblue;
			background-color: transparent;
			text-decoration: none;
		}

		body{
		font-family: sans-serif;
		}
	</style>
</head>
<body>
    <h1>Tambah Transaksi</h1>
    <?php if (isset($_POST["submit"])) {
        $tanggal = $_POST["date"];
        $nominal = $_POST["nominal"];

        if ($tanggal != "" && $nominal != "") {
            $list_transaksi = [];
            if (isset($_COOKIE["transaksi"])) {
                $transaksi = $_COOKIE["transaksi"];
                $list_transaksi = explode("|", $transaksi);
            }

            $string_transaksi = $tanggal . ":" . $nominal;
            array_push($list_transaksi, $string_transaksi);
            $transaksi = implode("|", $list_transaksi);

            setcookie("transaksi", $transaksi, time() + 3600);
            echo "<p style=\"color: red;\" >Data berhasil ditambah</p>";
        }
    } ?>
    <form method="post" action="tambah.php">
        Tanggal: <input type="date" name="date"> <br> <br>
        Nominal: <input type="number" name="nominal" id=""> <br> <br>
        <input type="submit" name="submit" value="Simpan">
    </form>
    <br>
    <div> <a href="index.php">&laquo; Kembali</a> </div>
</body>
</html>
