<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPaypalTable extends Migration
{
    function getTable()
	{
		return config('gateway.table_prefix', 'tbl_').\Larabookir\Gateway\Enum::PAYPAL;
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
            $table->char('default_product_name', 255)->default('My Product');
            $table->char('default_shipment_price', 255)->default(0);
            $table->char('client_id', 255);
            $table->char('secret', 255);
            $table->char('settings_mode', 255)->default('sandbox');
            $table->integer('settings_http_ConnectionTimeOut')->default(30);
            $table->boolean('settings_log_LogEnabled')->default(true);
            $table->char('log_FileName', 255)->default(storage_path() . '/logs/paypal.log');
            $table->char('log_LogLevel', 255)->default('FINE');
            $table->char('call_back_url', 255)->default('/gateway/callback/paypal');
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
