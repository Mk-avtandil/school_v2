<?php

use App\Models\Homework;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);

            $table->foreignIdFor(Student::class)->onDelete('cascade');
            $table->foreignIdFor(Teacher::class)->onDelete('cascade');
            $table->foreignIdFor(Homework::class)->onDelete('cascade');
            $table->integer('grade');
            $table->text('feedback')->nullable();
        });






    }

    public function down()
    {

        Schema::dropIfExists('grades');
    }
};
