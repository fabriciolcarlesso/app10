<?php

use App\Models\Developers;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevelopersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->char('sex', 1);
            $table->integer('age');
            $table->string('hobby', 200);
            $table->date('birthdate');
            $table->timestamps();
        });

        Developers::create([
            'name' => 'Fabricio Carlesso',
            'sex' => 'M',
            'age' => 33,
            'hobby' => 'Correr',
            'birthdate' => '1988-06-04',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('developers');
    }
}
