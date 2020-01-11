<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblIrankishTable extends Migration
{
    function getTable()
	{
		return config('gateway.table_prefix', 'tbl_').\Larabookir\Gateway\Enum::IRANKISH;
	}
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create($this->getTable(), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->char('merchantId', 255);
            $table->char('sha1key', 255);
            $table->char('callback-url', 255)->default('/');
            $table->tinyInteger('status', false, true)->default(0);
            $table->index([
				'user_id',
				'status'
			]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->getTable());
    }
}
