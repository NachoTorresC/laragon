<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecursoUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recurso_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recurso_id')
                    ->nullable()
                    ->constrained('recursos')
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            
                    $table->foreignId('user_id')
                    ->nullable()
                    ->constrained('users')
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
                    
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
        Schema::dropIfExists('recurso_user');
    }
}
