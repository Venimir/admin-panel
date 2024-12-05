<?php

namespace App\Services;

use App\Models\Adds;
use App\Models\AddTemplates;

class AddTemplateService
{
    public function createAddTemplate(Adds $add)
    {
       $template = AddTemplates::create([
           'title' => $add->title,
           'description' => $add->description,
           'status' => 'draft',
           'canva_url' => '',
           'add_id' => $add->id
       ]);
        $add->update(['status' => 'complete']);
    }



}
