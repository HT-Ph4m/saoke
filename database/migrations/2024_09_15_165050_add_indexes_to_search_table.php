<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexesToSearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sao_kes', function (Blueprint $table) {
            // Index cho cột date
            $table->index('date');

            // Index cho cột money
            $table->index('money');

            // Fulltext index cho cột note (tìm kiếm nội dung văn bản)
            $table->fullText('note');

            // Fulltext index cho cột username
            $table->fullText('username');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sao_kes', function (Blueprint $table) {
            // Xóa các chỉ mục
            $table->dropIndex(['date']);
            $table->dropIndex(['money']);
            $table->dropFullText(['note']);
            $table->dropFullText(['username']);
        });
    }
}
