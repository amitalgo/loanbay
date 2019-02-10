<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 21/01/2019
 * Time: 5:21 PM
 */

namespace App\Repository;


interface QuestionariesRepository
{
    public function findAllQuestionaries();

    public function saveOrUpdateQuestionaries($data);

    public function findQuestionariesById($id);

    public function findAllActiveQuestionaries();
}