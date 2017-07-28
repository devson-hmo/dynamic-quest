<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Questionaires extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("questionaires", function($table) {
            $table->increments("id");
            $table->string("name", 100);
            $table->integer("user_id");
            $table->timestamps();
        });

        Schema::create("questionaire_sections", function($table){
            $table->increments("id");
            $table->integer("questionaire_id");
            $table->integer("user_id");
            $table->string("name", 100);
            $table->timestamps();
        });

        Schema::create("questions", function($table){
            $table->increments("id");
            $table->integer("section_id");
            $table->text("question");
            $table->string("type", 20);
            $table->text("answers");
            $table->timestamps();
        });

        // Schema::create("questionaire_section_questions", function($table){
        //     $table->integer("questionaire_section_id");
        //     $table->integer("question_id");
        //     $table->timestamps();
        // });

        Schema::create("answers", function($table){
            $table->increments("id");
            $table->text("answers");
            $table->text("user_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("questionaires");
        Schema::drop("questionaire_sections");
        Schema::drop("questions");
        Schema::drop("questionaire_section_questions");
        Schema::drop("answers");

    }
}
