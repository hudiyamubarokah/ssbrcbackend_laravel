<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */


    public function up()
    {
        Schema::create('keuangan', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->decimal('saldo', 10, 2);
            $table->enum('type', ['pemasukan', 'pengeluaran']);
            $table->date('tgl_transaksi');
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
        Schema::dropIfExists('keuangan');
    }

};
