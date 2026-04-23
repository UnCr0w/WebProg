<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
    <?php if (isset($_POST["submit"])) {
        $tanggal = $_POST["date"];
        $nominal = $_POST["nominal"];

        if (isset($_COOKIE["list_transaksi"])) {
            $list_transaksi = json_decode($_COOKIE["list_transaksi"], true);
        } else {
            $list_transaksi = [];
        }

        $list_transaksi[] = [
            "date" => $tanggal,
            "nominal" => $nominal,
        ];

        $json_encode = json_encode($list_transaksi);
        setcookie("list_transaksi", $json_encode, time() + 3600);
        header("Location: tambah.php");
        exit();
    } ?>
</body>
</html>
