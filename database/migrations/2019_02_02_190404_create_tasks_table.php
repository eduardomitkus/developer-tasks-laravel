<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100);
            $table->text('description',730);
            $table->enum('priority',['Baixa','Média','Alta']);
            $table->enum('stage',['Aguardando','Executando','Concluída']);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->date('create_date')->nullable(); 
            $table->unsignedInteger('list_task_id')->nullable();
            $table->foreign('list_task_id')
            ->references('id')
            ->on('list_tasks')
            ->onDelete('cascade');
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
        Schema::dropIfExists('tasks');
    }
}
