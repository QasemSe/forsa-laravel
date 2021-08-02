<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DegreeResource;
use App\Http\Resources\SkillResource;
use App\Http\Resources\UniversityResource;
use App\Models\Degree;
use App\Models\Skill;
use Str;

class getConstantController extends Controller
{
    public function getConstant()
    {
        $skills = Skill::all();
        $degrees = Degree::all();
        $universities = Skill::all();

        return $this->sendResponse([
            'skills' => SkillResource::collection($skills),
            'degrees' => DegreeResource::collection($degrees),
            'universities' => UniversityResource::collection($universities),
        ]);
    }
}
