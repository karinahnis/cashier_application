<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        // Product Table 
        Schema::create('product_table', function (blueprint $table) {
            $table->id(); // kolom id-> Primary key 
            $table->string('nama'); 
            $table->string('kategori');
            $table->int('stok_tersedia');
            $table->timestamp(); 
        });
        
        // Transaction Table
        Schema::create('transaction_table', function (blueprint $table) {
            $table->id(); //Primary key
            $table->foreignId('id_produk') // Relasi ke tabel item
                  ->constrained('table_product')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
            $table->integer('jumlah_transaksi'); 
            $table->decimal('total_harga', 10, 2);
            $table->timestamps(); // kolom create_at dan update_at
        });
        // 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('product_table');
        Schema::dropIfExists('transaction_table');
    }
};
