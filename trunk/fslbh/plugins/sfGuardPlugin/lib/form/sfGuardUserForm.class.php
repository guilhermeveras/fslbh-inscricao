<?php

/**
 * sfGuardUser form.
 *
 * @package    form
 * @subpackage sf_guard_user
 * @version    SVN: $Id: sfGuardUserForm.class.php 13001 2008-11-14 10:45:32Z noel $
 */
class sfGuardUserForm extends sfGuardUserAdminForm
{
  protected
    $pkName = null;

  public function configure()
  {
    parent::configure();

    unset(
      $this['last_login'],
      $this['created_at'],
      $this['salt'],
      $this['algorithm'],
      $this['is_active'],
      $this['is_super_admin'],
      $this['sf_guard_user_group_list'],
      $this['sf_guard_user_permission_list'],
      $this['usuarios_trabalho_list']
    );
    
    $this->widgetSchema->setLabels(array(
      	'username'                => 'Login:',
      	'password'                 => 'Senha:', 
      	'password_again'  => 'Senha novamente:',
    ));
    
    $this->validatorSchema['username'] = new sfValidatorString(array('max_length' => 128), array('required' => 'Campo Obrigat&oacute;rio'));
    $this->validatorSchema['password'] = new sfValidatorString(array('max_length' => 128), array('required' => 'Campo Obrigat&oacute;rio'));
  }
}
