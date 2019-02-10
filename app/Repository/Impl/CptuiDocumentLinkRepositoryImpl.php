<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 25/01/2019
 * Time: 2:43 PM
 */

namespace App\Repository\Impl;


use App\Repository\CptuiDocumentLinkRepository;
use Doctrine\ORM\EntityRepository;

class CptuiDocumentLinkRepositoryImpl extends EntityRepository implements CptuiDocumentLinkRepository
{
    public function deleteExistingDocument($id)
    {
        $datas = $this->findBy(['cptui'=>$id]);
        foreach($datas as $data){
            $this->_em->remove($data);
            $this->_em->flush();
        }
        return true;
    }
}