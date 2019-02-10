<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 18/01/2019
 * Time: 4:28 PM
 */

namespace App\Service\Impl;


use App\Entities\Cpiui;
use App\Entities\CptuiDocumentLink;
use App\Entities\CptuiQuestionariesLink;
use App\Entities\Questionaries;
use App\Repository\CptRepository;
use App\Repository\CptuiDocumentLinkRepository;
use App\Repository\CptuiQuestionariesLinkRepository;
use App\Repository\CptuiRepository;
use App\Repository\DocumentTypeRepository;
use App\Repository\QuestionariesRepository;
use App\Service\CptuiService;
use App\Traits\ImageUpload;

class CptuiServiceImpl implements CptuiService
{
    use ImageUpload;
    private $cptuirepository,$cptrepository,$questionRepository,$documentTypeRepository,$cptuiQuestionariesLinkRepository,$cptuiDocumentLinkRepository;

    public function __construct(CptuiRepository $cptuiRepository,CptRepository $cptrepository,QuestionariesRepository $questionariesRepository,DocumentTypeRepository $documentTypeRepository,CptuiQuestionariesLinkRepository $cptuiQuestionariesLinkRepository,CptuiDocumentLinkRepository $cptuiDocumentLinkRepository){
        $this->cptuirepository=$cptuiRepository;
        $this->cptrepository = $cptrepository;
        $this->questionRepository = $questionariesRepository;
        $this->documentTypeRepository= $documentTypeRepository;
        $this->cptuiQuestionariesLinkRepository=$cptuiQuestionariesLinkRepository;
        $this->cptuiDocumentLinkRepository=$cptuiDocumentLinkRepository;
    }

    public function getCpiuiByCptId($cptId,$order,$limit){
        return $this->cptuirepository->findCpiuiByCptId($cptId,$order, $limit);
    }

    public function getCpiuiBySlug($slug){
        return $this->cptuirepository->findCpiuiBySlug($slug);
    }

    public function getAllCpiuis(){
        return $this->cptuirepository->findAllCpiuis();
    }

    public function getCpiuiById($id){
        return $this->cptuirepository->findCpiuiById($id);
    }

    public function getAllActiveCpiuis(){
        return $this->cptuirepository->findAllActiveCpiuis();
    }

    public function saveCpiui($data){
        $cpiui = new Cpiui();
        $cpts=$this->cptrepository->findCptBySlug($data->input('slug'));
        $cpiui->setTitle($data->input('title'));
        $cpiui->setCptid($cpts);
        $cpiui->setDescription($data->input('description'));
        if(!empty($data->input('parent'))){
            $parent=$this->cptuirepository->findCpiuiById($data->input('parent'));
            $cpiui->setParent($parent);
        }
        $cpiu =json_encode($data->get('df'));
        $cpiui->setSlug(str_slug(trim($data->input('title')),'-'));
        $cpiui->setAttribute($cpiu);
        $cpiui->setIsActive(1);
        $cpiui->setUpdatedAt(new \DateTime());
        $cpiui->setCreatedAt(new \DateTime());

        // For Uploading Image
        if($data->hasFile('image')){
            $fileName = $data->get('title').time();
            $path = $this->uploadImage($data, $fileName);
            $cpiui->setFeaturedimg(asset($path));
        }

        // For Inserting Question Link
        if(is_array($data->get('question'))){
            $questions = $data->get('question');
            foreach($questions as $question){
                $questionlink = new CptuiQuestionariesLink();
                $questiondata = $this->questionRepository->findQuestionariesById($question);
                $questionlink->setQuestionaries($questiondata);
                $questionlink->setType(1);
                $questionlink->setIsActive(1);
                $questionlink->setCreatedAt(new \DateTime());
                $questionlink->setUpdatedAt(new \DateTime());
                $cpiui->addQuestionariesLink($questionlink);
            }
        }

        // For Inserting Document Link
        if(is_array($data->get('document'))){
            $documents = $data->get('document');
            foreach($documents as $document){
                $documentlink = new CptuiDocumentLink();
                $documentdata = $this->documentTypeRepository->findDocumentTypeById($document);
                $documentlink->setDocument($documentdata);
                $documentlink->setType(1);
                $documentlink->setIsActive(1);
                $documentlink->setCreatedAt(new \DateTime());
                $documentlink->setUpdatedAt(new \DateTime());
                $cpiui->addDocumentLink($documentlink);
            }
        }

        return $this->cptuirepository->saveOrUpdateCpiui($cpiui);
    }

    public function updateCpiui($data,$id)
    {
        $cpiui = $this->cptuirepository->findCpiuiById($id);
        $cpiui->setTitle($data->input('title'));
        $cpiui->setDescription($data->input('description'));
        if(!empty($data->input('parent'))){
            $parent=$this->cptuirepository->findCpiuiById($data->input('parent'));
            $cpiui->setParent($parent);
        }
        $attr =json_encode($data->get('df'));
        $cpiui->setAttribute($attr);
        $cpiui->setIsActive($data->get('status'));
        $cpiui->setUpdatedAt(new \DateTime());
        $cpiui->setCreatedAt(new \DateTime());

        // For Uploading Image
        if($data->hasFile('image')) {
            $fileName = $data->get('title').time();
            $path = $this->uploadImage($data, $fileName);
            $cpiui->setFeaturedimg(asset($path));
        }

        // For Updating Question Link
        $this->cptuiQuestionariesLinkRepository->deleteExistingQuestionaries($cpiui);
        if(is_array($data->get('question'))){
            $questions = $data->get('question');
            foreach($questions as $question){
                $questionlink = new CptuiQuestionariesLink();
                $questiondata = $this->questionRepository->findQuestionariesById($question);
                $questionlink->setQuestionaries($questiondata);
                $questionlink->setType(1);
                $questionlink->setIsActive(1);
                $questionlink->setCreatedAt(new \DateTime());
                $questionlink->setUpdatedAt(new \DateTime());
                $cpiui->addQuestionariesLink($questionlink);
            }
        }

        // For Updating Document Link
        $this->cptuiDocumentLinkRepository->deleteExistingDocument($cpiui);
        if(is_array($data->get('document'))){
            $documents = $data->get('document');
            foreach($documents as $document){
                $documentlink = new CptuiDocumentLink();
                $documentdata = $this->documentTypeRepository->findDocumentTypeById($document);
                $documentlink->setDocument($documentdata);
                $documentlink->setType(1);
                $documentlink->setIsActive(1);
                $documentlink->setCreatedAt(new \DateTime());
                $documentlink->setUpdatedAt(new \DateTime());
                $cpiui->addDocumentLink($documentlink);
            }
        }

        return $this->cptuirepository->saveOrUpdateCpiui($cpiui);

    }
    public function deleteCpiui($id)
    {
        return $this->cptuirepository->deleteCpiui($id);
    }

    public function getActiveCpiui($id,$title,$image,$description)
    {
        if($id != null){
            return $this->cptuirepository->findCpiuiById($id);
        }else{
            return $this->cptuirepository->findCpiui($title,$image,$description);
        }
    }

    public function getCptuiByParent($parent)
    {
        return $this->cptuirepository->findCptuiByParent($parent);
    }
}