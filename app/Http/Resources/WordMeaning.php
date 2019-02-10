<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class WordMeaning extends Resource
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
            'type' => $this->getType(),
            'meaning' => $this->getMeaning(),
            'synonyms' => $this->getSynonyms(),
            'example' => $this->getExample()
        ];
    }
}
