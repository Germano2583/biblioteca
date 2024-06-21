<div class="container p-5">
    <?=form_open('Obra/salvar')?>
    <input value='<?=$obra['id']?>'class='form-control' type="hidden" id='id' name='id'>
    <div class="row p-2">
        <div class="col-2">
            <label for="nome">Titulo</label>
        </div>
        <div class="col-10">
            <input value='<?=$obra['titulo']?>'class='form-control' type="text" id='titulo' name='titulo'>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="nome">Categoria</label>
        </div>
        <div class="col-10">
            <input value='<?=$obra['categoria']?>'class='form-control' type="text" id='categoria' name='categoria'>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="nome">Ano</label>
        </div>
        <div class="col-10">
            <input value='<?=$obra['ano_publicacao']?>'class='form-control' type="text" id='ano_publicacao' name='ano_publicacao'>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="isbn">ISBN</label>
        </div>
        <div class="col-10">
            <input value='<?=$obra['isbn']?>'class='form-control' type="text" id='isbn' name='isbn'>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="editora">Editora</label>
        </div>
        <div class="col-10">
            <input value='<?=$obra['id_editora']?>'class='form-control' type="text" id='id_editora' name='id_editora' disabled>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="autores">Autores(a)</label>
        </div>
        <div class="col-10">
            <?php
            $autor;
                foreach($listaAutor as $a){
                    $autor[$a['id']] = $a['nome'];
                }
            ?>
            <?php foreach($listaAutorObra as $lao):?>
                <?php if($lao['id_obra'] == $obra['id']):?>
                    <div><?=$autor[$lao['id_autor']]?></div>
                <?php endif?>
            <?php endforeach?>

            <!-- Button do Modal Autores-->
        <div>
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModalautor">
                Adicionar...
            </button>
        </div>
    </div>
    <div class="row p-4">
        <div class="col">
            <div class="btn-group w-100" role="group">
                <a href='http://localhost:8080/index.php/Obra/index'class="btn btn-outline-secondary">Cancelar</a>
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
    <?=form_open('Obra/excluir')?>
    <input value='<?=$obra['id']?>'class='form-control' type="hidden" id='id' name='id'>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Você tem certeza que deseja excluir: <br>ID: <?=$obra['id']?><br>Titulo: <?=$obra['titulo']?><br>Ano: <?=$obra['ano_publicacao']?><br>ISBN: <?=$obra['isbn']?><br> Editora: <?=$obra['id_editora']?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Excluir</button>
        </div>
        </div>
        <?=form_close()?>
    </div>
    </div>

    <!-- Modal De Autores-->
    <div class="modal fade" id="exampleModalautor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?=form_open('Obra/adicionarAutor')?>
    <input value='<?=$obra['id']?>'class='form-control' type="hidden" id='id_obra' name='id_obra'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Lista de Autores</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="autor">Autores:</label>
                            <select class='form-select' name="id_autor" id="id_autor" required>
                                <option>Selecione</option>
                                <?php foreach($listaAutor as $autor) : ?>
                                    <option value="<?=$autor['id']?>"><?=$autor['nome']?></option>
                                <?php endforeach ?>
                            </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </div>
        </div>
    <?=form_close()?>
    </div>