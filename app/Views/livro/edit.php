<div class="container p-5">
    <?=form_open('Livro/salvar')?>
    <input value='<?=$livro['id']?>' class='form-control' type="hidden" id='id' name='id'>
    <div class="row p-2">
        <div class="col-2">
            <label for="nome">Disponivel:</label>
        </div>
        <div class="col-10">
            <input value='<?=$livro['disponivel']?>'class='form-control' type="text" id='disponivel' name='disponivel'>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="nome">Status</label>
        </div>
        <div class="col-10">
            <input value='<?=$livro['status']?>'class='form-control' type="text" id='status' name='status'>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="autores">Obra:</label>
        </div>
        <div class="col-10">
            <select class='form-select' name="id_obra" id="id_obra" required>
                    <?php foreach($listaObra as $obra) : ?>
                        <option value="<?=$obra['id']?>"><?=$obra['titulo']?></option>
                    <?php endforeach ?>
            </select> 
        </div>
    </div>

    <div class="row p-4">
        <div class="col">
            <div class="btn-group w-100" role="group">
                <a href='http://localhost:8080/index.php/Livro/index'class="btn btn-outline-secondary">Cancelar</a>
                <button type="submit" class="btn btn-outline-success">Salvar</button>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Excluir
                </button>
            </div>
        </div>
    </div>
    <?=form_close()?>
</div>

    <!-- Modal De Excluir-->
    <?=form_open('Livro/excluir')?>
    <input value='<?=$livro['id']?>'class='form-control' type="hidden" id='id' name='id'>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Você tem certeza que deseja excluir: <br>ID: <?=$livro['id']?><br>Disponivel: <?=$livro['disponivel']?><br>Status: <?=$livro['status']?><br> Obra: <?=$livro['id_obra']?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Excluir</button>
        </div>
        </div>
        <?=form_close()?>
    </div>
    </div>
