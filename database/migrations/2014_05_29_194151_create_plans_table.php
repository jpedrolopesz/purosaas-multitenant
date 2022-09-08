<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('url');
            $table->integer('price');
            $table->unsignedBigInteger('tenant_id')->nullable();
            $table->string('stripe_id')->unique();
            $table->boolean('active')->default(false);
            $table->boolean('recommended')->default(false);
            $table->string('description')->nullable();
            $table->integer('teams_limit')->nullable();
            $table->timestamps();

            $table->unique(['tenant_id', 'active']);
        });
    }

    /**
     * Reverse the migrations.
     *
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
