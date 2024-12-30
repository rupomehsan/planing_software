<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='/app/Modules/Management/PlanManagement/RelationalData/Database/create_plan_executors_table.php'
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plan_executors', function (Blueprint $table) {
            $table->id();
            $table->string('table_name')->nullable();
            $table->bigInteger('table_id')->nullable();
            $table->bigInteger('serial_no')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('user_depertment_id')->nullable();
            $table->text('description')->nullable();
            $table->integer('previous_unfinished_parcent')->nullable();
            $table->integer('rating')->nullable();

            $table->bigInteger('creator')->unsigned()->nullable();
            $table->string('slug', 50)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('central_yearly_plans');
    }
};
