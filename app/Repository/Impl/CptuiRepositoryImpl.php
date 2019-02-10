<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 18/01/2019
 * Time: 4:29 PM
 */

namespace App\Repository\Impl;


use App\Repository\CptuiRepository;
use Doctrine\ORM\EntityRepository;

class CptuiRepositoryImpl extends EntityRepository implements CptuiRepository
{

    public function findAllActiveCpiuis()
    {
        return $this->findBy(['isActive'=>1]);
    }

    public function findAllCpiuis()
    {
        return $this->findAll();
    }

    public function findCpiuiByCptId($cptId, $order, $limit)
    {
        return $this->findBy(array('cptid'=>$cptId), ['createdAt'=>($order==''?'ASC':$order)], $limit,null);
    }

    public function findCpiuiById($id)
    {
        return $this->find($id);
    }

    public function findCpiuiBySlug($slug)
    {
        return $this->findOneBy(['slug'=>$slug]);
    }

    public function findCpiui($title, $image, $description)
    {
        return $this->findBy(array(),['title'=>$title->input('title')],['image'=>$image->input('featuredImage')],['description'=>$description->input('description')]);
    }

    public function saveOrUpdateCpiui($data)
    {
        try{
            $this->_em->persist($data);
            $this->_em->flush();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }

    public function deleteCpiui($id)
    {
        $delete = $this->find($id);
        $this->_em->remove($delete);
        $this->_em->flush();
        return true;
    }

    public function findCptuiByParent($parent)
    {
        return $this->findBy(['parent'=>$parent]);
    }
}