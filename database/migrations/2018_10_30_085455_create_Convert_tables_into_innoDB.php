<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvertTablesIntoInnoDB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
        {
            $tables = [
                'comments',
                'migrations',
                'password_resets',
                'posts',
                'users',
            ];

            foreach ($tables as $table) {
                DB::statement('ALTER TABLE ' . $table . ' ENGINE = InnoDB');
            }
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
        {
            $tables = [
                'comments',
                'migrations',
                'password_resets',
                'posts',
                'users',
            ];

            foreach ($tables as $table) {
                DB::statement('ALTER TABLE ' . $table . ' ENGINE = MyISAM');
            }
        }
}
