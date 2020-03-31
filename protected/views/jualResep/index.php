<?php
/* @var $this JualResepController */
/* @var $dataProvider CActiveDataProvider */


?>

<h1>Jual Resep</h1>

<table class="table table-bordered">
<thead>
<tr>
	<td>No RM</td>
    <td>Nama Pasien</td>
    <td>Status Resep</td>
	<td>Aksi</td>
</tr>
</thead>
<tbody>
<?php $total_harga_r=0; $subtotal=0;foreach ($jual_resep as $model) : ?>
            <tr>
				<td><?php echo $model['no_rm']; ?></td>
				<td><?php echo $model['nama_pasien']; ?></td>
                <td><?php if ($model['status_resep'] == "belum diserahkan"){?>
                        <div class="belum"><p class="tulisan">Belum diserahkan</p></div>
                <?php }else{?>
                        <div class="pulang"><p class="tulisan">Sudah Diserahkan</p></div>
                <?php } ?> </td> 
                <td><?php if ($model['status_resep'] == "belum diserahkan"){?>
                    <?php  echo CHtml::link('<img style="width:15px; height:15px;" src="images/edit.png"></img>', '#', array( 'submit'=>array('create','id'=>$model['id_jual_resep'],'data'=>$model['id_periksa']))); ?>
                <?php }else{?>
                        
                <?php } ?> </td>                      
            
                
            </tr>
            <?php endforeach; ?>
<tr>
    
<tbody>
</table>
<style>
.belum {
    width: 150px;
    height: 40px;
    border: 4px solid black;
    border-radius: 10px;
    background-color: red;
    
}
.sudah {
    width: 150px;
    height: 40px;
    border: 4px solid black;
    border-radius: 10px;
    background-color: green;   
}

.pulang {
    width: 150px;
    height: 40px;
    border: 4px solid black;
    border-radius: 10px;
    background-color: blue;
    
}

.tulisan{
    text-align: center;
    padding-top: 9px;
    color: white;
}
</style>