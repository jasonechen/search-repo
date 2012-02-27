<p>
<ul>Click Essay Name to View:
<?php $essay = EssayProfile::getEssayByUser(); 	?>	
	
	<ul>
		<?php foreach($essay as $e){  ?>
			<?php if(!empty($e->mime)){ ?>
		<li>
			<table width="50%" border="0" cellspacing="0" cellpadding="8">
			  <tr>
				<td width="50%"><?php  echo CHtml::Link($e->name,Yii::app()->baseUrl.'/'.Yii::app()->params['uploadDirEssay'].Yii::app()->user->id.'/'.$e->mime,array('target'=>'_blank')); ?></td>
				<td width="25%" align="left"><?php echo CHtml::Link('Remove',array('profileinfo/deleteessay','id'=>$e->id),array('title'=>'Remove','style'=>'color:grey;cursor:pointer;text-decoration:underline;font-size:12px;')); ?></td>
			  </tr>
			</table>

			 </li>
			<?php } ?>
		<?php } ?>
	</ul>
	
</p>
</ul>
