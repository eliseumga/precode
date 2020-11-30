<div class="container">
<div class="row" style="padding-top: 10px; margin-left: 2px;"><h3>Carrinho de Compras</h3></div>
  <table class="table table-bordered">
  <thead>
    <tr>
      <th class="tg-0lax" style="width: 60px;">Código</th>
      <th class="tg-0lax" style="width: 500px;">Descrição</th>
      <th class="tg-0lax" style="width: 100px;">Quantidade</th>
      <th class="tg-0lax" style="width: 140px;">Valor Unitário</th>
      <th class="tg-0lax" style="width: 140px;">Valor Total</th>
      <th class="tg-0lax" style="width: 50px;"></th>
      <th class="tg-0lax" style="width: 50px;"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $totalCompra = 0;
    foreach($viewData as $produto):
    ?>
    <tr>
      <td class="id" style="text-align: center; width: 60px;"><?php echo $produto['id']; ?></td>
      <td class="nome" style="width: 500px;"><?php echo $produto['name'];?></td>
      <td class="qtde" style="text-align: center; width: 100px;"><?php echo $produto['qtde'];?></td>
      <td class="preco" style="text-align: right; width: 140px;">R$ <?php echo getMoedaReal($produto['price']);?></td>
      <td class="total" style="text-align: right; width: 140px;">R$ <?php echo getMoedaReal($produto['total']);?></td>
      <td class="add align-middle" style="width: 50px; padding-top: 20px;">
        <form action="<?php echo BASE_URL.'home/add/'.$produto['id'];?>" method="post">
          <input type="hidden" name="id" value="<?php echo $produto['id'];?>">
          <input type="image" width="24" src="<?php echo BASE_URL.'assets/images/add_1.png';?>">
        </form>
      </td>
      <td class="del align-middle" style="width: 50px;"><a href="<?php echo BASE_URL.'home/delete/'.$produto['id']; ?>"><img src="<?php echo BASE_URL.'assets/images/del_1.png';?>" width="24"></a></td>
    </tr>
    <?php
    $totalCompra = $totalCompra + $produto['total'];
    endforeach;
    ?>
  </tbody>
  <tfoot>
    <tr>
      <th class="table-info" style="width: 60px;"></th>
      <th class="table-info" style="width: 500px;">Subtotal do Carrinho</th>
      <th class="table-info" style="width: 100px;"></th>
      <th class="table-info" style="width: 140px;"></th>
      <th class="table-info" id="subtotal" style="text-align: right; width: 140px;">R$ <?php echo getMoedaReal($totalCompra);?></th>
      <th class="table-info" style="width: 50px;"></th>
      <th class="table-info" style="width: 50px;"></th>
    </tr>
    <tr>
      <th class="tg-0lax" style="width: 60px; text-align: center;"><div id="loading"></div></th>
      <th class="tg-0lax" style="width: 500px;">Calcular o valor do Frete:</th>
      <th class="tg-0lax" style="width: 100px;">
        <form method="post" id="Form">
        <input type="hidden" name="CepOrigem" id="CepOrigem" value="87043450">
        <input type="text" class="form-control" name="CepDestino" id="CepDestino" value="87043450" style="width: 98px;">
        <input type="hidden" name="Peso" id="Peso" value="0.900">
        <input type="hidden" name="Formato" id="Formato" value="1">
        <input type="hidden" name="Comprimento" id="Comprimento" value="30">
        <input type="hidden" name="Altura" id="Altura" value="30">
        <input type="hidden" name="Largura" id="Largura" value="30">
        <input type="hidden" name="Diametro" id="Diametro" value="0">
        <input type="hidden" name="MaoPropria" id="MaoPropria" value="N">
        <input type="hidden" name="ValorDeclarado" id="ValorDeclarado" value="0">
        <input type="hidden" name="AvisoRecebimento" id="AvisoRecebimento" value="N">
        <input type="hidden" name="Codigo" id="pac" value="40010">      
      </th>
      <th class="tg-0lax" style="width: 90px; text-align: center;">
        <input type="submit" name="Calcular" value="Calcular" class="btn btn-info">
      </th>
      <th class="tg-0lax" id="totalFrete2" style="width: 140px;text-align: right;">
        <input type="text" id="totalFrete" class="form-control" disabled style="text-align: right;">
      </th>
      <th class="tg-0lax" style="width: 50px;"></th>
      <th class="tg-0lax" style="width: 50px;"></th>
      </form>
    </tr>
    <tr>
      <th class="table-info" style="width: 60px;"></th>
      <th class="table-info" style="width: 500px;">Total da Compra</th>
      <th class="table-info" style="width: 100px;"></th>
      <th class="table-info" style="width: 140px;"></th>
      <th class="table-info" id="totalCompra2" style="width: 140px;text-align: right;">
        <input type="text" id="totalCompra" class="form-control" name="totalCompra" disabled style="text-align: right; font-weight: bold;">
      </th>
      <th class="table-info" style="width: 50px;"></th>
      <th class="table-info" style="width: 50px;"></th>
    </tr>
    <tr>
      <th class="tg-0lax" style="width: 60px;"></th>
      <th class="tg-0lax" style="width: 500px;"><a class="btn btn-danger" href="<?php echo BASE_URL;?>">Continuar Comprando</a></th>
      <th class="tg-0lax" style="width: 100px;"></th>
      <th class="tg-0lax" style="width: 140px;"></th>
      <th class="tg-0lax" style="width: 140px;"></th>
      <th class="tg-0lax" style="width: 50px;"></th>
      <th class="tg-0lax" style="width: 50px;"></th>
    </tr>
  </tfoot>
  </table>
</div>

<?php 
  $file   = BASE_URL ."views/thema/footer_script.php";
  $footer = file_get_contents($file);
  echo $footer;
  //require(BASE_URL.'/views/thema/footer_script.php'); 
?>

<script type="text/javascript">
  var temp = setTimeout(getVlrTotalCompra, 3000);
  function getVlrTotalCompra() {
    var vlrTotalCompra = document.querySelector("#totalCompra");
    vlrTotalCompra.value = '';
    var subtotal = <?php echo getMoedaUS($totalCompra);?>;
    var Frete = document.querySelector("#totalFrete");
      if(Frete.innerHTML === '' || Frete.innerHTML === '0') {
        vlrFrete = 0;
      } else {
        vlrFrete = Frete.innerHTML;
      }
      vlrTotalCompra.value = '';
      var myValCompra = subtotal + vlrFrete;
      var vlrFreteTo = myValCompra.toLocaleString('pt-BR',{style:'currency',currency:'BRL'});
      vlrTotalCompra.value = vlrFreteTo;
  }
</script>

</body>
</html>