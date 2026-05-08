<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Project WEBPROG</title>
        <style>
        body{
            font-family: sans-serif;
        }
            a:link {
                color: blue;
                background-color: transparent;
                text-decoration: none;
            }
            a:hover {
                font-weight: bold;
                text-decoration: underline;
            }
            a:visited{
                color: blue;
                background-color: transparent;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div>
            [<a href="tambah.php">Tambah Transaksi</a>] &nbsp; &nbsp; [<a
                href="setting.php"
                >Setting</a
            >]
        </div>
        <hr />

        <?php if (isset($_COOKIE["transaksi"])) {
            $transaksi = $_COOKIE["transaksi"];
            $list_transaksi = explode("|", $transaksi);
            $list_detail_transaksi = [];

            foreach ($list_transaksi as $value) {
                $detail_transaksi = explode(":", $value);
                $list_detail_transaksi[$detail_transaksi[0]] =
                    $detail_transaksi[1];
            }

            if (isset($_COOKIE["set_urut"]) && isset($_COOKIE["set_arah"])) {
                if ($_COOKIE["set_urut"] == "Tanggal") {
                    if ($_COOKIE["set_arah"] == "Ascending") {
                        ksort($list_detail_transaksi);
                    } elseif ($_COOKIE["set_arah"] == "Descending") {
                        krsort($list_detail_transaksi);
                    }
                } elseif ($_COOKIE["set_urut"] == "Nominal") {
                    if ($_COOKIE["set_arah"] == "Ascending") {
                        asort($list_detail_transaksi);
                    } elseif ($_COOKIE["set_arah"] == "Descending") {
                        arsort($list_detail_transaksi);
                    }
                }
            }

            echo "
        <ul>
            ";
            foreach ($list_detail_transaksi as $key => $value) {
                echo "
            <li>{$key} - Rp. " .
                    number_format($value) .
                    "</li>
            ";
            }
            echo "
        </ul>
        ";
        } else {
            echo "
        <p><i>Belum ada data</i></p>
        ";
        } ?>
    </body>
</html>
