<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 25/01/2019
 * Time: 2:16 PM
 */

namespace App\Service\Impl;


use App\Repository\CptuiDocumentLinkRepository;
use App\Service\CptuiDocumentLinkService;

class CptuiDocumentLinkServiceImpl implements CptuiDocumentLinkService
{
    private $cptuiDocumentLinkRepository;

    public function __construct(CptuiDocumentLinkRepository $cptuiDocumentLinkRepository)
    {
        $this->cptuiDocumentLinkRepository=$cptuiDocumentLinkRepository;
    }

    public function deleteExistingDocument($id)
    {
        return $this->cptuiDocumentLinkRepository->deleteExistingDocument($id);
    }
}