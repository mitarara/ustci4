<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

    <h2>Data Mahasiswa</h2>

    <input type="text" id="nama" placeholder="Nama">
    <input type="text" id="prodi" placeholder="Prodi">

    <button id="btnSimpan">Simpan</button>

    <br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Prodi</th>
            </tr>
        </thead>

        <tbody id="tbody">

        </tbody>
    </table>

<script>

$(document).ready(function() {

    loadData();

    function loadData() {

        $.ajax({
            url: "http://localhost/utsci4/public/mahasiswa/getData",
            method: "GET",
            dataType: "json",

            success: function(response) {

                let html = "";

                response.data.forEach(function(row) {

                    html += "<tr>";
                    html += "<td>" + row.id + "</td>";
                    html += "<td>" + row.nama + "</td>";
                    html += "<td>" + row.prodi + "</td>";
                    html += "</tr>";

                });

                $("#tbody").html(html);
            }
        });
    }

    $("#btnSimpan").click(function() {

        let nama = $("#nama").val();
        let prodi = $("#prodi").val();

        $.ajax({
            url: "http://localhost/utsci4/public/mahasiswa/simpan",
            method: "POST",

            data: {
                nama: nama,
                prodi: prodi
            },

            success: function(res) {

                alert("Data berhasil disimpan");

                loadData();

                $("#nama").val('');
                $("#prodi").val('');
            }
        });

    });

});

</script>

</body>
</html>