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
        p.tag {
            text-align: left;
            margin: 2mm 0mm;
            margin-top: 0mm;
        }
        .container {
            width: 11cm;
            margin-left: 0px;
            margin-right: 0px;
            border-radius: 10px;
            margin-bottom: 10mm;
            padding-right: 0px;
        }
        .kartu{
          font-size: 6mm;
          color: white;
        }
        .containerKartu{
          width: 4cm;
          text-align: left;
          border-radius: 8px;
          padding-right: 0px;
          background-color: black;
       
        }
        td {
            vertical-align: top;
            text-align: start;
            font-size: 17px;
        }
        .logo{
          width: 230px;

        }
        .jarak-vertikal-bawah {
            margin-bottom: 10mm;
            margin-top: 25mm;
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
    <div class="col-sm-6" style="border:solid ;">
  <img class="logo float-left" src="<?php echo base_url();?>assets/img/logo-tag.jpg">
  <div class="containerKartu float-right" >
  <p class="kartu"> KARTU BEROBAT </P> </div>

    <table border="0" class="col-sm-12 jarak-vertikal-bawah" style="width:100px;">
        <tr>
            <td >No. RM </td>
            <td >:</td>  
        </tr>
        <tr>
            <td >Nama</td>
            <td >:</td>
        </tr>
        <tr>
            <td  >Umur</td>
            <td >:</td>
        </tr>
        <tr>
            <td  >Alamat</td>
            <td > :</td>
        </tr>
        
    </table>
</div>
</div>


 <a href="<?php echo base_url('index.php/dashboard');?>"><button class="btn btn-primary d-print-none">Kembali</button></a>
  <button onClick="cetak()" class="btn btn-primary d-print-none" >Print</button>

    <script>
     function cetak() {
        return window.print();
        }
    </script>

</body>
</html>