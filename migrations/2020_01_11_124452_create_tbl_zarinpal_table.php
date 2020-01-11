<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblZarinpalTable extends Migration
{
	function getTable()
	{
		return config('gateway.table_prefix', 'tbl_').\Larabookir\Gateway\Enum::ZARINPAL;
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
            $table->char('merchant-id', 255);
            $table->char('type', 255)->default('zarin-gate');
            $table->char('callback-url', 255)->default('/');
            $table->char('server', 255)->default('germany');
            $table->char('email', 255);
            $table->char('mobile', 255);
            $table->char('description', 255);
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
