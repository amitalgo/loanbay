<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 22/11/2018
 * Time: 2:29 PM
 */

namespace App\Service\Impl;


use App\Entities\UserRoleDetail;
use App\Entities\UserRoleDetailImage;
use App\Repository\UserRoleDetailRepository;
use App\Repository\UserRoleRepository;
use App\Service\UserRoleDetailService;
use App\Traits\ImageUpload;

class UserRoleDetailServiceImpl implements UserRoleDetailService
{
    use ImageUpload;
    private $userRoleDetailRepository,$userRoleRepository;

    public function __construct(UserRoleDetailRepository $userRoleDetailRepository,UserRoleRepository $userRoleRepository)
    {
        $this->userRoleDetailRepository=$userRoleDetailRepository;
        $this->userRoleRepository=$userRoleRepository;
    }

    public function saveUserRoleDetail($request)
    {
        $userRoleDet =  new UserRoleDetail();
        $userRoleDet->setName($request->get('name'));
        $userRole=$this->userRoleRepository->findRoleById($request->get('role_type'));
        $userRoleDet->setUserRole($userRole);
        $userRoleDet->setIsActive(1);
        $userRoleDet->setCreatedAt(new \DateTime());
        $userRoleDet->setUpdatedAt(new \DateTime());
        $shortDescs=$request->get('short-desc');
        foreach($shortDescs as $key=>$shortDesc){
            $usrDetImg = new UserRoleDetailImage();
            $usrDetImg->setShortDesc($shortDesc);

            if($request->hasFile('image')) {
                $fileName = $key.time();
                $path = $this->uploadMulImage($request,$fileName,$key);
                $usrDetImg->setImage(asset($path));
            }
            $usrDetImg->setIsActive(1);
            $usrDetImg->setCreatedAt(new \DateTime());
            $usrDetImg->setUpdatedAt(new \DateTime());
            $userRoleDet->addUserRoleDetImg($usrDetImg);
        }
        return $this->userRoleDetailRepository->saveOrUpdateUserRoleDetail($userRoleDet);
    }

    public function updateUserRoleDetail($request,$id)
    {
//        dd($request->all());
        $userRoleDet =  $this->userRoleDetailRepository->findUserRolesDetById($id);
        $userRoleDet->setName($request->get('name'));
        $userRole=$this->userRoleRepository->findRoleById($request->get('role_type'));
        $userRoleDet->setUserRole($userRole);
        $userRoleDet->setIsActive($request->get('status'));
        $userRoleDet->setCreatedAt(new \DateTime());
        $userRoleDet->setUpdatedAt(new \DateTime());
        $groups=$request->get('group');
        $this->userRoleDetailRepository->deleteUserRoleDetailImage($id);
        foreach($groups as $key=>$group){
            $usrDetImg = new UserRoleDetailImage();
            $usrDetImg->setShortDesc($group['short-desc']);

            if(isset($group['imageUrl']) && !empty($group['imageUrl'])){
                $usrDetImg->setImage($group['imageUrl']);
            }else{
                if($group->hasFile('image')) {
                    $fileName = $key.time();
                    $path = $this->uploadImage($group,$fileName);
                    $usrDetImg->setImage(asset($path));
                }
            }
            $usrDetImg->setIsActive(1);
            $usrDetImg->setCreatedAt(new \DateTime());
            $usrDetImg->setUpdatedAt(new \DateTime());
            $userRoleDet->addUserRoleDetImg($usrDetImg);
        }
        return $this->userRoleDetailRepository->saveOrUpdateUserRoleDetail($userRoleDet);
    }

    public function getActiveRoleDetail()
    {
        return $this->userRoleDetailRepository->findActiveRoleDetail();
    }

    public function getUserRolesDetById($id)
    {
        return $this->userRoleDetailRepository->findUserRolesDetById($id);
    }
}