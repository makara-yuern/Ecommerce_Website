<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('product_variants', function (Blueprint $table) {
            $table->dropColumn('variant_size');
            $table->unsignedBigInteger('size_id')->nullable()->after('variant_name');

            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_variants', function (Blueprint $table) {
            $table->dropForeign(['size_id']);
            $table->dropColumn('size_id');
            $table->string('variant_size')->after('variant_name');
        });
    }
};
