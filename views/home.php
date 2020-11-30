<div class="container">
<div class="row" style="background-color: #f0f0f0;margin-top: 13px; padding: 3px;">
<?php
foreach($produtos as $produto):
?>
  <div class="produto" id="produto" style="width: 220px;">
    <a href="<?php echo BASE_URL.'home/productdetails/'.$produto['id'];?>">
      <div class="thumbnail" style="background-color: #FFF; margin: 5px 5px 5px 5px; padding: 5px; box-shadow: 0 0.0625rem 0.125rem 0 rgba(0,0,0,.1); border-radius: .125rem;   text-decoration: none;">
        <div class="image">
          <img src="<?php echo BASE_URL.'assets/images/'.$produto['url']; ?>" style="width: 200px;">
          <div class="col" style="width: 200px;"><?php echo getLimiteString($produto['name']);?></div>
          <div class="col">
            <label style="font-weight: bold; color: red; text-align: right;">
              R$ <?php echo getMoedaReal($produto['price']);?>
            </label>
          </div>
          <div class="col" style="margin-left: 40px;">

            <form action="<?php echo BASE_URL.'home/add/'.$produto['id'];?>" method="post">
              <input type="hidden" name="id" value="<?php echo $produto['id'];?>">
              <button type="submit" class="btn btn-danger">Comprar</button>
            </form>
          </div>
        </div>
      </div>
    </a>
  </div>
<?php 
endforeach;
?>
</div>
</div>

<?php 
  $file   = BASE_URL ."views/thema/footer_completo.php";
  $footer = file_get_contents($file);
  echo $footer;
?>