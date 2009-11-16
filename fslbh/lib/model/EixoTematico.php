<?php

class EixoTematico extends BaseEixoTematico
{
    public function __toString()
	{
		return $this->getDescricao();
	}
}
