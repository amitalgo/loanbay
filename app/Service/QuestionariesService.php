<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 21/01/2019
 * Time: 5:20 PM
 */

namespace App\Service;


interface QuestionariesService
{
    public function getAllQuestionaries();

    public function saveQuestionaries($result);

    public function getQuestionariesById($id);

    public function updateQuestionariesById($request,$id);

    public function getAllActiveQuestionaries();
}