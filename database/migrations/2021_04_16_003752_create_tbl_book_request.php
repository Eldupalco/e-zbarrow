<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBookRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_book_request', function (Blueprint $table) {
            $table->id();
            $table->string('book_id');
            $table->string('borrower_id');
            $table->Integer('borrow_quantity')->nullable();
            $table->string('borrow_status')->nullable();
            $table->string('return_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_book_request');
    }
}
