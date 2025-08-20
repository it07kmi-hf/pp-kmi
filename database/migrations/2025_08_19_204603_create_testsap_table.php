<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testsap', function (Blueprint $table) {
            $table->id();
            $table->string('no')->nullable();
            $table->string('product')->nullable();
            $table->string('product_desc')->nullable();
            $table->string('sales_order')->nullable();
            $table->string('item')->nullable();
            $table->string('aufnr')->nullable();
            $table->string('material')->nullable();
            $table->string('material_desc')->nullable();
            $table->string('plant')->nullable();
            $table->string('mrp')->nullable();
            $table->decimal('qty_plo_pro', 15, 3)->nullable();
            $table->decimal('qty_delivery', 15, 3)->nullable();
            $table->decimal('outstanding', 15, 3)->nullable();
            $table->string('uom')->nullable();
            $table->date('start_date')->nullable();
            $table->date('finish_date')->nullable();
            $table->date('create_on')->nullable();
            $table->string('hari')->nullable();
            $table->integer('overdue')->nullable();
            $table->string('panjang')->nullable();
            $table->string('system_status')->nullable();
            $table->decimal('selisih', 15, 3)->nullable();
            $table->string('status')->nullable();
            $table->date('first_conf_date')->nullable();
            $table->date('deadline')->nullable();
            $table->time('require_time')->nullable();
            $table->string('keinh')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testsap');
    }
};
