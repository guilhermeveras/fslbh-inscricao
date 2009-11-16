<?php

class TrabalhoPeer extends BaseTrabalhoPeer
{
    public static function doSelectMine(Criteria $criteria, PropelPDO $con = null)
	{
		$c = new Criteria();
		$c->add(ComissaoPeer::USUARIO_ID, sfContext::getInstance()->getUser()->getGuardUser()->getId());
		
		$membro = ComissaoPeer::doSelectOne($c);
		
		$ids = array();
		
		if ($membro)
		{
			foreach ($membro->getTrabalhosAvaliadors() as $t)
			{
				array_push($ids, $t->getTrabalhoId());
			}
		}
		
		$criteria->add(TrabalhoPeer::ID, $ids, Criteria::IN);
		$criteria->add(TrabalhoPeer::APROVADO, NULL, Criteria::ISNULL);
		
		return TrabalhoPeer::populateObjects(TrabalhoPeer::doSelectStmt($criteria, $con));
	}
}
