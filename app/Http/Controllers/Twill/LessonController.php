<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\Fields\Files;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use App\Models\Course;

class LessonController extends BaseModuleController
{
    protected $moduleName = 'lessons';
    private static array $formFields;
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->disablePermalink();

        self::$formFields = [
            Input::make()
                ->name('title')
                ->label('Title')
                ->required(),

            Input::make()
                ->name('description')
                ->label('Description')
                ->required(),

            Select::make()
                ->name('course_id')
                ->label('Course')
                ->options(
                    Course::all('id', 'title')
                        ->pluck('title', 'id')
                        ->toArray()
                ),

            Files::make()
                ->name('lesson_files')
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
        $form = parent::getForm($model);

        foreach (self::$formFields as $field) {
            $form->add($field);
        }

        return $form;
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
            Text::make()->field('course_id')->title('Course')->customRender(function ($item) {
                $course = Course::find($item->course_id);
                return $course->title;
            }),
        );

        return $table;
    }
}
