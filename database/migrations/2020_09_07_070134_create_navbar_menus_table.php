<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavbarMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navbar_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menu_name');
            $table->integer('navbar_menu_type_id')->unsigned();
            $table->string('page_slug');
            $table->integer('parent_id')->default(0);
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('navbar_menu_type_id')->references('id')->on('navbar_menu_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('navbar_menus');
    }
}
