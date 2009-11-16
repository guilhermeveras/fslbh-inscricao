<?php

class CoAutor extends BaseCoAutor
{
    public function __toString()
	{
		return $this->getPrimeiroNome()." ". $this->getNomeMeio()." ".$this->getSobrenome();
	}
}
