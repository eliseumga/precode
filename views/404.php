<div class="divisao" style="background-color: #FFF; height: 20px;"></div>
<style type="text/css">
	.bd {
		display: flex;
		width: 500px;
		height: 250px;
		background-color: #eeeeee;
		margin: auto;
		margin-top: 6.5%;
		margin-bottom: 6.5%;
		box-shadow: 2px;
		padding: 5px 5px 5px 5px;
	}
	.ops {
		display: flex;
		font-size: 86px;
		text-align: center;
		color: #333;
		justify-content: center;
		align-items: center;
		margin-right: 20px;
		padding: 5px 5px 5px 5px;
	}
	.aviso {
		display: flex;
		font-size: 34px;
		text-align: center;
		color: #333;
		justify-content: center;
		align-items: center;
		padding: 5px 5px 5px 5px;
	}
</style>

<div class="bd">
	<p class="ops">Ops!</p>
	<p class="aviso">A página que você está procurando não foi encontrada.<p>
</div>


<?php 
  $file   = BASE_URL ."views/thema/footer_completo.php";
  $footer = file_get_contents($file);
  echo $footer;
?>

