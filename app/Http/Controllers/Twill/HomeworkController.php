<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\Fields\DatePicker;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\Filters\BasicFilter;
use A17\Twill\Services\Listings\Filters\TableFilters;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Builder;

class HomeworkController extends BaseModuleController
{
    protected $moduleName = 'homeworks';
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->disablePermalink();
    }

    public function getCreateForm(): Form
    {
        $form = parent::getCreateForm();

        $form->add(
            Select::make()
                ->name('lesson_id')
                ->label('Lesson')
                ->options(
                    Lesson::with('course')
                    ->get()
                    ->pluck('course.title', 'id')
                    ->mapWithKeys(function ($courseTitle, $lessonId) {
                        $lesson = Lesson::find($lessonId);
                        return [$lessonId => $courseTitle . ' - ' . $lesson->title];
                    })
                    ->toArray()
                )
        );

        $form->add(
            Input::make()
                ->name('title')
                ->label('Title')
                ->required()
        );

        $form->add(
            Input::make()
                ->name('description')
                ->label('Description')
        );

        $form->add(
            DatePicker::make()
                ->name('deadline')
                ->label('Deadline')
                ->withoutTime()
                ->required()
        );

        return $form;
    }

    /**
     * See the table builder docs for more information. If you remove this method you can use the blade files.
     * When using twill:module:make you can specify --bladeForm to use a blade form instead.
     */
    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        $form->add(
            Select::make()
                ->name('lesson_id')
                ->label('Lesson')
                ->options(
                    Lesson::with('course')
                        ->get()
                        ->pluck('course.title', 'id')
                        ->mapWithKeys(function ($courseTitle, $lessonId) {
                            $lesson = Lesson::find($lessonId);
                            return [$lessonId => $courseTitle . ' - ' . $lesson->title];
                        })
                        ->toArray()
                )
        );

        $form->add(
            Input::make()
                ->name('title')
                ->label('Title')
                ->required()
        );

        $form->add(
            Input::make()
                ->name('description')
                ->label('Description')
        );

        $form->add(
            DatePicker::make()
                ->name('deadline')
                ->label('Deadline')
                ->withoutTime()
                ->required()
        );

        return $form;
    }

    public function filters(): TableFilters
    {
        return TableFilters::make([
            BasicFilter::make()
                ->label('Lessons')
                ->queryString('lesson_id')
                ->options(
                    collect(Lesson::with('course')
                        ->get()
                        ->pluck('course.title', 'id')
                        ->mapWithKeys(function ($courseTitle, $lessonId) {
                            $lesson = Lesson::find($lessonId);
                            return [$lessonId => $courseTitle . ' - ' . $lesson->title];
                        })
                    )
                )
                ->apply(function (Builder $builder, string $value) {
                    $builder->where('lesson_id', $value);
                }),
        ]);
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
            Text::make()->field('deadline')->title('Deadline')
        );

        $table->add(
            Text::make()->field('lesson_id')->title('Course and Lesson')->customRender(function ($item) {
                $lesson = Lesson::find($item->lesson_id);
                return $lesson->course->title . ' - ' . $lesson->title;
            }),
        );

        return $table;
    }
}
