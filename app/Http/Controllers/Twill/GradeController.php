<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use App\Models\Homework;
use App\Models\Solution;
use App\Models\Student;
use App\Models\Teacher;

class GradeController extends BaseModuleController
{
    protected $moduleName = 'grades';
    protected $titleColumnKey = 'grade';
    protected $titleColumnLabel = 'Grade';
    private static array $formFields;
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->disablePermalink();

        self::$formFields = [
            Select::make()
                ->name('solution_id')
                ->label('Solution')
                ->options(
                    Solution::all()->mapWithKeys(function ($solution) {
                        $homeworkTitle = $solution->homework->title;
                        $lessonTitle = $solution->homework->lesson->title;
                        $courseTitle = $solution->homework->lesson->course->title;
                        $student = $solution->student->first_name . ' ' . $solution->student->last_name;

                        return [
                            $solution->id => "{$courseTitle}//{$lessonTitle}//{$homeworkTitle}//{$student}"
                        ];
                    })->toArray()
                ),

            Select::make()
                ->name('student_id')
                ->label('Student')
                ->options(
                    Student::all('id', 'first_name')
                        ->pluck('first_name', 'id')
                        ->toArray()
                ),

            Select::make()
                ->name('teacher_id')
                ->label('Teacher')
                ->options(
                    Teacher::all('id', 'first_name')
                        ->pluck('first_name', 'id')
                        ->toArray()
                ),

            Input::make()
                ->name('grade')
                ->label('Grade'),

            Input::make()
                ->name('feedback')
                ->label('Feedback'),

        ];
    }

    public function getCreateForm(): Form
    {
        return Form::make(self::$formFields);
    }

    /**
     * See the table builder docs for more information. If you remove this method you can use the blade files.
     * When using twill:module:make you can specify --bladeForm to use a blade form instead.
     */
    public function getForm(TwillModelContract $model): Form
    {
        return Form::make(self::$formFields);
    }

    /**
     * This is an example and can be removed if no modifications are needed to the table.
     */
    protected function additionalIndexTableColumns(): TableColumns
    {
        $table = parent::additionalIndexTableColumns();

        $table->add(
            Text::make()->field('feedback')->title('Feedback')
        );

        $table->add(
            Text::make()->field('student_id')->title('Student')->customRender(function ($item) {
                $student = Student::find($item->student_id);
                return $student->first_name . ' ' . $student->last_name;
            })
        );

        $table->add(
            Text::make()->field('teacher_id')->title('Teacher')->customRender(function ($item) {
                $teacher = Teacher::find($item->teacher_id);
                return $teacher->first_name . ' ' . $teacher->last_name;
            })
        );

//        $table->add(
//            Text::make()->field('solution_id')->title('Homework')->customRender(function ($item) {
//                $solution = Solution::find($item->solution_id);
//                return $solution->title;
//            })
//        );

        return $table;
    }
}
