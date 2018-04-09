

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettlementsummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settlement_summary', function (Blueprint $table) {
            $table->increments('id')->comment('Unique identity for each record');
            $table->string('BATCHCODE', 15);
            $table->date('SETLDATE')->comment('Date for the settlement');
            $table->string('TRANSTYPE', 10);
            $table->string('MERCHID', 15)->comment('Merchant to be settled');
            $table->string('RSWITCH', 15)->comment('RSwitch to be settled');
            $table->string('TOTVOL', 15)->comment('Total volume of transactions');
            $table->string('TOTVAL', 15)->comment('Total value of transactions');
            $table->string('CHARGES', 15)->comment('Charges to be applied');
            $table->string('NET', 15)->comment('Net value of the transactions');
            $table->timestamp('DATECREATED')->default(\DB::raw('CURRENT_TIMESTAMP'));
            //$table->timestamps();
            //$table->unique(["id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settlement_summary');
    }
}

