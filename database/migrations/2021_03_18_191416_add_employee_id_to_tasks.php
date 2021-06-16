<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmployeeIdToTasks extends Migration {
    
    public function up() {
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade');;
        });
    }

    public function down() {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('employee_id');
        });
    }
}
