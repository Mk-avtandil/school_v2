<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use App\Models\Course;

class GroupController extends BaseModuleController
{
    protected $moduleName = 'groups';
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->disablePermalink();
        $this->enableSkipCreateModal();
    }

    /**
     * See the table builder docs for more information. If you remove this method you can use the blade files.
     * When using twill:module:make you can specify --bladeForm to use a blade form instead.
     */
    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        $form->add(
            Input::make()->name('title')->label('Title')
        );

        $form->add(
            Input::make()->name('description')->label('Description')
        );

        $form->add(
            Input::make()->name('start_time')->label('Start Time')->placeholder('00:00:00')
        );

        $form->add(
            Input::make()->name('end_time')->label('End Time')->placeholder('00:00:00')
        );

        $form->add(
            Select::make()
                ->name('course_id')
                ->label('Course')
                ->options(
                    Course::all('id', 'title')
                        ->pluck('title', 'id')
                        ->toArray()
                )
        );

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
            Text::make()->field('start_time')->title('Start time')
        );

        $table->add(
            Text::make()->field('end_time')->title('End time')
        );

        return $table;
    }
}
