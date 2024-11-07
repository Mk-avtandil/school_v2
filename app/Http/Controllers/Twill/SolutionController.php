<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\Fields\Files;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use App\Models\Homework;
use App\Models\Lesson;
use App\Models\Student;

class SolutionController extends BaseModuleController
{
    protected $moduleName = 'solutions';

    private static array $formFields;
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->disablePermalink();

        self::$formFields = [
            Select::make()
                ->name('homework_id')
                ->label('Homework')
                ->options(
                    Homework::with('lesson')
                        ->get()
                        ->pluck('lesson.title', 'id')
                        ->mapWithKeys(function ($lessonTitle, $homeworkId) {
                            $homework = Homework::find($homeworkId);
                            return [$homeworkId => $lessonTitle . ' - ' . $homework->title];
                        })
                        ->toArray()
                ),

                Select::make()
                    ->name('student_id')
                    ->label('Student')
                    ->options(
                        Student::all('id', 'first_name')
                            ->pluck('first_name', 'id')
                            ->toArray()
                    ),

                Input::make()
                    ->name('title')
                    ->label('Title'),

                Input::make()
                    ->name('description')
                    ->label('Description'),

                Files::make()
                    ->name('solution_files')
                    ->label('Files')
                    ->note('Choose files to upload')
                    ->max(5)

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
            Text::make()->field('description')->title('Description')
        );

        $table->add(
            Text::make()->field('student_id')->title('Student')->customRender(function ($item) {
                $student = Student::find($item->student_id);
                return $student->first_name . ' ' . $student->last_name;
            }),
        );

        $table->add(
            Text::make()->field('homework_id')->title('Homework')->customRender(function ($item) {
                $homework = Homework::find($item->homework_id);
                return $homework->title;
            }),
        );

        return $table;
    }
}
