<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('github_id');
            $table->string('name');
            $table->text('description')->nullable(true);
            $table->text('readme')->nullable(true);
            $table->string('composer')->nullable(true);
            $table->text('require')->nullable(true);
            $table->string('license')->nullable(true);
            $table->integer('stars');
            $table->integer('forks');
            $table->integer('watchers');
            $table->string('url');
            $table->string('github_url');
            $table->integer('author_id');
            $table->dateTime('repository_pushed_at');
            $table->dateTime('repository_created_at');
            $table->string('clone_url')->nullable(true);
            $table->string('ssh_url')->nullable(true);
            $table->string('git_url')->nullable(true);
            $table->integer('open_issues');

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
        Schema::drop('modules');
    }
}
