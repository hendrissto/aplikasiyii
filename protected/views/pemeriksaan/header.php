<table>
<tr>

    <td>Nama Pasien : <?php echo $pasien['nama_pasien'];?><td>
    <td style="width: 100px;"></td>
    <td>Alamat : <?php echo $pasien['alamat_pasien'];?><td>
</tr>
<tr>

    <td>No RM : <?php echo $pasien['no_rm'];?><td>
    <td style="width: 100px;"></td>
    <td>No Telepon : <?php echo $pasien['no_telp'];?><td>
</tr>
<tr>
    <td>Jenis Kelamin : <?php echo $pasien['jenis_kelamin'];?><td>
    <td style="width: 100px;"></td>
    <td>Tanggal Lahir: <?php echo $pasien['tgl_lahir'];?><td>
</tr>
</table>
<nav class="navi">
    <ul>
<li><?php echo CHtml::link('pemeriksaan' , array('/pemeriksaan/create/oid/'.$pasien['id_periksa'])); ?></a></li>
<li><?php echo CHtml::link('Tindakan' , array('/tindakanPasien/create/oid/'.$pasien['id_periksa'])); ?></a></li>
<li><?php echo CHtml::link('Resep' , array('/resep/create/oid/'.$pasien['id_periksa'])); ?></a></li>
</ul>
</nav>                

<style>

    .navi {
        margin:auto;
        text-align: center;
        width: 100%;
        font-family: arial;
    } 

    .navi ul {
        background:#4f9bc6;
        list-style: none;
        display: inline-table;
        width: 100%;
     }

    .navi ul li{
        float:left;
    }

    .navi ul li:hover{
        background:#78b5d8;
    }

    .navi ul li:hover a{
        color:#fff;
    }

    .navi ul li a{
        display: block;
        padding: 10px;
        color: #fff;
        text-decoration: none;
    }
    td {
        font-size: 17px;
    }
    </style>