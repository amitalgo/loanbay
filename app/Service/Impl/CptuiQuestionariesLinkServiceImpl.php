<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 25/01/2019
 * Time: 12:02 PM
 */

namespace App\Service\Impl;


use App\Repository\CptuiQuestionariesLinkRepository;
use App\Service\CptuiQuestionariesLinkService;

class CptuiQuestionariesLinkServiceImpl implements CptuiQuestionariesLinkService
{
    private $cptuiQuestionariesLinkRepository;

    public function __construct(CptuiQuestionariesLinkRepository $cptuiQuestionariesLinkRepository)
    {
        $this->cptuiQuestionariesLinkRepository=$cptuiQuestionariesLinkRepository;
    }

    public function deleteExistingQuestionaries($id)
    {
        return $this->cptuiQuestionariesLinkRepository->deleteExistingQuestionaries($id);
    }
}