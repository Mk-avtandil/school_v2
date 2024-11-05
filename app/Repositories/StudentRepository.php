<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Student;

class StudentRepository extends ModuleRepository
{
    use HandleMedias;

    public function __construct(Student $model)
    {
        $this->model = $model;
    }
}
