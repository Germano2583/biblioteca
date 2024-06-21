<div class="container">
    <h2>Obra</h2>
        <hr>
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Novo
        </button>
        <!-- Tabela de Usuario -->
    <table class="table">
        <thead>
        <tr>
            <td>ID</td>
            <td>TITULO</td>
            <td>CATEGORIA</td>
            <td>ANO</td>
            <td>ISBN</td>
            <td>EDITORA</td>
        </tr>
        </thead>
        <tbody>
            <?php foreach($listaObra as $ob) :?>
                <tr>
                    <td>
                        <?=$ob['id']?>
                    </td>
                    <td>
                        <?=anchor("Obra/editar/".$ob['id'],$ob['titulo'])?>
                    </td>
                    <td>
                        <?=$ob['categoria']?>
                    </td>
                    <td>
                        <?=$ob['ano_publicacao']?>
                    </td>
                    <td>
                        <?=$ob['isbn']?>
                    </td>
                    <td>
                        <?php
                            foreach($listaEditora as $editora){
                                $editoras[$editora['id']] = $editora['nome'];
                            }
                        ?>
                        <?=$editoras[$ob['id_editora']]?>
                    </td>
                </tr>
            <?php endforeach ?>  
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?=form_open("Obra/cadastrar")?> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nova Obra</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="titulo">Titulo:</label>
                    <input class='form-control' type="text" id='titulo' name='titulo'>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <input class='form-control' type="text" id='categoria' name='categoria'>
                </div>
                <div class="form-group">
                    <label for="ano">Ano:</label>
                    <input class='form-control' type="text" id='ano_publicacao' name='ano_publicacao'>
                </div>
                <div class="form-group">
                    <label for="isbn">ISBN:</label>
                    <input class='form-control' type="text" id='isbn' name='isbn'>
                </div>
                <div class="form-group">
                    <label for="telefone">EDITORA:</label>
                    <select class='form-select' name="id_editora" id="id_editora" required>
                        <option>Selecione uma editora</option>
                        <?php foreach($listaEditora as $editora) : ?>
                            <option value="<?=$editora['id']?>"><?=$editora['nome']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-dark">Cadastrar</button>
            </div>
        </div>
    </div>
        <?=form_close()?>
    </div>
</div>