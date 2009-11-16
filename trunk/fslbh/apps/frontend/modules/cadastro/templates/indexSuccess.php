<h1>Cadastro List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nome</th>
      <th>Cpf</th>
      <th>Email pessoal</th>
      <th>Email profissional</th>
      <th>Municipio</th>
      <th>Telefone</th>
      <th>Validado</th>
      <th>Logradouro</th>
      <th>Bairro</th>
      <th>Numero</th>
      <th>Complemento</th>
      <th>Estado</th>
      <th>Cep</th>
      <th>Created at</th>
      <th>Celular</th>
      <th>Instituicao trabalho</th>
      <th>Profissao</th>
      <th>Opcao1 oficina</th>
      <th>Opcao2 oficina</th>
      <th>Sexo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($cadastro_list as $cadastro): ?>
    <tr>
      <td><a href="<?php echo url_for('cadastro/show?id='.$cadastro->getId()) ?>"><?php echo $cadastro->getId() ?></a></td>
      <td><?php echo $cadastro->getNome() ?></td>
      <td><?php echo $cadastro->getCpf() ?></td>
      <td><?php echo $cadastro->getEmailPessoal() ?></td>
      <td><?php echo $cadastro->getEmailProfissional() ?></td>
      <td><?php echo $cadastro->getMunicipio() ?></td>
      <td><?php echo $cadastro->getTelefone() ?></td>
      <td><?php echo $cadastro->getValidado() ?></td>
      <td><?php echo $cadastro->getLogradouro() ?></td>
      <td><?php echo $cadastro->getBairro() ?></td>
      <td><?php echo $cadastro->getNumero() ?></td>
      <td><?php echo $cadastro->getComplemento() ?></td>
      <td><?php echo $cadastro->getEstado() ?></td>
      <td><?php echo $cadastro->getCep() ?></td>
      <td><?php echo $cadastro->getCreatedAt() ?></td>
      <td><?php echo $cadastro->getCelular() ?></td>
      <td><?php echo $cadastro->getInstituicaoTrabalho() ?></td>
      <td><?php echo $cadastro->getProfissao() ?></td>
      <td><?php echo $cadastro->getOpcao1Oficina() ?></td>
      <td><?php echo $cadastro->getOpcao2Oficina() ?></td>
      <td><?php echo $cadastro->getSexo() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('cadastro/new') ?>">New</a>
