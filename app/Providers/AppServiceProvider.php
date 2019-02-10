<?php

namespace App\Providers;

use App\Entities\Admin;
use App\Entities\AdminRole;
use App\Entities\CMS;
use App\Entities\ContactUsList;
use App\Entities\Cpiui;
use App\Entities\Cpt;
use App\Entities\CptuiDocumentLink;
use App\Entities\CptuiQuestionariesLink;
use App\Entities\DashboardBanner;
use App\Entities\DocumentType;
use App\Entities\Page;
use App\Entities\Questionaries;
use App\Entities\Role;
use App\Entities\User;
use App\Entities\UserRole;
use App\Entities\UserRoleDetail;

use App\Repositories\CptRepositoryImpl;
use App\Repository\AdminRoleRepository;
use App\Repository\CmsRepository;

use App\Repository\CptRepository;
use App\Repository\CptuiDocumentLinkRepository;
use App\Repository\CptuiQuestionariesLinkRepository;
use App\Repository\CptuiRepository;
use App\Repository\DashboardBannerRepository;
use App\Repository\DocumentTypeRepository;
use App\Repository\EnquiryRepository;
use App\Repository\Impl\AdminRoleRepositoryImpl;
use App\Repository\Impl\CmsRepositoryImpl;
use App\Repository\Impl\CptuiDocumentLinkRepositoryImpl;
use App\Repository\Impl\CptuiQuestionariesLinkRepositoryImpl;
use App\Repository\Impl\CptuiRepositoryImpl;
use App\Repository\Impl\DashboardBannerRepositoryImpl;
use App\Repository\Impl\DocumentTypeRepositoryImpl;
use App\Repository\Impl\EnquiryRepositoryImpl;
use App\Repository\Impl\PageRepositoryImpl;
use App\Repository\Impl\AdminRepositoryImpl;
use App\Repository\Impl\QuestionariesRepositoryImpl;
use App\Repository\Impl\RoleRepositoryImpl;
use App\Repository\Impl\UserRepositoryImpl;
use App\Repository\Impl\UserRoleDetailRepositoryImpl;
use App\Repository\Impl\UserRoleRepositoryImpl;
use App\Repository\PageRepository;
use App\Repository\AdminRepository;
use App\Repository\QuestionariesRepository;
use App\Repository\RoleRepository;
use App\Repository\UserRepository;
use App\Repository\UserRoleDetailRepository;
use App\Repository\UserRoleRepository;
use App\Service\AdminRoleService;
use App\Service\CmsService;
use App\Service\CptService;
use App\Service\CptuiDocumentLinkService;
use App\Service\CptuiQuestionariesLinkService;
use App\Service\CptuiService;
use App\Service\DashboardBannerService;
use App\Service\DocumentTypeService;
use App\Service\EnquiryService;
use App\Service\Impl\AdminRoleServiceImpl;
use App\Service\Impl\CmsServiceImpl;
use App\Service\Impl\CptServiceImpl;
use App\Service\Impl\CptuiDocumentLinkServiceImpl;
use App\Service\Impl\CptuiQuestionariesLinkServiceImpl;
use App\Service\Impl\CptuiServiceImpl;
use App\Service\Impl\DashboardBannerServiceImpl;
use App\Service\Impl\DocumentTypeServiceImpl;
use App\Service\Impl\EnquiryServiceImpl;
use App\Service\Impl\PageServiceImpl;
use App\Service\Impl\AdminServiceImpl;
use App\Service\Impl\QuestionariesServiceImpl;
use App\Service\Impl\RoleServiceImpl;
use App\Service\Impl\UserRoleDetailServiceImpl;
use App\Service\Impl\UserRoleServiceImpl;
use App\Service\Impl\UserServiceImpl;
use App\Service\PageService;
use App\Service\AdminService;
use App\Service\QuestionariesService;
use App\Service\RoleService;
use App\Service\UserRoleDetailService;
use App\Service\UserRoleService;
use App\Service\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){

        Schema::defaultStringLength(191);
        view()->composer('admin.includes.header', function ($view){
            $view->with('profile',Auth::user());
        });

        view()->composer('admin.layouts.admin',function ($view) {
            $view->with('cpts',CptServiceImpl::getAllActiveCpts());
        });

        view()->composer('admin.layouts.admin',function ($view) {
            $view->with('pages',PageServiceImpl::getPages());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(){
        /*
         * Service Binding
         */
        $this->app->bind(AdminService::class, AdminServiceImpl::class);
        $this->app->bind(PageService::class, PageServiceImpl::class);
        $this->app->bind(AdminRoleService::class,AdminRoleServiceImpl::class);
        $this->app->bind(UserService::class, UserServiceImpl::class);
        $this->app->bind(EnquiryService::class,EnquiryServiceImpl::class);
        $this->app->bind(RoleService::class,RoleServiceImpl::class);
        $this->app->bind(CmsService::class,CmsServiceImpl::class);
        $this->app->bind(UserRoleService::class,UserRoleServiceImpl::class);
        $this->app->bind(UserRoleDetailService::class,UserRoleDetailServiceImpl::class);
        $this->app->bind(DashboardBannerService::class,DashboardBannerServiceImpl::class);
        $this->app->bind(CptService::class,CptServiceImpl::class);
        $this->app->bind(CptuiService::class,CptuiServiceImpl::class);
        $this->app->bind(QuestionariesService::class,QuestionariesServiceImpl::class);
        $this->app->bind(DocumentTypeService::class,DocumentTypeServiceImpl::class);
        $this->app->bind(CptuiQuestionariesLinkService::class,CptuiQuestionariesLinkServiceImpl::class);
        $this->app->bind(CptuiDocumentLinkService::class,CptuiDocumentLinkServiceImpl::class);

        /*
         * Repository Binding
         */
        $this->app->bind(CptuiQuestionariesLinkRepository::class, function ($app){
            return new CptuiQuestionariesLinkRepositoryImpl(
                $app['em'],
                $app['em']->getClassMetaData(CptuiQuestionariesLink::class)
            );
        });

        $this->app->bind(CptuiDocumentLinkRepository::class, function ($app){
            return new CptuiDocumentLinkRepositoryImpl(
                $app['em'],
                $app['em']->getClassMetaData(CptuiDocumentLink::class)
            );
        });

        $this->app->bind(CptRepository::class, function ($app){
            return new CptRepositoryImpl(
                $app['em'],
                $app['em']->getClassMetaData(Cpt::class)
            );
        });

        $this->app->bind(DocumentTypeRepository::class, function ($app){
            return new DocumentTypeRepositoryImpl(
                $app['em'],
                $app['em']->getClassMetaData(DocumentType::class)
            );
        });

        $this->app->bind(QuestionariesRepository::class, function ($app){
            return new QuestionariesRepositoryImpl(
                $app['em'],
                $app['em']->getClassMetaData(Questionaries::class)
            );
        });

        $this->app->bind(CptuiRepository::class, function ($app){
            return new CptuiRepositoryImpl(
                $app['em'],
                $app['em']->getClassMetaData(Cpiui::class)
            );
        });

        $this->app->bind(AdminRepository::class, function ($app){
            return new AdminRepositoryImpl(
                $app['em'],
                $app['em']->getClassMetaData(Admin::class)
            );
        });
        $this->app->bind(PageRepository::class, function($app){
            return new PageRepositoryImpl(
                $app['em'],
                $app['em']->getClassMetaData(Page::class)
            );
        });

        $this->app->bind(AdminRoleRepository::class,function($app){
            return new AdminRoleRepositoryImpl(
                $app['em'],
                $app['em']->getClassMetaData(AdminRole::class)
            );
        });

        $this->app->bind(UserRepository::class, function ($app){
            return new UserRepositoryImpl(
                $app['em'],
                $app['em']->getClassMetaData(User::class)
            );
        });

        $this->app->bind(UserRoleRepository::class, function ($app){
            return new UserRoleRepositoryImpl(
                $app['em'],
                $app['em']->getClassMetaData(UserRole::class)
            );
        });

        $this->app->bind(EnquiryRepository::class, function ($app){
            return new EnquiryRepositoryImpl(
                $app['em'],
                $app['em']->getClassMetaData(ContactUsList::class)
            );
        });

        $this->app->bind(RoleRepository::class, function ($app){
            return new RoleRepositoryImpl(
                $app['em'],
                $app['em']->getClassMetaData(Role::class)
            );
        });

        $this->app->bind(CmsRepository::class, function ($app){
            return new CmsRepositoryImpl(
                $app['em'],
                $app['em']->getClassMetaData(CMS::class)
            );
        });

        $this->app->bind(UserRoleDetailRepository::class,function($app){
            return new UserRoleDetailRepositoryImpl(
              $app['em'],
              $app['em']->getClassMetaData(UserRoleDetail::class)
            );
        });

        $this->app->bind(DashboardBannerRepository::class,function($app){
            return new DashboardBannerRepositoryImpl(
              $app['em'],
              $app['em']->getClassMetaData(DashboardBanner::class)
            );
        });
    }
}
