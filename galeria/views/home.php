<fieldset>
	<legend> adicionar uma foto</legend>
	<form method="POST" enctype="multipart/form-data">
		Foto:<br>

		<input type="file" name="arquivo"><br><br>
		Titulo:<br>
		<input type="text" name="titulo"><br><br>

		<input type="submit" value="ENVIAR ARQUIVOS">
	</form>
</fieldset>
<br><br>

<?php
foreach ($fotos as $foto):
?>
<img src="<?php BASE_URL ?>assets/images/galeria/<?php echo $foto['url']; ?>" border="0" width="300"><br>
<?php echo $foto['titulo']; ?>
<hr>
<?php

endforeach;
?>