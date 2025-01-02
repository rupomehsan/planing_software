<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='/app/Modules/Management/PlanManagement/CentralPlan/CentralYearlyExicutivePlan/Database/create_central_yearly_exicutive_plans_table.php'
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('central_yearly_exicutive_plans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('central_yearly_plan_id')->nullable();
            $table->bigInteger('plan_dep_monthly_schedule_type_id')->nullable();
            $table->bigInteger('plan_dep_schedule_id')->nullable();
            $table->bigInteger('user_department_id')->nullable();
            $table->bigInteger('user_department_section_id')->nullable();
            $table->bigInteger('user_department_sub_section_id')->nullable();
            $table->bigInteger('plan_dep_dofa_id')->nullable();
            $table->bigInteger('plan_dep_category_id')->nullable();
            $table->bigInteger('plan_dep_sonkhatattik_tottho_id')->nullable();
            $table->string('title')->nullable();
            $table->string('execution_type')->nullable();
            $table->string('bastobayoner_mash')->nullable();
            $table->string('obastobayeto_ongsho')->nullable();
            $table->string('comments')->nullable();
            $table->string('is_archived')->nullable();
            $table->string('is_umbrella')->nullable();
            $table->bigInteger('umbrella_department_id')->nullable();
            $table->string('plan_details')->nullable();
            $table->text('description')->nullable();
            $table->text('session')->nullable();
            $table->bigInteger('serial_no')->nullable();
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
        Schema::dropIfExists('central_yearly_exicutive_plans');
    }
};
