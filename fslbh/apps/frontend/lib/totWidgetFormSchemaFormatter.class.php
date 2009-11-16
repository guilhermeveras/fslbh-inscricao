<?php
/*
 * This file is not part of the symfony package.
 * (c) TotLab <contato@totlab.com.br>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @author     TotLab <contato@totlab.com.br>
 *
 */
class totWidgetFormSchemaFormatter extends sfWidgetFormSchemaFormatter
{

	protected $decoratorFormat = 			'<div class="formulario">%content%</div>';
	protected $namedErrorRowFormatInARow =  '<div class="form-nome-erro">%name%: %error%</div>';
	protected $errorRowFormatInARow = 		'<div class="form-erro">&uarr;&nbsp; %error% &nbsp;&uarr;</div>';
	protected $errorListFormatInARow  = '
	<div class="form-lista-erros">
		%errors%
	</div>';
	//protected $helpFormat = '<div class="form-ajuda"><div>%help%</div></div>';
	protected $helpFormat = '<span class="hint-pointer"><span class="hint">%help%</span></span>';
	protected $rowFormat = '
	<div class="form-linha">
		<div class="form-rotulo">%label%</div>
	  	<div class="form-campos">
		  	%field%
		 	%help%
		  	%error%
		  	%hidden_fields%
	  	</div>
	</div>';
	protected $errorRowFormat = '
	<div class="form-linha-error">
		<div class="form-rotulo-erro">%label%</div>
	  	<div class="form-campos-erro">
		  	%field%
		 	%help%
		  	%error%
		  	%hidden_fields%
	  	</div>
	</div>
	';
	public function formatRow($label, $field, $errors = array(), $help = '', $hiddenFields = null)
  	{
	  if (is_null($errors) || !$errors)
	    {

		    return strtr($this->getRowFormat(), array(
		      '%label%'         => $label,
		      '%field%'         => $field,
		      '%error%'         => $this->formatErrorsForRow($errors),
		      '%help%'          => $this->formatHelp($help),
		      '%hidden_fields%' => is_null($hiddenFields) ? '%hidden_fields%' : $hiddenFields,
		    ));
	    }
	    else
	    {

		    return strtr($this->getErrorRowFormat(), array(
		      '%label%'         => $label,
		      '%field%'         => $field,
		      '%error%'         => $this->formatErrorsForRow($errors),
		      '%help%'          => $this->formatHelp($help),
		      '%hidden_fields%' => is_null($hiddenFields) ? '%hidden_fields%' : $hiddenFields,
		    ));


	    }


	  }
	  /*
 public function generateLabelName($name)
  {
    $label = $this->widgetSchema->getLabel($name);

    if (!$label && false !== $label)
    {
      $label = str_replace('_', ' ', ucfirst($name));
    }

    if($field->hasOption('required') && $field->getOption('required')) {
      $label .= "*";
    }


    return $this->translate($label);
  }
	*/
}


?>