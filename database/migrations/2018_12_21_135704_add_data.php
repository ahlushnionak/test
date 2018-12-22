<?php

use Illuminate\Database\Migrations\Migration;

class AddData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('roles')->insert(['name' => 'admin', 'guard_name' => 'web']);

        DB::table('permissions')->insert(['name' => 'role-list', 'guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'role-create', 'guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'role-edit', 'guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'role-delete', 'guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'user-list', 'guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'user-create', 'guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'user-edit', 'guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'user-delete', 'guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'categories-list', 'guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'categories-create', 'guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'categories-edit', 'guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'categories-delete', 'guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'faq-list', 'guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'faq-create', 'guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'faq-edit', 'guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'faq-delete', 'guard_name' => 'web']);

        DB::table('role_has_permissions')->insert(['permission_id' => '1', 'role_id' => '1']);
        DB::table('role_has_permissions')->insert(['permission_id' => '2', 'role_id' => '1']);
        DB::table('role_has_permissions')->insert(['permission_id' => '3', 'role_id' => '1']);
        DB::table('role_has_permissions')->insert(['permission_id' => '4', 'role_id' => '1']);
        DB::table('role_has_permissions')->insert(['permission_id' => '5', 'role_id' => '1']);
        DB::table('role_has_permissions')->insert(['permission_id' => '6', 'role_id' => '1']);
        DB::table('role_has_permissions')->insert(['permission_id' => '7', 'role_id' => '1']);
        DB::table('role_has_permissions')->insert(['permission_id' => '8', 'role_id' => '1']);
        DB::table('role_has_permissions')->insert(['permission_id' => '9', 'role_id' => '1']);
        DB::table('role_has_permissions')->insert(['permission_id' => '10', 'role_id' => '1']);
        DB::table('role_has_permissions')->insert(['permission_id' => '11', 'role_id' => '1']);
        DB::table('role_has_permissions')->insert(['permission_id' => '12', 'role_id' => '1']);
        DB::table('role_has_permissions')->insert(['permission_id' => '13', 'role_id' => '1']);
        DB::table('role_has_permissions')->insert(['permission_id' => '14', 'role_id' => '1']);
        DB::table('role_has_permissions')->insert(['permission_id' => '15', 'role_id' => '1']);
        DB::table('role_has_permissions')->insert(['permission_id' => '16', 'role_id' => '1']);

        DB::table('users')->insert(['name' => 'admin', 'email' => 'admin@admin.admin', 'password' => '$2y$10$62qiYnNSTNJNain5ehlEHulHozmf0aEpdiGvFJJ8ln5Pez.wJmzRq']);

        DB::table('model_has_roles')->insert(['role_id' => '1', 'model_type' => 'App\User', 'model_id' => '1']);
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
