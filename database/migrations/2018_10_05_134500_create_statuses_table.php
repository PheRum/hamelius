<?php

use App\Models\Status;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->enum('style', ['danger', 'dark', 'primary']);
            $table->timestamps();
        });

        foreach (collect(trans('status'))->unique()->toArray() as $slug => $process) {
            factory(Status::class)->create(['name' => $slug]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
