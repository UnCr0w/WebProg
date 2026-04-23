<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Homepage</title>
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
        <div style="display: flex" ;>
            <div>[<a href="tambah.php">Tambah Transaksi</a>]</div>
            <div>[<a href="setting.php">Setting</a>]</div>
        </div>
        <hr />

        <?php if (isset($_COOKIE["list_transaksi"])) { $list_transaksi =
        json_decode($_COOKIE["list_transaksi"], true); echo "
        <ul>
            "; foreach ($list_transaksi as $key => $value) { echo "
            <li>{$value["date"]} - Rp. {$value["nominal"]}</li>
            "; } echo "
        </ul>
        "; } else { echo "
        <p><i>Belum ada data</i></p>
        "; } ?>
    </body>
</html>
