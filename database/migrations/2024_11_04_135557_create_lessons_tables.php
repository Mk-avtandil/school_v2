<?php

use App\Models\Course;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);

            $table->foreignIdFor(Course::class)->constrained()->onDelete('cascade');
            $table->string('title', 200);
            $table->text('description')->nullable();
        });






    }

    public function down()
    {

        Schema::dropIfExists('lessons');
    }
};
