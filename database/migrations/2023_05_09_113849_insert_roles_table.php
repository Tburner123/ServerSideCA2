<?php

use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertRolesTable extends Migration
{
    public $roles  =["user","admin"];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach($this->roles as $role){
            $new_role = new Role();
            $new_role->name = $role;
            $new_role->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach ($this->roles as $role) {
            DB::table('roles')->where('name', $role)->delete();
        }
    }
}
