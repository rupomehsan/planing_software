<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='/app/Modules/Management/PlanManagement/DepartmentPlan/DepartmentYearlyExicutivePlan/Database/create_department_yearly_executive_plans_table.php'
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('department_yearly_executive_plans', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->bigInteger('session_id')->nullable();
            $table->bigInteger('central_yearly_plan_id')->nullable();
            $table->bigInteger('central_yearly_executive_plan_id')->nullable();
            $table->bigInteger('department_yearly_plan_id')->nullable();
            $table->bigInteger('department_id')->nullable();
            $table->bigInteger('department_section_id')->nullable();
            $table->bigInteger('department_sub_section_id')->nullable();
            $table->bigInteger('department_user_id')->nullable();
            $table->bigInteger('helper_department_id')->nullable();
            $table->bigInteger('helper_department_user_id')->nullable();
            $table->bigInteger('plan_dep_category_id')->nullable();
            $table->bigInteger('plan_dep_sonkha_tattik_tottho_id')->nullable();
            $table->bigInteger('plan_dep_dofa_id')->nullable();
            $table->bigInteger('plan_dep_schedule_type_id')->nullable();
            $table->bigInteger('plan_dep_schedule_id')->nullable();
            $table->text('description')->nullable();
            $table->enum('deadline_type', ['deadline', 'schedule'])->nullable();
            $table->bigInteger('serial_no')->nullable();
            $table->integer('previous_unfinished_parcent')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('department_yearly_exicutive_plans');
    }
};
