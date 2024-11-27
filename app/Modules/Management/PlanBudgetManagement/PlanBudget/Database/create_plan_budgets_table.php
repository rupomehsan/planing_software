<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='\App\Modules\Management\PlanBudgetManagement\PlanBudget\Database\create_plan_budgets_table.php'
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plan_budgets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('central_yearly_plan_id')->nullable();
            $table->bigInteger('central_yearly_executive_plan_id')->nullable();
            $table->bigInteger('department_yearly_plan_id')->nullable();
            $table->bigInteger('department_yearly_executive_plan_id')->nullable();
            $table->bigInteger('department_id')->nullable();
            $table->bigInteger('department_section_id')->nullable();
            $table->bigInteger('department_sub_section_id')->nullable();
            $table->datetime('date')->nullable();
            $table->integer('rating')->nullable();
            $table->float('amount')->nullable();
            $table->string('type', 100)->nullable();
            $table->bigInteger('plan_budget_category_id')->nullable();
            $table->bigInteger('plan_budget_sub_category_id')->nullable();

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
        Schema::dropIfExists('plan_budgets');
    }
};