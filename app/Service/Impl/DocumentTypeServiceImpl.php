<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 23/01/2019
 * Time: 6:11 PM
 */

namespace App\Service\Impl;


use App\Entities\DocumentType;
use App\Repository\DocumentTypeRepository;
use App\Service\DocumentTypeService;

class DocumentTypeServiceImpl implements DocumentTypeService
{
    private $documentTypeRepository;
    public function __construct(DocumentTypeRepository $documentTypeRepository)
    {
        $this->documentTypeRepository=$documentTypeRepository;
    }

    public function getAllDocumentType()
    {
        return $this->documentTypeRepository->findAllDocumentType();
    }

    public function getDocumentTypeById($id)
    {
        return $this->documentTypeRepository->findDocumentTypeById($id);
    }

    public function saveDocumentType($data)
    {
        $documentType = new DocumentType();
        $documentType->setType($data->get('title'));
        $documentType->setIsMandatory($data->get('isMandatory'));
        $documentType->setIsActive(1);
        $documentType->setCreatedAt(new \DateTime());
        $documentType->setUpdatedAt(new \DateTime());
        return $this->documentTypeRepository->saveOrUpdate($documentType);
    }

    public function updateDocumentType($data, $id)
    {
        $documentType = $this->documentTypeRepository->findDocumentTypeById($id);
        $documentType->setType($data->get('title'));
        $documentType->setIsActive($data->get('status'));
        $documentType->setIsMandatory($data->get('isMandatory'));
        $documentType->setCreatedAt(new \DateTime());
        $documentType->setUpdatedAt(new \DateTime());
        return $this->documentTypeRepository->saveOrUpdate($documentType);
    }

    public function getActiveDocumentType()
    {
        return $this->documentTypeRepository->findActiveDocumentType();
    }
}