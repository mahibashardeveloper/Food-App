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
        Schema::table('sub_admins', function (Blueprint $table) {
            $table->unsignedBigInteger('admin_id')->after('id');
            $table->foreign('admin_id')->references('id')->on('admins');
        });
        Schema::table('vendors', function (Blueprint $table) {
            $table->unsignedBigInteger('admin_id')->after('id');
            $table->foreign('admin_id')->references('id')->on('admins');
        });
        Schema::table('delivery_mans', function (Blueprint $table) {
            $table->unsignedBigInteger('admin_id')->after('id');
            $table->foreign('admin_id')->references('id')->on('admins');
        });
        Schema::table('partners', function (Blueprint $table) {
            $table->unsignedBigInteger('admin_id')->after('id');
            $table->foreign('admin_id')->references('id')->on('admins');
        });
        Schema::table('merchants', function (Blueprint $table) {
            $table->unsignedBigInteger('admin_id')->after('id');
            $table->foreign('admin_id')->references('id')->on('admins');
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->unsignedBigInteger('admin_id')->after('id');
            $table->foreign('admin_id')->references('id')->on('admins');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('admin_id')->after('id');
            $table->foreign('admin_id')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_admins', function (Blueprint $table) {
            $table->dropForeign(['admin_id']);
            $table->dropColumn('admin_id');
        });
        Schema::table('vendors', function (Blueprint $table) {
            $table->dropForeign(['admin_id']);
            $table->dropColumn('admin_id');
        });
        Schema::table('delivery_mans', function (Blueprint $table) {
            $table->dropForeign(['admin_id']);
            $table->dropColumn('admin_id');
        });
        Schema::table('partners', function (Blueprint $table) {
            $table->dropForeign(['admin_id']);
            $table->dropColumn('admin_id');
        });
        Schema::table('merchants', function (Blueprint $table) {
            $table->dropForeign(['admin_id']);
            $table->dropColumn('admin_id');
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['admin_id']);
            $table->dropColumn('admin_id');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['admin_id']);
            $table->dropColumn('admin_id');
        });
    }
};
