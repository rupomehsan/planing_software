<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='/app/Modules/Management/PlanManagement/DepartmentPlan/DepartmentYearlyPlan/Database/create_department_yearly_plans_table.php'
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('department_yearly_plans', function (Blueprint $table) {

            $table->id();
            $table->string('title')->nullable();
            $table->bigInteger('central_yearly_plan_id')->nullable();
            $table->bigInteger('user_depertment_id')->nullable();
            $table->bigInteger('plan_dep_dofas_id')->nullable();
            $table->bigInteger('plan_dep_orjitobbo_target_id')->nullable();
            $table->bigInteger('serial_no')->nullable();
            $table->text('description')->nullable();
            $table->integer('previous_unfinished_parcent')->nullable();
            $table->integer('rating')->nullable();
            $table->tinyInteger('is_published')->default(0);
            $table->tinyInteger('is_approved')->default(0);

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
        Schema::dropIfExists('department_yearly_plans');
    }
};
