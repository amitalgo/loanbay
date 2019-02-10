<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 05/10/2018
 * Time: 3:50 PM
 */

namespace App\Service\Impl;


use App\Entities\Admin;
use App\Entities\AdminRole;
use App\Helper\FileUploadHelper;
use App\Repository\AdminRepository;
use App\Repository\AdminRoleRepository;
use App\Repository\RoleRepository;
use App\Service\AdminService;
use App\Traits\ImageUpload;
use Illuminate\Support\Facades\Hash;

class AdminServiceImpl implements  AdminService {

    use ImageUpload;
    private $adminRepository,$adminRoleRepository,$roleRepository;

    public function __construct(AdminRepository $adminRepository,AdminRoleRepository $adminRoleRepository,RoleRepository $roleRepository){
        $this->adminRepository = $adminRepository;
        $this->adminRoleRepository=$adminRoleRepository;
        $this->roleRepository=$roleRepository;
    }

    public function getUsers(){

    }

    public function getActiveUsers(){
        return $this->adminRepository->findActiveUsers();
    }

    public function getAdminById($id){
        return $this->adminRepository->findAdminById($id);
    }

    public function saveAdmin($request){
        $admin = new Admin();
        $admin->setFirstName($request->get('first-name'));
        $admin->setLastName($request->get('last-name'));
        $admin->setEmail($request->get('email'));
        $admin->setPassword(bcrypt($request->get('cpassword')));
        $admin->setContactNumber($request->get('contact'));
        $admin->setIsActive($request->get('status'));
        $admin->setCreatedAt(new \DateTime());
        $admin->setUpdatedAt(new \DateTime());
        if($request->hasFile('image')) {
            $fileName = $request->get('first-name').time();
            $path = $this->uploadImage($request, $fileName);
            $admin->setProfileImage(asset($path));
        }

        if(null==($request->get('isAdmin'))) {
            $admin->setIsSuperUser(0);
            $adminRole= new AdminRole();
            $adminRole->setRoleId($this->roleRepository->findActiveRoleById($request->get('role')));
            $adminRole->setCreatedAt(new \DateTime());
            $adminRole->setUpdatedAt(new \DateTime());
            $adminRole->setIsActive($request->get('status'));

            $admin->addAdminRole($adminRole);

            $admin->addAdminRole($adminRole);
        }else{
            $admin->setIsSuperUser($request->get('isAdmin'));
        }
        return $this->adminRepository->saveOrUpdateAdmin($admin);
    }

    public function updateAdmin($request, $id){
        $admin = $this->adminRepository->findAdminById($id);
        $admin->setFirstName($request->get('first-name'));
        $admin->setLastName($request->get('last-name'));
        $admin->setEmail($request->get('email'));
        $admin->setIsActive($request->get('status'));
        if($request->hasFile('image')) {
            $fileName = $request->get('first-name').time();
            $path = $this->uploadImage($request, $fileName);
            $admin->setProfileImage(asset($path));
        }

        // To Check whether updating personal account or updating form Admin CRUD
        if(null==$request->get('account')) {
            $admin_roles = $this->adminRoleRepository->deleteExistingAdminRole($id);
            if (null == ($request->get('isAdmin'))) {
                $admin->setIsSuperUser(0);
                $adminRole = new AdminRole();
                $adminRole->setRoleId($this->roleRepository->findActiveRoleById($request->get('role')));
                $adminRole->setCreatedAt(new \DateTime());
                $adminRole->setUpdatedAt(new \DateTime());
                $adminRole->setIsActive(1);
                $admin->addAdminRole($adminRole);
                $admin->addAdminRole($adminRole);
            } else {
                $admin->setIsSuperUser($request->get('isAdmin'));
            }
        }

        return $this->adminRepository->saveOrUpdateAdmin($admin);
    }

    public function updatePassword($request, $id){
        $user = $this->adminRepository->findAdminById($id);
        $user->setPassword(Hash::make($request->get('new-password')));
        return $this->adminRepository->saveOrUpdateAdmin($user);
    }
}