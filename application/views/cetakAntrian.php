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
        .pesan{
          display: none;
          border: 1px solid #18ce0f;
          width: 200px;
          margin: auto;
          background-color: #18ce0f;
          color: white;
          text-align: center;
        }


    </style>

</head>
<body>
<!-- modal notif -->

<div class="pesan d-print-none" ><center>Data Berhasil Disimpan</center></div>

<!-- end modal notif -->

<center>
<div class="kertas text-center p-0">
   <center><p class="judul">Klinik Utama Nur Khadijah </p>
    <p>Jl. Cihanjuang No.293, Cihanjuang Rahayu, Kec. Parongpong, Kabupaten Bandung Barat, Jawa Barat 40559</p></center>
    <hr />

    <table border="1" class="col-sm-12 jarak-vertikal-bawah" style="width:265px;">
        <?php foreach ($cetak->result() as $c) { ?>
            
        
        <tr>
            <td ><center>No Antrian</center></td>
            
        </tr>
        <tr>
        	<td><center style="font-size:50px;"><?php echo $c->no_antrian;?></center></td>
        </tr>
        <tr>
            <td><center style="font-size:15px;" ><?php echo $c->nama_pelayanan;?></center></td>
            
        </tr>
        <tr>
            <td><center style="font-size:15px;" ><?php echo $c->tgl_antrian;?></center></td>
            
        </tr>
        <?php } ?>
        
    </table>
    <a href="<?php echo base_url('index.php/dashboard');?>"><button class="btn btn-primary d-print-none">Kembali</button></a>
	<button onClick="cetak()" class="btn btn-primary d-print-none" >Print</button>
</div>
</center>

<script>
    function cetak() {
        return window.print();
    }
     //untuk pesan
      // angka 500 dibawah ini artinya pesan akan muncul dalam 0,5 detik setelah document ready
      $(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
      // angka 3000 dibawah ini artinya pesan akan hilang dalam 3 detik setelah muncul
      setTimeout(function(){$(".pesan").fadeOut('slow');}, 3000);
</script>

</body>
</html>