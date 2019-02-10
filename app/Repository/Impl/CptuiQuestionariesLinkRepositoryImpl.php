<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 25/01/2019
 * Time: 12:06 PM
 */

namespace App\Repository\Impl;


use App\Repository\CptuiQuestionariesLinkRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class CptuiQuestionariesLinkRepositoryImpl extends EntityRepository implements CptuiQuestionariesLinkRepository
{
    public function deleteExistingQuestionaries($id)
    {
        $delete = $this->findBy(['cptui'=>$id]);
        foreach($delete as $data){
            $this->_em->remove($data);
            $this->_em->flush();
        }
        return true;
    }
}