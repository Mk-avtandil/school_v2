<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Solution;

class SolutionRepository extends ModuleRepository
{
    use HandleMedias, HandleFiles;

    public function __construct(Solution $model)
    {
        $this->model = $model;
    }
}
