<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPasargadTable extends Migration
{
	function getTable()
	{
		return config('gateway.table_prefix', 'tbl_').\Larabookir\Gateway\Enum::PASARGAD;
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
            $table->char('terminalId', 255);
            $table->char('merchantId', 255);
            $table->char('certificate-path', 255)->default(storage_path('gateway/pasargad/certificate.xml'));
            $table->char('callback-url', 255)->default('/gateway/callback/pasargad');
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
