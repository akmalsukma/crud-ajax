<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
             integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <style>
        #simpan {
            height: 50px;
            margin-left: 64%;
            margin-top: -8%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>CRUD Data</h2>

        <form id="form-data" class= "form-data" action="" method="post">
            <div class="row">
                <div class="col-sm-2">
                <div class="form-group">
                <label for="">Nama Siswa</label>
                <input type="hidden" name="nipd" id="nipd">
                <input type="text" name="namasiswa" id="namasiswa" class="form-control" required="true">
                <p class="text-danger" id="err_namasiswa"></p>
                </div>
                </div>

                <div class="col-sm-2">
                <div class="form-group">
                <label for="">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required="true">
                <p class="text-danger" id="err_tempat_lahir"></p>
                </div>
                </div>  

                <div class="col-sm-2">
                <div class="form-group">
                <label for="">Umur</label>
                <input type="number" name="umur" id="umur" min="1" max="100" class="form-control" required="true">
                <p class="text-danger" id="err_umur"></p>
                </div>
                
                </div>

            </div>

            <div class="row">

                <div class="col-sm-2">
                <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required="true">
                <p class="text-danger" id="err_tanggal_lahir"></p>
                </div>
                </div>

                <div class="col-sm-2">
                <div class="form-group">
                <label>Kelas</label>
                        <select name="kelas" id="kelas" class="form-control" required="true">
                            <option value=""></option>
                            <option value="X RPL 1">X RPL 1</option>
                            <option value="X RPL 2">X RPL 2</option>
                            <option value="X RPL 3">X RPL 3</option>
                            </select>
                            <p class="text-danger" id="err_kelas"></p>
                </div>
                </div>

                <div class="col-sm-3">
                <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="alamat" id="alamat" cols="40" rows="4"></textarea>
                <p class="text-danger" id="err_alamat"></p>
                </div>
                </div>

                
                <button type="button" name="simpan" id="simpan" class="btn btn-primary" style="">
                 Simpan
                </button>
                
                </div>

                
            </div>

            </form>

      

        <div class="data_table"></div>

    </div>

    <!--Script JQuery-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- Script Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Script DataTable -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('.data_table').load("data_table.php");
            $('#simpan').click(function() {
                var data = $('.form-data').serialize();
                var namasiswa = document.getElementById("namasiswa").value;
                var tempat_lahir = document.getElementById("tempat_lahir").value;
                var tanggal_lahir = document.getElementById("tanggal_lahir").value;
                var kelas = document.getElementById("kelas").value;
                var umur = document.getElementById("umur").value;
                var alamat = document.getElementById("alamat").value;
                
                if (namasiswa == "") {
                    document.getElementById("err_namasiswa").innerHTML = "Nama Siswa Harus Anda Isi!";
                } else {
                    document.getElementById("err_namasiswa").innerHTML = "";
                }

                if (tempat_lahir == "") {
                    document.getElementById("err_tempat_lahir").innerHTML = "Tempat Lahir Harus Anda Isi!";
                } else {
                    document.getElementById("err_tempat_lahir").innerHTML = "";
                }

                if (kelas == "") {
                    document.getElementById("err_kelas").innerHTML = "Kelas Harus Anda Isi!";
                } else {
                    document.getElementById("err_kelas").innerHTML = "";
                }

                if (tanggal_lahir == "") {
                    document.getElementById("err_tanggal_lahir").innerHTML = "Tanggal Lahir Harus Anda Isi!";
                } else {
                    document.getElementById("err_tanggal_lahir").innerHTML = "";
                }

                if (umur == "") {
                    document.getElementById("err_umur").innerHTML = "Umur Harus Anda Isi!";
                } else {
                    document.getElementById("err_umur").innerHTML = "";
                }
                

                if (alamat == "") {
                    document.getElementById("err_alamat").innerHTML = "Alamat Harus Anda Isi!";
                } else {
                    document.getElementById("err_alamat").innerHTML = "";
                }

                // if selanjutnya adalah untuk ajax nya sendiri
                if (namasiswa != "" && tempat_lahir != "" && tanggal_lahir  != "" && kelas  != "" && umur  != "" && alamat) {
                    $.ajax({
                        type: 'POST',
                        url: "form_action.php",
                        data: data,
                        success: function() {
                            $('.data_table').load("data_table.php");
                            document.getElementById("nipd").value = "";
                            document.getElementById("form-data").reset();
                        },
                        error: function(response) {
                            console.log(response.responseText);
                        }
                    });
                }
            });
        });
    </script>



</body>
</html>