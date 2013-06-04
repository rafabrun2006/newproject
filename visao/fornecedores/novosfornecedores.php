<form class="formulario">
    <p id="subtitulo"><?php echo isset($_REQUEST['cod']) ? 'Editar Fornecedor':'Cadastro de Fornecedores' ?></p>
    <label for="nome">Nome do Fornecedor:</label>
    <br>
    <input id="nome" type="text" name="nome" value="<?php echo $_REQUEST['nome'] ?>">Ex: Brasil Alimentos
    <br>
    Descri&ccedil;&atilde;o: 
    <br>
    <input type="text" name="descricao" size="50" value="<?php echo $_REQUEST['descricao'] ?>">Ex: Venda de Alimentos
    <br>
    Data do Cadastro:
    <br><input type="text" name="data_cadastro" value="<?php echo isset($_REQUEST['data_cadastro']) ? $_REQUEST['data_cadastro']:date('d/m/Y') ?>">Ex: 10/11/2011
    <br>
    CNPJ: 
    <br><input type="text" name="cnpj" value="<?php echo $_REQUEST['cnpj'] ?>">Ex: 99999999999
    <br>
    Telefone: 
    <br><input type="text" name="telefone" value="<?php echo $_REQUEST['telefone'] ?>"> Ex: 99999999
    <br>
    E-mail: 
    <br><input type="text" name="email" size="30" value="<?php echo $_REQUEST['email'] ?>"> Ex: braali@email.com
    <br>
    UF: 
    <br><input type="text" name="uf" size="5" value="<?php echo $_REQUEST['uf'] ?>"> Ex: GO, DF
    <br>
    <br>
    <input type="hidden" name="acao" value="<?php echo isset($_REQUEST['cod']) ? 'editar':'gravar' ?>">
    <input type="hidden" name="cod" value="<?php echo isset($_REQUEST['cod']) ? $_REQUEST['cod']:'' ?>">
    <input type="hidden" name="url" value="fornecedores/fornecedores">
    
    <input type="submit" value="Gravar">
    <input type="reset" value="Limpar Formulario">
</form>