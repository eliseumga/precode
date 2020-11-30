<div class="details">
	<div class="row">
		<div class="slider">
			<div class="img">
				<img id="principal" src="<?php echo BASE_URL.'assets/images/'.$produtos[0]['url'];?>">	
			</div> 
			<div class="thumbnail">
				<?php
					$img = 1;
					foreach($produtos as $produto):
						$nameFoto = $produto['url'];
						$urlFoto = BASE_URL.'assets/images/'.$produto['url'];
						$idFoto = 'foto'.$img;
						?>
						<img id="<?php echo $idFoto;?>" onclick="myLink(this.id)" src="<?php echo BASE_URL.'assets/images/'.$produto['url'];?>">
						<?php
						$img++;
					endforeach;
				?>
				<script type="text/javascript">
					function myLink(element) {
    				var idElement = element;
    				var linkImg = document.getElementById(idElement).src;
						document.getElementById("principal").src = linkImg;
					}
				</script>
			</div>
		</div>

		<div class="col rightbar">
			<div class="nameprod">
				<p><?php echo $produto['name'];?></p>
			</div>
			<div class="stars" style="align-items: center;">
				<label style="font-weight: bold; margin-right: 5px;"><?php echo $produto['nota'];?>.0 </label>
				<?php
					$nota = $produto['nota'];
					switch ($nota) {
						case 1: ?>
							<img src="<?php echo BASE_URL.'assets/images/star1.png';?>" style="width:56px;margin-right:30px;padding-bottom:8px;">	
					<?php 
							break;	
						case 2: ?>
							<img src="<?php echo BASE_URL.'assets/images/star2.png';?>" style="width:56px;margin-right:30px;padding-bottom:8px;">	
					<?php 
							break;	
						case 3: ?>
							<img src="<?php echo BASE_URL.'assets/images/star3.png';?>" style="width:56px;margin-right:30px;padding-bottom:8px;">	
					<?php 
							break;	
						case 4: ?>
							<img src="<?php echo BASE_URL.'assets/images/star4.png';?>" style="width:56px;margin-right:30px;padding-bottom:8px;">	
					<?php 
							break;	
						case 5: ?>
							<img src="<?php echo BASE_URL.'assets/images/star5.png';?>" style="width:56px;margin-right:30px;padding-bottom:8px;">	
 					<?php 
							break;	
						default: ?>
							<img src="<?php echo BASE_URL.'assets/images/star0.png';?>" style="width:56px;margin-right:30px;padding-bottom:8px;">	
 					<?php } ?>
				
				<label style="margin-left: 30px; margin-right: 30px;"><?php echo $produto['qtde_vendida'];?> vendido(s)</label>

				<?php
					$qtde = (int)count($_SESSION['carrinho']); 
				?>
				<script language='javascript'>
					var timer = setTimeout(cfb, 1000);
					function cfb(){
						var y = document.querySelector("#qtdecar");
						y.innerHTML = <?php echo $qtde; ?>;
					}
				</script>
			</div>
			<div class="priceprod">
				<h2>R$ <?php echo getMoedaReal($produto['price']);?></h2> 
			</div>
			<div class="btnComprar">
				<form action="<?php echo BASE_URL.'home/add/'.$produto['id'];?>" method="post">
					<input type="hidden" name="id" value="<?php echo $produto['id'];?>">
					<button type="submit" class="btn btn-danger">Adicionar ao Carrinho</button>
				</form>
			</div>	
		</div>
	</div>
</div>

<div class="row">
	<div class="title_desc">
		<span>Descrição do Produto</span>
	</div>
</div>
<div class="row">
	<div class="description">
		<p><?php echo $produto['description'];?></p>
	</div>
</div>


<?php 
  $file   = BASE_URL ."views/thema/footer_completo.php";
  $footer = file_get_contents($file);
  echo $footer;
?>
