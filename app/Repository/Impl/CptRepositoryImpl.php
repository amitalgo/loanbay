<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 18/01/2019
 * Time: 12:19 PM
 */

namespace App\Repositories;


use App\Repository\CptRepository;
use Doctrine\ORM\EntityRepository;

class CptRepositoryImpl extends EntityRepository implements CptRepository
{
    public function findAllActiveCpts()
    {
        return $this->findBy(['isActive'=>1]);
    }

    public function findAllCpts()
    {
        return $this->findAll();
    }

    public function findCptById($id)
    {
        return $this->find($id);
    }

    public function findCptBySlug($slug)
    {
        return $this->findOneBy(['slug'=>$slug]);
    }

    public function deleteCpt($id)
    {
        $delete = $this->find($id);
        $this->_em->remove($delete);
        $this->_em->flush();
        return true;
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
}