<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('name');
	        $table->string('committee');
	        $table->string('country');
	        $table->string('phone');
	        $table->string('email');
	        $table->integer('amount_paid');
	        $table->string('payment_type');
	        $table->string('townscript_id')->nullable(true)->default(NULL);
	        $table->string('oc_member_name')->nullable(true)->default(NULL);
            $table->timestamps();
        });

	    DB::statement("ALTER TABLE members AUTO_INCREMENT = 1001;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
