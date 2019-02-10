<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 05/10/2018
 * Time: 3:50 PM
 */

namespace App\Service\Impl;


use App\Entities\User;
use App\Helper\FileUploadHelper;
use App\Repository\UserRepository;
use App\Repository\UserRoleRepository;
use App\Service\UserService;
use App\Traits\ImageUpload;
use Illuminate\Support\Facades\Hash;

class UserServiceImpl extends FileUploadHelper implements  UserService {

    use ImageUpload;

    private $userRepository;
    private $userRoleRepository;

    public function __construct(UserRepository $userRepository, UserRoleRepository $userRoleRepository){
        $this->userRepository = $userRepository;
        $this->userRoleRepository = $userRoleRepository;
    }

    public function getUsers(){

    }

    public function getActiveUsers(){
        return $this->userRepository->findActiveUsers();
    }

    public function getUser($id){
        return $this->userRepository->findUser($id);
    }

    public function saveUser($request){
        $user = new User();
        $user->setFirstName($request->get('firstName'));
        $user->setLastName($request->get('lastName'));
        $user->setEmail($request->get('email'));
        if(null!=$request->get('status')){
            $user->setIsActive($request->get('status'));
        }else{
            $user->setIsActive(1);
        }

        if($request->hasFile('image')) {
            $fileName = $request->get('firstName').time();
            $path = $this->uploadImage($request, $fileName);
            $user->setProfileImage(asset($path));
        }

//        $user->setLocation($request->get('location'));
//        $user->setAadharNo($request->get('aadhar'));
//        $user->setAddress($request->get('address'));
        $user->setPanNo($request->get('pan'));
//        $user->setState($request->get('state'));
        $user->setCreatedAt(new \DateTime('now'));
        $user->setContactNumber($request->get('contactNumber'));
        if(null!==$request->get('password')){
            $user->setPassword(Hash::make($request->get('password')));
        }
//        $user->setUserRole($this->userRoleRepository->findRoleByName($request->get('role')));
        return $this->userRepository->saveOrUpdateUser($user);
    }

    public function updateUser($request, $id){
        $user = $this->userRepository->findUser($id);
        $user->setFirstName($request->get('firstName'));
        $user->setLastName($request->get('lastName'));
        $user->setEmail($request->get('email'));
        $user->setContactNumber($request->get('contactNumber'));
        $user->setLocation($request->get('location'));
        $user->setIsActive($request->get('status'));
        return $this->userRepository->saveOrUpdateUser($user);
    }

    public function updatePassword($request, $id){
        $user = $this->userRepository->findUser($id);
        $user->setPassword(Hash::make($request->get('password')));
        return $this->userRepository->saveOrUpdateUser($user);
    }

    public function updateProfilePicture($request, $id){
        $user = $this->userRepository->findUser($id);
        if($request->hasFile('image')){
            $fileName = $user->getFirstName().$user->getId().time();
            $path = $this->uploadImage($request, $fileName);
            $user->setProfileImage(asset($path));
            return $this->userRepository->saveOrUpdateUser($user);
        }else{
            return false;
        }
    }

    public function getUserBy($criteria){
        return $this->userRepository->findUserBy($criteria);
    }
}