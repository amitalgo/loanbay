<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Word extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'word' => $this->getWord(),
            'pinyinWord' => $this->getPinyinWord(),
            'wordMeaning' => new WordMeaningCollection(collect($this->getWordId()))
        ];
    }
}
