<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('employees')) {
            Schema::create('employees', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email');
                $table->string('street');
                $table->string('town');
                $table->string('city');
                $table->string('country');
                $table->foreignId('role_id')->nullable()->constrained('rolls', 'id')->cascadeOnUpdate()->nullOnDelete();
                $table->foreignId('department_id')->nullable()->constrained('departments', 'id')->cascadeOnUpdate()->nullOnDelete();
                $table->string('salary')->nullable();
                $table->string('position');
                $table->timestamps();
            });
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
