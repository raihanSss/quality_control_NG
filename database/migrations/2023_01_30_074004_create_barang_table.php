<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('barang', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('nobarang');
        $table->string('name');
        $table->date('tanggal');
        $table->integer('customer_id');
        $table->string('kuantitas');
        $table->string('keterangan');
        $table->enum('status', ['repair', 'scrap'])->nullable();
        $table->string('status_lama')->nullable();
        $table->enum('status_val', ['validated', 'not_validated'])->nullable();
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
        
        Schema::dropIfExists('barang');
      
    }
};
