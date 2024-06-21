<div class="container p-5">
    <?=form_open('Emprestimo/salvardev')?>
    <input value='<?=$emprestimo['id']?>'class='form-control' type="hidden" id='id' name='id'>
    <div class="row p-2">
        <div class="col-2">
            <label for="data_fim">Data do Fim:</label>
        </div>
        <div class="col-10">
            <input value='<?=$emprestimo['data_fim']?>'class='form-control' type="date" id='data_fim' name='data_fim'>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="data_prazo">Data do Prazo:</label>
        </div>
        <div class="col-10">
            <input value='<?=$emprestimo['data_prazo']?>'class='form-control' type="date" id='data_prazo' name='data_prazo'>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="telefone">Livro:</label>
        </div>
        <div class="col-10">
            <select class='form-select' name="id_livro" id="id_livro" required>
            <?php
                        foreach($listaObra as $obra){
                            $obras[$obra['id']] = $obra['titulo'];
                        }
                        foreach($listaLivro as $livro){
                            $livros[$livro['id']] = $obras[$livro['id_obra']];
                        }
                        ?>
                        <option value="<?=$livro['id']?>"><?=$livros[$emprestimo['id_livro']]?></option>
            </select>
        </div>
    </div>
    <div class="row p-4">
        <div class="col">
            <div class="btn-group w-100" role="group">
                <a href='http://localhost:8080/index.php/Emprestimo/index'class="btn btn-outline-secondary">Cancelar</a>
                <button type="submit" class="btn btn-outline-success">Salvar</button>
            </div>
        </div>
    </div>
    <?=form_close()?>
</div>