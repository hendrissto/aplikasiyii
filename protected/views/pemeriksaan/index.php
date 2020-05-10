<?php $this->renderPartial('periksaPasien/menu_periksapasien.php'); ?>

<h1>Pemeriksaans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
