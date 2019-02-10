<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 21/01/2019
 * Time: 5:21 PM
 */

namespace App\Service\Impl;


use App\Entities\Questionaries;
use App\Repository\QuestionariesRepository;
use App\Service\QuestionariesService;
use Faker\Provider\DateTime;

class QuestionariesServiceImpl implements QuestionariesService
{
    public $questionariesRepository;

    public function __construct(QuestionariesRepository $questionariesRepository)
    {
        $this->questionariesRepository=$questionariesRepository;
    }

    public function getAllQuestionaries(){
        return $this->questionariesRepository->findAllQuestionaries();
    }

    public function saveQuestionaries($result)
    {
        $questionaries = new Questionaries();
        $optionsVal = '';
        if(null!=$result->get('options')){
            $options = $result->get('options');
            $optionsVal = explode(PHP_EOL,trim($options));
            $questionaries->setOptions(implode(',',$optionsVal));
        }
        $questionaries->setType($result->get('type'));
        $questionaries->setQuestionText($result->get('question'));
        $questionaries->setIsMandatory($result->get('mandatory'));
        $questionaries->setIsActive(1);
        $questionaries->setCreatedAt(new \DateTime());
        $questionaries->setUpdatedAt(new \DateTime());
        return $this->questionariesRepository->saveOrUpdateQuestionaries($questionaries);
    }

    public function getQuestionariesById($id){
        return $this->questionariesRepository->findQuestionariesById($id);
    }

    public function updateQuestionariesById($request,$id){
        $question = $this->questionariesRepository->findQuestionariesById($id);
        if(null!=$request->get('options')){
            $options = $request->get('options');
            $optionsVal = explode(PHP_EOL,trim($options));
            $question->setOptions(implode(',',$optionsVal));
        }
        $question->setType($request->get('type'));
        $question->setQuestionText($request->get('question'));
        $question->setIsMandatory($request->get('mandatory'));
        $question->setIsActive($request->get('status'));
        $question->setUpdatedAt(new \DateTime());
        return $this->questionariesRepository->saveOrUpdateQuestionaries($question);
    }

    public function getAllActiveQuestionaries()
    {
        return $this->questionariesRepository->findAllActiveQuestionaries();
    }
}