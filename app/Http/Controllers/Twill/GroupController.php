<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\Fields\Browser;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\Filters\BasicFilter;
use A17\Twill\Services\Listings\Filters\TableFilters;
use A17\Twill\Services\Listings\TableColumns;
use Illuminate\Database\Eloquent\Builder;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;

class GroupController extends BaseModuleController
{
    protected $moduleName = 'groups';
    private static array $formFields;

    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->disablePermalink();

        self::$formFields = [
            Select::make()
                ->name('course_id')
                ->label('Course')
                ->options(
                    Course::all('id', 'title')->pluck('title', 'id')->toArray()
                ),

            Input::make()->name('title')->label('Title'),
            Input::make()->name('description')->label('Description'),
            Input::make()->name('start_time')->label('Start Time')->placeholder('00:00:00'),
            Input::make()->name('end_time')->label('End Time')->placeholder('00:00:00'),
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
        $form = Form::make(self::$formFields);

        $form->add(
            Browser::make()
                ->name('teachers')
                ->note('Add teacher to group')
                ->modules([Teacher::class])
                ->max(5)
        );

        $form->add(
            Browser::make()
                ->name('students')
                ->note('Add students to group')
                ->modules([Student::class])
                ->max(25)
        );

        return $form;
    }

    public function filters(): TableFilters
    {
        return TableFilters::make([
            BasicFilter::make()
                ->label('Course')
                ->queryString('course_id')
                ->options(collect(Course::all()->pluck('title', 'id')))
                ->apply(function (Builder $builder, string $value) {
                    $builder->where('course_id', $value);
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
            Text::make()->field('start_time')->title('Start time')
        );

        $table->add(
            Text::make()->field('end_time')->title('End time')
        );

        return $table;
    }
}
