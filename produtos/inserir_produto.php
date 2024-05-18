<?php
    require_once("../cabecalho.php");
?>

    <h3>Inserir Produto</h3>
    <form>
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe o nome</label>
                <input type="text" class="form-control"     name="nome">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="descricao" class="form-label">Informe a descrição</label>
                <input type="text" class="form-control"     name="descricao">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="valor" class="form-label">Informe o valor</label>
                <input type="text" class="form-control"     name="valor">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="categoria" class="form-label"> Selecione a categoria</label>
                <select class="form-select" name="categoria">
                    <?php
                        $linhas = retornarCategoria();
                        while ($l = $linhas->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$l['id_categoria']}'>{$l['descricao']}</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success">
                    Salvar
                </button>
            </div>
        </div>
    </form>

<?php
    require_once("../rodape.html");