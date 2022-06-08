<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            // "id" BIGINT(bigger size of int) UNSIGHED(0>) AUTO_INCREMENT PRIMARY KEY
            $table->id();

            $table->string('name',255);
            $table->string('slug')->unique();

            // nullable   to be null
            $table->unsignedBigInteger('parent_id')->nullable();
            
            //"create_at" TIMESTAMP
            //"updated_at" TIMESTAMP
            $table->timestamps();

            //RESTRICT on , SET NULL nullOnDelete , CASCADE cascadeOnDelete 
            //$table->foreign('parent_id')->references('id')->on('categories')->nullOnDelete();
            //SW$table->foreignId('parent_id')->nullable()->constrained()->onDelete('set null');
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
         });
    }
    //to back to last edit // migrate::rollback -->W down
    //make rollback for all migrataion // migrate::reset
    //make rollback for all migrataion and migrate  // migrate:refresh

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
