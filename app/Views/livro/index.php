<div class="container">
    <h2>Livro</h2>
    <hr>
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Novo
        </button>
        <!-- Tabela de Usuario -->
    <table class="table">
        <thead>
        <tr>
            <td>ID</td>
            <td>DISPONIVEL</td>
            <td>STATUS</td>
            <td>OBRA</td>
        </tr>
        </thead>
        <tbody>
            <?php foreach($listaLivro as $li) :?>
                <tr>
                    <td>
                        <?=$li['id']?>
                    </td>
                    <td>
                        <?=anchor("Livro/editar/".$li['id'],$li['disponivel'])?>
                    </td>
                    <td>
                        <?=$li['status']?>
                    </td>
                    <td>
                        <?php
                            foreach($listaObra as $obra){
                                $livros[$obra['id']] = $obra['titulo'];
                            }
                        ?>
                        <?=$livros[$li['id_obra']]?>
                    </td>
                </tr>
            <?php endforeach ?>  
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?=form_open("Livro/cadastrar")?> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Livro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="disponivel">Disponivel:</label>
                    <select name="disponivel" id="disponivel" class='form-select'>
                        <option value="0">Indisponível</option>
                        <option value="1">Disponível</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <input class='form-control' type="text" id='status' name='status'>
                </div>
                <div class="form-group">
                    <label for="telefone">Obra:</label>
                    <select class='form-select' name="id_obra" id="id_obra" required>
                        <option>Selecione uma obra</option>
                        <?php foreach($listaObra as $obra) : ?>
                            <option value="<?=$obra['id']?>"><?=$obra['titulo']?></option>
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