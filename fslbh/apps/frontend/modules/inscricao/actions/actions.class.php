<?php

/**
 * inscricao actions.
 *
 * @package    sf_sandbox
 * @subpackage inscricao
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class inscricaoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->cadastro_list = CadastroPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {

    //if ($this->getUser()->isAuthenticated())
    //	$this->redirect('inscricao/inicio');

    //if (date("y-m-d") >  date("d-m-y",strtotime("15-09-09")))
    //	$this->setTemplate('encerradas');

  	$this->form = new CadastroForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new CadastroForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($cadastro = CadastroPeer::retrieveByPk($request->getParameter('id')), sprintf('Object cadastro does not exist (%s).', $request->getParameter('id')));
    $this->form = new CadastroForm($cadastro);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($cadastro = CadastroPeer::retrieveByPk($request->getParameter('id')), sprintf('Object cadastro does not exist (%s).', $request->getParameter('id')));
    $cadastro->delete();

    $this->redirect('inscricao/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $cadastro = $form->save();

      // Envia e-mail de confirmacao
      $this->sendConfirmacaoCadastro($cadastro);

      $this->redirect('inscricao/menssagem');
    }
  }

  public function executeInicio()
  {
	$this->total = CadastroPeer::doCount(new Criteria());
  }

  public function sendConfirmacaoCadastro($pessoa)
  {

		$to = $pessoa->getEmailPessoal().' , '.$pessoa->getEmailProfissional();

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'From: Inscrição Online - ESP/MG <inscricao@esp.mg.gov.br>' . "\r\n";
		$subject = 'Confirmação de Cadastro - ESP/MG';
		$message = '
<html>
<head>
 	  <title>Inscrição Online</title>
</head>
<body>
<center>
      <small>Atenção este e-mail foi gerado automaticamente favor não responder.</small>
<br>
<table>
<tr>
<td>
<center>
	<img src="http://inscricao.esp.mg.gov.br/admin/images/images-io/topo_email_inscricao.png" />
	<br />&nbsp;<br />
	<img src="http://softwarelivre.esp.mg.gov.br/images/kde_ubuntu_logo.jpg" />
</center>
</td>
</tr>
<tr>
<td>
<br />
<br />
	Prezado(a) <strong> '.$pessoa->getNome().'</strong>,
<br />

<p>Sua <strong>inscrição no Encontro KDE-MG e Ubuntu, Uai!</strong> foi realizada com sucesso.</p>

<p>Lembramos que o credenciamento ocorrerá  as 8h.</p>

<p>Encontro KDE-MG e Ubuntu, Uai!<br />
26 de setembro, 2009
</p>

<p>
Gestão de Tecnologia da Informação - GTI<br />
Escola de Saúde Pública do Estado de Minas Gerais - ESP-MG<br />
Av. Augusto de Lima, 2061 - Barro Preto<br />
Belo Horizonte - MG - Cep: 30.190-002<br />
</p>

<br />

</td>
</tr>
</table>
</center>
</body>
</html>
';
	mail($to, $subject, $message, $headers);

  }

  public function executeProgramacao()
  {

  }

  public function executeContato()
  {

  }

  public function executeEncerradas()
  {

  }

  public function executeMenssagem()
  {

  }

  public function executeDownloads()
  {

  }
  public function executeFicha(sfWebRequest $request)
  {
	$c = new Criteria();
	$c->add(CadastroPeer::ID,$request->getParameter("id"));
	$this->usuario = CadastroPeer::doSelectOne($c);
    //--
	$this->setLayout(false);
  }
}
