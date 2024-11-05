<?php

use App\Models\Lesson;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('homeworks', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);

            $table->foreignIdFor(Lesson::class)->onDelete('cascade');
            $table->string('title', 200);
            $table->text('description');
            $table->date('deadline');
        });






    }

    public function down()
    {

        Schema::dropIfExists('homeworks');
    }
};
