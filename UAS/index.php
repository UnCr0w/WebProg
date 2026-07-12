<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROJECT - UAS</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <style>
        #container {
            border: 2px solid black;
            padding: 5px;
        }
        #inisialisasi {
            width: 50%;
            float: left;
        }
        .label {
            display: inline-block;
            width: 100px;
        }
        #okupansi {
            width: 50%;
            float: left;
        }
        #denah {
            width: 100%;
            clear: both;
        }
        #table {
            width: 100%;
        }
        #table td{
            height: 20px;
            border: 1px solid black;
        }
        #table td.Unavailable {
            background-color: #7f7f7f;
        }
    </style>
</head>
<body>
    <div id="container">
        <div id="inisialisasi">
            <h2>Inisialisasi</h2>

            <label class="label">Jumlah Baris</label>
            <input type="number" class="iRow" min="0"><br><br>

            <label class="label">Jumlah Kolom</label>
            <input type="number" class="iCol" min="0"><br><br>

            <input type="submit" value="Generate" id="btnGene">
        </div>
        <div id="okupansi">
            <h2>Okupansi</h2>

            <label class="label">Baris</label>
            <input type="number" id="tarRow" min="0"><br><br>

            <label class="label">Kolom</label>
            <input type="number" id="tarCol" min="0"><br><br>

            <label class="label">Jenis</label>
            <input type="radio" name="jenis" value="Available">
            <label>Available</label>
            <input type="radio" name="jenis" value="Unavailable">
            <label>Unavailable</label><br><br>

            <input type="submit" value="Simpan" id="btnSimpan">
        </div>
        <div id="denah">
            <h2>Denah</h2>
            <table id="table">
                
            </table>
        </div>
    </div>
    <script>
        $("#btnGene").attr("disabled", "true");
        
        var iRow, iCol;

        $('.iRow').on("input", function() {
            iRow = $('.iRow').val();
            iCol = $('.iCol').val()

			if (iRow > 0 && iCol > 0) {
				$("#btnGene").removeAttr("disabled");
			}
			else {
				$("#btnGene").attr("disabled", "true");
			}
		});

        $('.iCol').on("input", function() {
            iRow = $('.iRow').val();
            iCol = $('.iCol').val();

			if (iRow > 0 && iCol > 0) {
				$("#btnGene").removeAttr("disabled");
			}
			else {
				$("#btnGene").attr("disabled", "true");
			}
		});


        $("#btnGene").click(function() {
            iRow = parseInt($('.iRow').val());
            iCol = parseInt($('.iCol').val());

            $('#table').empty();

            for (var r = 0; r < iRow; r++) {
                var rowHtml = "<tr>"; 
        
                for (var c = 0; c < iCol; c++) {
                    rowHtml += "<td></td>"; 
            }
        
            rowHtml += "</tr>"; 
            $("#table").append(rowHtml); 
             }   
		});

        $("#btnSimpan").click(function() {
            var targetRow = parseInt($("#tarRow").val()) - 1;
            var targetCol = parseInt($("#tarCol").val()) - 1;

            var status = $("input[name='jenis']:checked").val();
            var cell = $('#table tr').eq(targetRow).find("td").eq(targetCol);

            if (status === "Unavailable"){
                cell.addClass("Unavailable");
            } else {
                cell.removeClass("Unavailable")
            }
        })
    </script>
</body>
</html>