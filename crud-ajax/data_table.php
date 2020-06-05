<div class="container">
<h3>Data Siswa</h3>
        <div class="table-responsive">
            </script>
            <table id = "data" class="table table-borderless">
                <tr>
                <th>NIPD</th>
                <th>Nama Lengkap</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Kelas</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Action</th>
                </tr>
            <?php
                 include "koneksi.php";
                 $no = 1;
                 $query = "SELECT * FROM siswa";
                 $execute = $db->prepare($query);
                 $execute->execute();
                 $result = $execute->get_result();
                    while($baris = $result->fetch_assoc()){
                        $nipd = $baris['nipd'];
                        $nama = $baris['namasiswa'];
                        $tempat_lahir = $baris['tempat_lahir'];
                        $tanggal_lahir = $baris['tanggal_lahir'];
                        $kelas = $baris['kelas'];
                        $umur = $baris['umur'];
                        $alamat = $baris['alamat'];
                          ?>
                          <tr>
                          <td><?php echo $nipd; ?></td>
                          <td><?php echo $nama; ?></td>
                          <td><?php echo $tempat_lahir; ?></td>
                          <td><?php echo $tanggal_lahir; ?></td>
                          <td><?php echo $kelas; ?></td>
                          <td><?php echo $umur; ?></td>
                          <td><?php echo $alamat; ?></td>
                          <td>
                            <button id="<?php echo $nipd; ?>" class="btn btn-warning update">Edit</button>
                            <button id="<?php echo $nipd; ?>" class="btn btn-danger delete">Delete</button>
                          </td>
                          </tr>
                    <?php } ?>
                     </table>
                </div>
           </div>

           </div>

           <script type="text/javascript">
    $(document).ready(function() {
        $('#data').DataTable();
    });

    function reset() {
        document.getElementById("namasiswa").innerHTML="";
        document.getElementById("tempat_lahir").innerHTML="";
        document.getElementById("tanggal_lahir").innerHTML="";
        document.getElementById("kelas").innerHTML="";
        document.getElementById("umur").innerHTML="";
        document.getElementById("alamat").innerHTML="";
    }

    $(document).on('click', '.edit_data', function() {
        var id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: "set_data.php",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                reset();
                document.getElementById("nipd").value = response.nipd;
                document.getElementById("namasiswa").value = response.namasiswa;
                document.getElementById("tempat_lahir").value = response.tempat_lahir;
                document.getElementById("tanggal_lahir").value = response.tanggal_lahir;
                document.getElementById("kelas").value = response.kelas;
                document.getElementById("umur").value = response.umur;
                document.getElementById("alamat").value = response.alamat;
            },
            error: function(respose) {
                console.log(respose.responseText)
            }
        });
    });

    $(document).on('click', '.hapus_data', function() {
        var id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: "hapus_data.php",
            data: {
                id: id
            },
            success: function() {
                $('.data_table').load("data_table.php");
            },
            error: function(response) {
                console.log(response.responseText);
            }
        });
    });
</script>