<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FormRS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        SCHEMA::CREATE('form_r_s', FUNCTION (Blueprint $TABLE) {
            $TABLE->id();
            $TABLE->STRING('reference_id');
            $TABLE->STRING('Policy_No');
            $TABLE->STRING('remark');
            $TABLE->STRING('status');
            $TABLE->STRING('user_email');
            $TABLE->STRING('form_type');
            $TABLE->TIMESTAMPS();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
