<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 18/01/2019
 * Time: 12:18 PM
 */

namespace App\Service\Impl;


use App\Entities\Cpt;
use App\Repository\CptRepository;
use App\Service\CptService;

class CptServiceImpl implements CptService
{
    public static $cptRepository;

    public function __construct(CptRepository $cptRepository)
    {
       self::$cptRepository=$cptRepository;
    }

    public function getAllCpts()
    {
        return self::$cptRepository->findAllCpts();
    }

    public static function getCptById($id)
    {
        return self::$cptRepository->findCptById($id);
    }

    public static function getAllActiveCpts(){
        return self::$cptRepository->findAllActiveCpts();
    }

    public static function getAllBySlug($slug)
    {
        return self::$cptRepository->findCptBySlug($slug);
    }

    public function saveCpt($data)
    {
        $cpt = new Cpt();
        $attr = [];
        if(is_array($data->get('attrb'))){
            foreach($data->get('attrb') as $key=>$value){
                if($value['label']!='' && $value['datatype']!=''){
                    $value['key']=trim($this->slugify($value['label']));
                    $attr[]=$value;
                }
            }
        }
        $cpt->setTitle($data->input('title'));
        $cpt->setSlug(str_slug(trim($data->input('title')),'-'));
        $cpt->setAttribute(json_encode($attr));
        $cpt->setIsActive(1);
        $cpt->setUpdatedAt(new \DateTime());
        $cpt->setCreatedAt(new \DateTime());
        return self::$cptRepository->saveOrUpdate($cpt);
    }

    public function updateCpt($data,$id)
    {
        $attr = [];
        if(is_array($data->input('attrb'))){
            foreach($data->input('attrb') as $key=>$value){
                if($value['label']!='' && $value['datatype']!=''){
                    $value['key']=$this->slugify($value['label']);
                    $attr[]=$value;
                }
            }
        }

        $cpt= self::$cptRepository->findCptById($id);
        $cpt->setTitle($data->input('title'));
//       $cpt->setSlug(str_slug(trim($data->input('title')),'-'));
        $cpt->setAttribute(json_encode($attr));
        $cpt ->setIsActive($data->get('status'));
        $cpt ->setUpdatedAt(new \DateTime());
        $cpt ->setCreatedAt(new \DateTime());
        return self::$cptRepository->saveOrUpdate($cpt);
    }

    // To Generate Slug
    function slugify ($string) {
        $string = utf8_encode($string);
        $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        $string = preg_replace('/[^a-z0-9- ]/i', '', $string);
        $string = str_replace(' ', '_', $string);
        $string = trim($string, '_');
        $string = strtolower($string);

        if (empty($string)) {
            return 'n-a';
        }

        return $string;
    }

    public function deleteCpt($id)
    {
        return self::$cptRepository->deleteCpt($id);
    }

    public function getCpt($id)
    {
        return self::$cptRepository->findCptById($id);
    }
}