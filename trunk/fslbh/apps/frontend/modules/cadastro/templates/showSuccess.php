<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $cadastro->getId() ?></td>
    </tr>
    <tr>
      <th>Nome:</th>
      <td><?php echo $cadastro->getNome() ?></td>
    </tr>
    <tr>
      <th>Cpf:</th>
      <td><?php echo $cadastro->getCpf() ?></td>
    </tr>
    <tr>
      <th>Email pessoal:</th>
      <td><?php echo $cadastro->getEmailPessoal() ?></td>
    </tr>
    <tr>
      <th>Email profissional:</th>
      <td><?php echo $cadastro->getEmailProfissional() ?></td>
    </tr>
    <tr>
      <th>Municipio:</th>
      <td><?php echo $cadastro->getMunicipio() ?></td>
    </tr>
    <tr>
      <th>Telefone:</th>
      <td><?php echo $cadastro->getTelefone() ?></td>
    </tr>
    <tr>
      <th>Validado:</th>
      <td><?php echo $cadastro->getValidado() ?></td>
    </tr>
    <tr>
      <th>Logradouro:</th>
      <td><?php echo $cadastro->getLogradouro() ?></td>
    </tr>
    <tr>
      <th>Bairro:</th>
      <td><?php echo $cadastro->getBairro() ?></td>
    </tr>
    <tr>
      <th>Numero:</th>
      <td><?php echo $cadastro->getNumero() ?></td>
    </tr>
    <tr>
      <th>Complemento:</th>
      <td><?php echo $cadastro->getComplemento() ?></td>
    </tr>
    <tr>
      <th>Estado:</th>
      <td><?php echo $cadastro->getEstado() ?></td>
    </tr>
    <tr>
      <th>Cep:</th>
      <td><?php echo $cadastro->getCep() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $cadastro->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Celular:</th>
      <td><?php echo $cadastro->getCelular() ?></td>
    </tr>
    <tr>
      <th>Instituicao trabalho:</th>
      <td><?php echo $cadastro->getInstituicaoTrabalho() ?></td>
    </tr>
    <tr>
      <th>Profissao:</th>
      <td><?php echo $cadastro->getProfissao() ?></td>
    </tr>
    <tr>
      <th>Opcao1 oficina:</th>
      <td><?php echo $cadastro->getOpcao1Oficina() ?></td>
    </tr>
    <tr>
      <th>Opcao2 oficina:</th>
      <td><?php echo $cadastro->getOpcao2Oficina() ?></td>
    </tr>
    <tr>
      <th>Sexo:</th>
      <td><?php echo $cadastro->getSexo() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('cadastro/edit?id='.$cadastro->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('cadastro/index') ?>">List</a>
