<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 23/01/2019
 * Time: 5:59 PM
 */

namespace App\Repository\Impl;


use App\Repository\DocumentTypeRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class DocumentTypeRepositoryImpl extends EntityRepository implements DocumentTypeRepository
{
    public function findDocumentTypeById($id)
    {
        return $this->find($id);
    }

    public function findAllDocumentType(){
        return $this->findAll();
    }

    public function saveOrUpdate($data)
    {
        try{
            $this->_em->persist($data);
            $this->_em->flush();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }

    public function findActiveDocumentType()
    {
        return $this->findBy(['isActive'=>1]);
    }
}