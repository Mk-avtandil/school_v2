<?php
return [
    'courses' => [
        'title' => 'Courses',
        'route' => 'twill.courses.index',
        'primary_navigation' => [
            'groups' => [
                'title' => 'Groups',
                'module' => true,
            ],
            'lessons' => [
                'title' => 'Lessons',
                'module' => true,
            ]
        ]
    ],
    'students' => [
        'title' => 'Students',
        'route' => 'twill.students.index',
    ],
    'teachers' => [
        'title' => 'Teachers',
        'route' => 'twill.teachers.index',
    ],
    'homeworks' => [
        'title' => 'Homeworks',
        'route' => 'twill.homeworks.index',
    ]
];
