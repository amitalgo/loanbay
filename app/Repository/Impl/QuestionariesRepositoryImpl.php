<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 21/01/2019
 * Time: 5:22 PM
 */

namespace App\Repository\Impl;


use App\Repository\QuestionariesRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Mockery\Exception;

class QuestionariesRepositoryImpl extends EntityRepository implements QuestionariesRepository
{
    public function findAllQuestionaries(){
        return $this->findAll();
    }

    public function saveOrUpdateQuestionaries($data)
    {
        try{
            $this->_em->persist($data);
            $this->_em->flush();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    public function findQuestionariesById($id)
    {
        return $this->findOneBy(['id'=>$id]);
    }

    public function findAllActiveQuestionaries(){
        return $this->findBy(['isActive'=>1]);
    }
}