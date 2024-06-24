<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_commande');
            $table->date('date_livraison');
            $table->float('prix');
            $table->float('remise_total');
            $table->float('frais_expedition');
            $table->unsignedBigInteger('adresse_livraison');
            $table->foreign('adresse_livraison')->references('id')->on('adresses');
            $table->timestamps();
        });
        Schema::create('contenu_commandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commande_id');
            $table->unsignedBigInteger('article_id');
            $table->integer('quantite');
            $table->float('prix_unitaire');
            $table->float('remise');
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');
            $table->foreign('article_id')->references('id')->on('articles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenu_commandes');
        Schema::dropIfExists('commandes');
    }
};
