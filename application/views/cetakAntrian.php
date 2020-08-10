<html>
<head>
	<title></title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/core/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/core/bootstrap.min.js');?>"></script>
    <script>
        $(document).ready(function(){
            $("#myModal").modal('show');
        });
    </script>

	<style>
        * {
            font-size: 3mm;
        }
        p {
            margin: 2mm 0mm;
        }
        p.judul {
            font-size: 5mm;
        }
        .kertas {
            width: 7cm;
        }
        td {
            vertical-align: top;
            text-align: start;
        }
        .jarak-vertikal-bawah {
            margin-bottom: 3mm;
        }
        .last-td-align-end td:last-child {
            text-align: end;
        }

    </style>

</head>
<body>
<!-- modal notif -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Data Berhasil Disimpan <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal notif -->


<div class="kertas text-center p-0">
   <center><p class="judul">Klinik Utama Nur Khadijah </p>
    <p>Jl. Cihanjuang No.293, Cihanjuang Rahayu, Kec. Parongpong, Kabupaten Bandung Barat, Jawa Barat 40559</p></center>
    <hr />

    <table border="1" class="col-sm-12 jarak-vertikal-bawah" style="width:265px;">
        <tr>
            <td ><center>No Antrian</center></td>
            
        </tr>
        <tr>
        	<td><center style="font-size:50px;">001</center></td>
        </tr>
        <tr>
            <td><center style="font-size:15px;" >Jenis Pelayanan Disini</center></td>
            
        </tr>
        <tr>
            <td><center style="font-size:15px;" >Tanggal Disini</center></td>
            
        </tr>
        
    </table>
    <a href="<?php echo base_url('index.php/dashboard');?>"><button class="btn btn-primary d-print-none">Kembali</button></a>
	<button onClick="cetak()" class="btn btn-primary d-print-none" >Print</button>
</div>

<script>
    function cetak() {
        return window.print();
    }
</script>

</body>
</html>