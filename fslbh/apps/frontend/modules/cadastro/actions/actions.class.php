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
    $this->cadastro_list = CadastroPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
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
    $this->forward404Unless($cadastro = CadastroPeer::retrieveByPk($request->getParameter('id')), sprintf('Object cadastro does not exist (%s).', $request->getParameter('id')));
    $this->form = new CadastroForm($cadastro);
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

    $this->redirect('cadastro/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $cadastro = $form->save();

      $this->redirect('cadastro/edit?id='.$cadastro->getId());
    }
  }
}
