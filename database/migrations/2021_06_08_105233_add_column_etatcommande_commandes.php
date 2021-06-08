<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddColumnEtatcommandeCommandes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->string("etatcommande")->after("client_id");
        });
        DB::statement('ALTER TABLE commandes ADD CONSTRAINT chk_etat_commande CHECK (etatcommande = "Annulee" or etatcommande ="Livree" or etatcommande="En_Attente");');
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->dropColumn("etatcommande");
        });
    }
}
