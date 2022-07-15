<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Spatie\Permission\PermissionRegistrar;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');
        
        // Create role_id column in model_has_roles table
        if (! Schema::hasColumn($tableNames['model_has_roles'], $columnNames['api_foreign_key'])) {
            Schema::table($tableNames['model_has_roles'], function (Blueprint $table) use ($tableNames, $columnNames) {
                // Create foreign index for api_id
                $table->uuid($columnNames['api_foreign_key']);
                $table->index($columnNames['api_foreign_key'], 'model_has_roles_api_foreign_key_index');

                // Drop existing primary key
                if (DB::getDriverName() !== 'sqlite') {
                    $table->dropForeign([PermissionRegistrar::$pivotRole]);
                }
                $table->dropPrimary();

                // Set primary key
                $table->primary([
                    $columnNames['team_foreign_key'], $columnNames['api_foreign_key'], 
                    PermissionRegistrar::$pivotRole, $columnNames['model_morph_key'], 
                    'model_type'
                ], 'model_has_roles_role_model_type_primary');

                if (DB::getDriverName() !== 'sqlite') {
                    $table->foreign(PermissionRegistrar::$pivotRole)
                        ->references('id')->on($tableNames['roles'])->onDelete('cascade');
                }
            });
        }

        // Create role_id column in model_has_permissions table
        if (! Schema::hasColumn($tableNames['model_has_permissions'], $columnNames['api_foreign_key'])) {
            Schema::table($tableNames['model_has_permissions'], function (Blueprint $table) use ($tableNames, $columnNames) {
                // Set foreign key for api_id
                $table->uuid($columnNames['api_foreign_key']);
                $table->index($columnNames['api_foreign_key'], 'model_has_permissions_api_foreign_key_index');

                // Delete existing primary key
                if (DB::getDriverName() !== 'sqlite') {
                    $table->dropForeign([PermissionRegistrar::$pivotPermission]);
                }
                $table->dropPrimary();

                // Set primary key
                $table->primary([
                        $columnNames['api_foreign_key'], $columnNames['team_foreign_key'],
                        PermissionRegistrar::$pivotPermission, 
                        $columnNames['model_morph_key'], 'model_type'
                    ],
                    'model_has_permissions_permission_model_type_primary'
                );

                if (DB::getDriverName() !== 'sqlite') {
                    $table->foreign(PermissionRegistrar::$pivotPermission)
                        ->references('id')->on($tableNames['permissions'])->onDelete('cascade');
                }
            });
        }
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
};
