<?php 
$pag = "professores";
$tab = "professores";
require_once("../conexao.php"); 

/*
@session_start();
    //verificar se o usuário está autenticado
if(@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'Admin'){
    echo "<script language='javascript'> window.location='../index.php' </script>";

}
*/

?>

<div class="row mt-4 mb-4">
    <a type="button" class="btn-primary btn-sm ml-3 d-none d-md-block" href="index.php?pag=<?php echo $pag ?>&funcao=novo">Novo Professor</a>
    <a type="button" class="btn-primary btn-sm ml-3 d-block d-sm-none" href="index.php?pag=<?php echo $pag ?>&funcao=novo">+</a>
    
</div>



<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Fone</th>
                        <th>Email</th>
                        <th>CPF</th>
                        <th>Foto</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                   <?php 

                   $query = $pdo->query("SELECT * FROM $tab order by id desc ");
                   $res = $query->fetchAll(PDO::FETCH_ASSOC);

                   for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }
                      //recuperação dos registros do BD ['como está no BD']
                      $nome = $res[$i]['nome'];
                      $fone = $res[$i]['telefone'];
                      $email = $res[$i]['email'];
                      $cpf = $res[$i]['cpf'];
                      $foto = $res[$i]['foto'];
                      $endereco = $res[$i]['endereco'];
                      $id = $res[$i]['id'];
                       
                      ?>

                    <tr>
                        <!--DADOS VISIVEIS NA TELA-->
                        <td><?php echo $nome ?></td>
                        <td><?php echo $fone ?></td>
                        <td><?php echo $email ?></td>
                        <td><?php echo $cpf ?></td>
                        <td><img src="../img/professores/<?php echo $foto ?>" width="50"></td>
                       

                        <td>
                             <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Dados'><i class='far fa-edit'></i></a>
                            <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Registro'><i class='far fa-trash-alt'></i></a>
                            <a href="index.php?pag=<?php echo $pag ?>&funcao=endereco&id=<?php echo $id ?>" class='text-primary mr-1' title='Ver Endereço'><i class='fas fa-home'></i></a>
                        </td>
                    </tr>
<?php } ?>





                </tbody>
            </table>
        </div>
    </div>
</div>





