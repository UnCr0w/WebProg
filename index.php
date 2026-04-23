<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        <div style="display: flex" ;>
            <div>[<a href="tambah.php">Tambah Transaksi</a>]</div>
            <div>[<a href="setting.php">Setting</a>]</div>
        </div>
        <hr />

        <?php 
        if (isset($_COOKIE["list_transaksi"])) { $list_transaksi =
        json_decode($_COOKIE["list_transaksi"], true); echo "
        <ul>
            "; 
            $urut = "Tanggal";
            if(isset($_COOKIE['set_urut'])) { 
                $urut = $_COOKIE['set_urut'];
            }
                
            $arah ="Ascending";
            if(isset($_COOKIE['set_arah'])){
                $arah = $_COOKIE['set_arah'];
            }

            usort($list_transaksi, function($a,$b) use ($urut,$arah){
                if ($urut == "Tanggal"){
                    $valA = strtotime($a["date"]);
                    $valB = strtotime($b["date"]);
                } else
                {
                    $valA = (int)$a["nominal"];
                    $valB = (int)$b["nominal"];
                }

                if ($arah == "Ascending"){
                    return $valA > $valB;
                } else { 
                    return $valA < $valB;
                }
            });
            foreach ($list_transaksi as $key => $value)    
            { 
            $nominal_format = number_format($value["nominal"], 0, ".",",");
            echo " 
            <li>{$value["date"]} - Rp. {$nominal_format}</li>
            "; } echo "
        </ul>
        "; } else { echo "
        <p><i>Belum ada data</i></p>
        "; } ?>
    </body>
</html>
