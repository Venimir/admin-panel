<?php

namespace App\Services;

use App\Models\Adds;
use App\Models\AddTemplates;

class AddTemplateService
{
    public function createTemplate(Adds $add)
    {
        return  AddTemplates::create([
               'title' => $add->title,
               'description' => $add->description,
               'status' => 'draft',
               'canva_url' => $add->url,
               'add_id' => $add->id
           ]);
    }

}
