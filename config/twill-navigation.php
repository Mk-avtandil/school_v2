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
            ],
            'homeworks' => [
                'title' => 'Homeworks',
                'module' => true,
                'secondary_navigation' => [
                    'solutions' => [
                        'title' => 'Solutions',
                        'module' => true,
                    ],
                    'grades' => [
                        'title' => 'Grades',
                        'module' => true,
                    ]
                ]
            ],
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
];
