
<div class="container">
    <div class="row">
            <center><h1>Seja Bem-vindo a Nossa Biblioteca</h1> <br></center>
        <div class="col-md-4 offset-md-4">
            <h2>Login</h2>
            <?php if (session()->has('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->get('error') ?>
                </div>
            <?php endif; ?>
            <form action="<?php echo base_url('login/authenticate'); ?>" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo old('email'); ?>">
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha">
                </div><br>
                <button type="submit" class="btn btn-dark">Entrar</button>
            </form>
        </div>
    </div>
</div>
