<?php

class IdentificacaoParticipante extends BaseIdentificacaoParticipante
{
    public function __toString()
	{
		return $this->getDescricao();
	}
}
