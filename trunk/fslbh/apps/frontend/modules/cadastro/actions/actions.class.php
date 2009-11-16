<?php

/**
 * cadastro actions.
 *
 * @package    sf_sandbox
 * @subpackage cadastro
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class cadastroActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  	$this->setTemplate('new');


    $this->cadastro_list = CadastroPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
  	 $this->setTemplate('new');


    $this->cadastro = CadastroPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->cadastro);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CadastroForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new CadastroForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
  	 $this->setTemplate('new');


    $this->forward404Unless($cadastro = CadastroPeer::retrieveByPk($request->getParameter('id')), sprintf('Object cadastro does not exist (%s).', $request->getParameter('id')));
    $this->form = new CadastroForm($cadastro);
  }

  public function executeUpdate(sfWebRequest $request)
  {
  	 $this->setTemplate('new');

    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($cadastro = CadastroPeer::retrieveByPk($request->getParameter('id')), sprintf('Object cadastro does not exist (%s).', $request->getParameter('id')));
    $this->form = new CadastroForm($cadastro);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
  	 $this->setTemplate('new');

    $request->checkCSRFProtection();

    $this->forward404Unless($cadastro = CadastroPeer::retrieveByPk($request->getParameter('id')), sprintf('Object cadastro does not exist (%s).', $request->getParameter('id')));
    $cadastro->delete();

    $this->redirect('cadastro/index');
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


  public function sendConfirmacaoCadastro($pessoa)
  {

		$to = $pessoa->getEmailPessoal().' , '.$pessoa->getEmailProfissional();

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'From: Inscrição Online - FSL-BH <contato@fslbh.org>' . "\r\n";
		$subject = 'Confirmação de Cadastro - FSL-BH';
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
<br />
<br />
	Prezado(a) <strong> '.$pessoa->getNome().'</strong>,
<br />

<p>Sua <strong>inscrição no Festival de Software Livre</strong> foi realizada com sucesso.</p>

<p>Lembramos que o credenciamento ocorrerá  as 8h no dia 28/11/2009.</p>

<p>Att,<br />
Equipe FSL-BH.
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

}
