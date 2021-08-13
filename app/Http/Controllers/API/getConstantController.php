<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DegreeResource;
use App\Http\Resources\SkillResource;
use App\Http\Resources\UniversityResource;
use App\Http\Resources\SpecializeResource;
use App\Models\Degree;
use App\Models\Skill;
use App\Models\Specialize;
use Str;

class getConstantController extends Controller
{
    public function getConstant()
    {
        $skills = Skill::all();
        $degrees = Degree::all();
        $universities = Skill::all();
        $specialize = Specialize::all();

        return $this->sendResponse([
            'skills' => SkillResource::collection($skills),
            'degrees' => DegreeResource::collection($degrees),
            'universities' => UniversityResource::collection($universities),
            'specialize' => SpecializeResource::collection($specialize),
        ]);
    }
}

