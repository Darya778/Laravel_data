<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('user_data', function (Blueprint $table) {
            if (!Schema::hasColumn('user_data', 'deleted_at')) {
                $table->softDeletes();
            }
        });
    }

    public function down()
    {
        Schema::table('user_data', function (Blueprint $table) {
            if (Schema::hasColumn('user_data', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
    }
};
