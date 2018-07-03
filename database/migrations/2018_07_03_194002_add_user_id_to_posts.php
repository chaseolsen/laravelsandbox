<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // When this migration is ran, it will add user_id to the table 'posts'
        Schema::table('posts', function($table){
          $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      // When this is rolled back, it will drop the colum user_id from table 'posts'
      Schema::table('posts', function($table){
        $table->dropColumn('user_id');
      });
    }
}
