<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
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
    <?php if (isset($_COOKIE["list_transaksi"])) {
        echo "<p style=\"color: red;\" >Data berhasil ditambah</p>";
    } ?>
    <form method="post" action="proses-transaksi.php">
        Tanggal: <input type="date" name="date"> <br> <br>
        Nominal: <input type="number" name="nominal" id=""> <br> <br>
        <input type="submit" name="submit" value="Simpan">
    </form>
    <br>
    <div> <a href="index.php">&lt&lt Kembali</a> </div>
</body>
</html>
