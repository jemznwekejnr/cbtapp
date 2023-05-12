<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Payments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email");
            $table->string("phone");
            $table->string("participationtype");
            $table->integer("totalparticipant");
            $table->string("zone")->nullable();
            $table->string("state")->nullable();
            $table->string("lga")->nullable();
            $table->decimal("amountpaid", 15, 2);
            $table->string("paymentmethod");
            $table->string("paymentproof");
            $table->string("paymentstatus");
            $table->integer("updated_by");
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
        Schema::dropIfExists('payments');
    }
}
