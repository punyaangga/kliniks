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
            width: 15cm;
            padding: 20px;
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

<center>
<br>
<div class="col-sm-6">
    <div class="kertas text-center p-0" style="border:solid 5px; border-radius:10px; padding:10px;">
        <img class="logo float-left" src="<?php echo base_url();?>assets/img/logo-tag.png">
        <img src="<?php echo base_url('assets/img/icd.png');?>" style="width:110px;float:right;">

        <table border="0" class="col-sm-12 jarak-vertikal-bawah" style="margin-left:20px;">
            <tr>
                <th style="width:70px;font-size:15px;">No.RM</th>
                <td style="font-size:17px">: 123</td>  
            </tr>
            <tr>
                <th style="width:70px;font-size:15px;">Nama</th>
                 <td style="font-size:17px">: Pasien</td>
            </tr>
            <tr>
                <th style="width:70px;font-size:15px;">Umur</th>
                 <td style="font-size:17px">: 123</td>
            </tr>
            <tr>
                <th style="width:70px;font-size:15px; ">Alamat</th>
                <td style="font-size:17px">: Cimahi</td>
            </tr>

        </table>
        
    </div>
</div>
<br>
<a href="<?php echo base_url('index.php/dashboard');?>"><button class="btn btn-primary d-print-none">Kembali</button></a>
<button onClick="cetak()" class="btn btn-primary d-print-none" >Print</button>
</center>

<script>
    function cetak() {
        return window.print();
    }
</script>

</body>
</html>