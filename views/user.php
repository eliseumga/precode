<div class="divisao" style="background-color: #FFF; height: 20px;"></div>
<button type="button" class="btn btn-outline-primary view_data" data-toggle="modal" data-target="#UserAppend">Cadastrar
</button>
<div class="divisao" style="background-color: #FFF; height: 20px;"></div>

<table class="table table-striped table-bordered table-hover" onload="setInterval('refresh()',3000)">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>E-mail</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
  <?php
  foreach($users as $user):
  ?>
  <tr id="<?php echo $user['iduser'];?>">
    <th data-target="iduser"><?php echo $user['iduser'];?></th>
    <td data-target="name"><?php echo $user['name'];?></td>
    <td data-target="email"><?php echo $user['email'];?></td>
    <td>
      <a href="#" data-role="UserUpdate" class="btn btn-outline-primary view_data" 
      data-toggle="modal" data-id="<?php echo $user['iduser'];?>"
      data-target="#UserUpdate">Editar</a>
      
      <a href="<?php echo BASE_URL;?>users/delete/<?php echo $user['iduser'];?>" data-role="UserDelete" class="btn btn-outline-danger view_data" 
      data-toggle="modal" data-id="<?php echo $user['iduser'];?>"
      data-confirm="Tem certeza de que deseja excluir o registro?"
      data-target="#ExcluirUser">Excluir</a>
      
    </td>
    </tr>
  <?php
    endforeach;
  ?>
  </tbody>
</table>

<!-- Modal Add User -->
<div class="modal fade" id="UserAppend" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalCentralizado">Cadastro de Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="AddUser">
          <div class="form-group">
            <label for="inputNameL">Nome</label>
            <input type="text" name="inputName" class="form-control" id="inputName" aria-describedby="nameHelp" placeholder="Seu nome">
          </div>
          <div class="form-group">
            <label for="inputEmailL">E-Mail</label>
            <input type="email" name="inputEmail" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Seu e-mail">
          </div>
          <div class="form-group">
            <label for="inputPasswordL">Senha</label>
            <input type="password" name="inputPassword" class="form-control" id="inputPassword" placeholder="Senha">
          </div>
          <div id="loading"></div>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Edit User -->
<div class="modal fade" id="UserUpdate" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalCentralizado">Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="EdtUser">
          <input type="hidden" name="iduserE" id="iduserE">
          <div class="form-group">
            <label for="inputNameL">Nome</label>
            <input type="text" name="inputNameE" class="form-control" id="inputNameE" aria-describedby="nameHelp" placeholder="Seu nome" value="">
          </div>
          <div class="form-group">
            <label for="inputEmailL">E-Mail</label>
            <input type="email" name="inputEmailE" class="form-control" id="inputEmailE" aria-describedby="emailHelp" placeholder="Seu e-mail" value="">
          </div>
          <div id="loading"></div>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>


<?php
  $file   = BASE_URL ."views/thema/footer_script.php";
  $footer = file_get_contents($file);
  echo $footer;
?>

<!-- Modal UserUpdate -->
<script type="text/javascript">
  $(document).ready(function(){
    //append values in input fields
    $(document).on('click', 'a[data-role=UserUpdate]', function(){
      var iduser = $(this).data('id');
      var name   = $('#'+iduser).children('td[data-target=name]').text();
      var email  = $('#'+iduser).children('td[data-target=email]').text();

      $('#iduserE').val(iduser);
      $('#inputNameE').val(name);
      $('#inputEmailE').val(email);

      $('#UserUpdate').modal('toggle');
      $('#inputEmailE').trigger('focus');
    });

    //Delete
    $('a[data-confirm]').click(function(ev){
      var hrefLink = $(this).attr('href');
      if(!$('#confirm-delete').length){
        $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header bg-danger text-white">Excluir Registro<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja excluir este registro?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOk">Excluir</a></div></div></div></div>');
      }
      $('#dataComfirmOk').attr('href', hrefLink);
      $('#confirm-delete').modal({show: true});
      return false;
    });

  });
</script>

<script type="text/javascript">
  function refresh(){
    window.location.reload();
  }  
</script>

</body>
</html>