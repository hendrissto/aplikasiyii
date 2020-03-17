<?php
/* @var $this TagihanController */
/* @var $data Tagihan */
?>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_tagihan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->no_tagihan), array('view', 'id'=>$data->no_tagihan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_tagihan')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_tagihan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_tagihan')); ?>:</b>
	<?php echo CHtml::encode($data->total_tagihan); ?>
	<br />


</div>
