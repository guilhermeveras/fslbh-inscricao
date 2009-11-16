<?php
/*
 * This file is not part of the symfony package.
 * (c) T�lio Cesar Martins Pereira <tuliocesar@hotsys.com.br>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfValidatorCnpj validates an CNPJ. It also converts the input value to an integer.
 *
 * @author     T�lio Cesar Martins Pereira <tuliocesar@hotsys.com.br>
 * 
 */
/**
 * Mask of CNPJ = ##.###.###/####-##
 * Mask of CPF  = ###.###.###-##
 */
 /**
   * Configures the current validator.
   *
   * Available options:
   *
   *  * type: Type of value allowed
   *  
   *
   * Available error codes:
   *
   *  *Type
   *  
   *
   * @param array $options   An array of options
   * @param array $messages  An array of error messages
   *
   * @see sfValidatorBase
   */
class sfValidatorCnpj extends sfValidatorBase
{
  
   protected function configure($options = array(), $messages = array())
   {
		$this->addMessage('type','Type is invalid');
		$this->addOption('type');
		$this->setMessage('invalid','"%value%" is not an cnpj.');
  		
   }
  
   private function validaCNPJ($cnpj) {
 
        if (strlen($cnpj) <> 14)
        return false;
 
        $soma = 0;
 
        $soma += ($cnpj[0] * 5);
        $soma += ($cnpj[1] * 4);
        $soma += ($cnpj[2] * 3);
        $soma += ($cnpj[3] * 2);
        $soma += ($cnpj[4] * 9);
        $soma += ($cnpj[5] * 8);
        $soma += ($cnpj[6] * 7);
        $soma += ($cnpj[7] * 6);
        $soma += ($cnpj[8] * 5);
        $soma += ($cnpj[9] * 4);
        $soma += ($cnpj[10] * 3);
        $soma += ($cnpj[11] * 2);
 
        $d1 = $soma % 11;
        $d1 = $d1 < 2 ? 0 : 11 - $d1;
 
        $soma = 0;
        $soma += ($cnpj[0] * 6);
        $soma += ($cnpj[1] * 5);
        $soma += ($cnpj[2] * 4);
        $soma += ($cnpj[3] * 3);
        $soma += ($cnpj[4] * 2);
        $soma += ($cnpj[5] * 9);
        $soma += ($cnpj[6] * 8);
        $soma += ($cnpj[7] * 7);
        $soma += ($cnpj[8] * 6);
        $soma += ($cnpj[9] * 5);
        $soma += ($cnpj[10] * 4);
        $soma += ($cnpj[11] * 3);
        $soma += ($cnpj[12] * 2);
 
 
        $d2 = $soma % 11;
        $d2 = $d2 < 2 ? 0 : 11 - $d2;
 
        if ($cnpj[12] == $d1 && $cnpj[13] == $d2) {
            return true;
        } else {
            return false;
        }
    }

   private function validaCPF($cpf) {

	$nulos = array("12345678909","11111111111","22222222222","33333333333","44444444444","55555555555","66666666666","77777777777","88888888888","99999999999","00000000000");
	/* Retira todos os caracteres que nao sejam 0-9 */
	$cpf = ereg_replace("[^0-9]", "", $cpf);
	/*Retorna falso se houver letras no cpf */
	if (!(ereg("[0-9]",$cpf)))
	{
    		return false;
	}
	/* Retorna falso se o cpf for nulo */
	if( in_array($cpf, $nulos) )
	{
		return false;
	}

	/*Calcula o penúltimo dígito verificador*/
	$acum = 0;
	for($i = 0; $i < 9; $i++)
	{
  		$acum+= $cpf[$i]*(10-$i);
	}

	$x=$acum % 11;
	$acum = ($x>1) ? (11 - $x) : 0;
	/* Retorna falso se o digito calculado eh diferente do passado na string */
	if ($acum != $cpf[9])
	{
  		return false;
	}
	/*Calcula o último dígito verificador*/
	$acum=0;
	for ($i=0; $i<10; $i++)
	{
  	$acum+= $cpf[$i]*(11-$i);
	}  

	$x=$acum % 11;
	$acum = ($x > 1) ? (11-$x) : 0;
	/* Retorna falso se o digito calculado eh diferente do passado na string */
	if ( $acum != $cpf[10])
	{
  		return false;
	}  
	/* Retorna verdadeiro se o cpf eh valido */
	return true;
}
    
    
  /**
   * @see sfValidatorBase
   */
  protected function doClean($value)
  {
 
  	if(!$this->hasOption('type'))
  	{
  		throw new sfValidatorError($this,'type',array('value'=>$value));
  	}

  	if(($this->getOption('type')!='cnpj') && ($this->getOption('type')!='cpf'))
  	{
  		throw new sfValidatorError($this,'type',array('value'=>$value));
  	}
  	
  	if($this->getOption('type')=="cnpj")
  	{
	  	if(!is_numeric($value))
	  	{
			$aux = $value;
	  		$clean = str_replace('.','',$aux);
	  		$clean = str_replace('/','',$clean);
	  		$clean = str_replace('-','',$clean);
	  	}
	  	else 
	  	{
	  		$clean = $value;
	  	}
	  	
	  	if(!$this->validaCNPJ($clean))
	  	{
	  		throw new sfValidatorError($this, 'invalid', array('value' => $value));
	  	}
  	}
  	
    if($this->getOption('type') == "cpf")
  	{
	  	if(!is_numeric($value))
	  	{
	  		$aux = $value;
	  		$clean = str_replace('.','',$aux);
	  		$clean = str_replace('-','',$clean);
	  	}
	  	else 
	  	{
	  		$clean = $value;
	  	}
	  	
	  	if(!$this->validaCPF($clean))
	  	{
	  		throw new sfValidatorError($this, 'invalid', array('value' => $value));
	  	}
  	}
  	
  	return $value;
  }
}
