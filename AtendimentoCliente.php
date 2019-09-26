<?php require_once "header.html" ?>

<?php

$id = $_GET['id'];

$url = 'http://18.228.39.100:3333/atendimento/' . $id . '';

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$atendimento = json_decode(curl_exec($curl));

?>
<main>
    <div class="container mt-3">
        <h4 class="cover-heading">ATENDIMENTO #<?= $atendimento->id ?></h4>
        <div class="mt-3">
            <form action="controller/ControllerAtendimento.php?id=<?= $atendimento->id ?>" method="POST">
                <div class="form-group">
                    <label for="status">Staus do atendimento:</label>
                    <select name="status" class="btn btn-secondary dropdown-toggle form-control">
                        <option value="Pendente">Pendente</option>
                        <option value="Em andamento">Em andamento</option>
                        <option value="Finalizado">Finalizado</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" value="<?= $atendimento->cpf ?>" name="cpf" id="cpf"
                           required>
                </div>

                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="email" class="form-control" value="<?= $atendimento->email ?>" name="email" id="email"
                           required>
                </div>

                <div class="form-group">
                    <label for="mensagem">Mensagem</label>
                    <textarea type="text" class="form-control" name="mensagem" id="mensagem"
                              required><?= $atendimento->mensagem ?></textarea>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="action" value="updateAtendimento">
                    <button type="button" class="btn btn-default" data-dismiss="modal">VOLTAR</button>
                    <button type="submit" class="btn btn-primary">ATUALIZAR</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php require_once "footer.html" ?>
