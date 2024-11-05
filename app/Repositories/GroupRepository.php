<?php

namespace App\Repositories;


use A17\Twill\Repositories\ModuleRepository;
use App\Models\Group;

class GroupRepository extends ModuleRepository
{
    protected $relatedBrowsers = ['students', 'teachers'];

    public function __construct(Group $model)
    {
        $this->model = $model;
    }
}