<!-- Modal ADICIONAR, EDITAR OU EXCLUIR REGISTRO-->
<div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php 
                if (@$_GET['funcao'] == 'editar') {
                    $titulo = "Editar Registro";
                    $id2 = $_GET['id'];

                    $query = $pdo->query("SELECT * FROM $tab where id = '" . $id2 . "' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    //recuperacao dos dados para a modal
                    $nome2 = $res[0]['nome'];
                    $email2 = $res[0]['email'];
                    $fone2 = $res[0]['telefone'];
                    $cpf2 = $res[0]['cpf'];
                    $endereco2 = $res[0]['endereco'];
                    $foto2 = $res[0]['foto'];
                                                            
                } else {
                    $titulo = "Inserir Registro";

                }


                ?>
                
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <!--CAMPOS PARA INCLUIR OU EDITAR-->
                            <div class="form-group">
                                <label >Nome</label>
                                <input value="<?php echo @$nome2 ?>" type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                            </div>
                            <div class="form-group">
                                <label >Email</label>
                                <input value="<?php echo @$email2 ?>" type="text" class="form-control" id="email" name="email" placeholder="Nome">
                            </div>
                            <div class="form-group">
                                <label >CPF</label>
                                <input value="<?php echo @$cpf2 ?>" type="text" class="form-control" id="cpf" name="cpf" placeholder="Nome">
                            </div>
                            <div class="form-group">
                                <label >Fone</label>
                                <input value="<?php echo @$fone2 ?>" type="text" class="form-control" id="fone" name="fone" placeholder="Nome">
                            </div>
                            <div class="form-group">
                                <label >Endereço</label>
                                <input value="<?php echo @$endereco2 ?>" type="text" class="form-control" id="endereco" name="endereco" placeholder="Nome">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label >Imagem</label>
                                    <input type="file" value="<?php echo @$foto2 ?>"  class="form-control-file" id="imagem" name="imagem" onChange="carregarImg();">
                                </div>

                                <div id="divImgConta">
                                <?php if(@$foto2 != ""){ ?>
                                    <img src="../img/<?php echo $tab ?>/<?php echo $foto2 ?>" width="170" height="170" id="target">
                                <?php  }else{ ?>
                                    <img src="../img/<?php echo $tab ?>/sem-foto.jpg" width="170" height="170" id="target">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    

                  
                   

                    <small>
                        <div id="mensagem">

                        </div>
                    </small> 

                </div>



                <div class="modal-footer">



                <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="txtid2" id="txtid2">
                <input value="<?php echo @$cpf2 ?>" type="hidden" name="antigo" id="antigo">
                <input value="<?php echo @$email2 ?>" type="hidden" name="antigo2" id="antigo2">

                    <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>






<div class="modal" id="modal-deletar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <p>Deseja realmente Excluir este Registro?</p>

                <div align="center" id="mensagem_excluir" class="">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-excluir">Cancelar</button>
                <form method="post">

                    <input type="hidden" id="id"  name="id" value="<?php echo @$_GET['id'] ?>" required>

                    <button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal" id="modal-endereco" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Dados do Professor</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

            
			<div class="modal-body">
                <!-- Dados para a Modal de Visualização -->                    
				<?php 
				if (@$_GET['funcao'] == 'endereco') {
					
					$id2 = $_GET['id'];

					$query = $pdo->query("SELECT * FROM $tab where id = '$id2' ");
					$res = $query->fetchAll(PDO::FETCH_ASSOC);
					$nome3 = $res[0]['nome'];
					$cpf3 = $res[0]['cpf'];
					$telefone3 = $res[0]['telefone'];
					$email3 = $res[0]['email'];
					$endereco3 = $res[0]['endereco'];
                    $foto3 = $res[0]['foto'];
					
				} 

                //MODAL DE VISUALIZAÇÃO
				?>

				<span><b>Nome: </b> <i><?php echo $nome3 ?></i><br>
				<span><b>Telefone: </b> <i><?php echo $telefone3 ?></i> <span class="ml-4"><b>CPF: </b> <i><?php echo $cpf3 ?></i><br>
				<span><b>Email: </b> <i><?php echo $email3 ?><br>
				<span><b>Endereço: </b> <i><?php echo $endereco3 ?><br>
                <span><b>Foto: </b><i><img src="../img/professores/<?php echo $foto3 ?>" width="150"><br>

			</div>
			
		</div>
	</div>
</div>






<?php 

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "novo") {
    echo "<script>$('#modalDados').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "editar") {
    echo "<script>$('#modalDados').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir") {
    echo "<script>$('#modal-deletar').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "endereco") {
    echo "<script>$('#modal-endereco').modal('show');</script>";
}

?>




<!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM IMAGEM -->
<script type="text/javascript">
    $("#form").submit(function () {
        var pag = "<?=$pag?>";
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: pag + "/inserir.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {

                $('#mensagem').removeClass()

                if (mensagem.trim() == "Salvo com Sucesso!") {
                    
                    //$('#nome').val('');
                    //$('#cpf').val('');
                    $('#btn-fechar').click();
                    window.location = "index.php?pag="+pag;

                } else {

                    $('#mensagem').addClass('text-danger')
                }

                $('#mensagem').text(mensagem)

            },

            cache: false,
            contentType: false,
            processData: false,
            xhr: function () {  // Custom XMLHttpRequest
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                    myXhr.upload.addEventListener('progress', function () {
                        /* faz alguma coisa durante o progresso do upload */
                    }, false);
                }
                return myXhr;
            }
        });
    });
</script>





<!--AJAX PARA EXCLUSÃO DOS DADOS -->
<script type="text/javascript">
    $(document).ready(function () {
        var pag = "<?=$pag?>";
        $('#btn-deletar').click(function (event) {
            event.preventDefault();

            $.ajax({
                url: pag + "/excluir.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function (mensagem) {

                    if (mensagem.trim() === 'Excluído com Sucesso!') {


                        $('#btn-cancelar-excluir').click();
                        window.location = "index.php?pag=" + pag;
                    }

                    $('#mensagem_excluir').text(mensagem)



                },

            })
        })
    })
</script>



<!--SCRIPT PARA CARREGAR IMAGEM -->
<script type="text/javascript">

    function carregarImg() {

        var target = document.getElementById('target');
        var file = document.querySelector("input[type=file]").files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);


        } else {
            target.src = "";
        }
    }

</script>





<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').dataTable({
            "ordering": false
        })

    });
</script>



