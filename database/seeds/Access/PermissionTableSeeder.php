<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PermissionTableSeeder extends Seeder {

  public function run() {

    if(env('DB_DRIVER') == 'mysql')
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    if(env('DB_DRIVER') == 'mysql')
    {
      DB::table(config('access.permissions_table'))->truncate();
      DB::table(config('access.permission_role_table'))->truncate();
      DB::table(config('access.permission_user_table'))->truncate();
    } elseif(env('DB_DRIVER') == 'sqlite') {
      DB::statement("DELETE FROM ".config('access.permissions_table'));
      DB::statement("DELETE FROM ".config('access.permission_role_table'));
      DB::statement("DELETE FROM ".config('access.permission_user_table'));
    } else { //For PostgreSQL or anything else
      DB::statement("TRUNCATE TABLE ".config('access.permissions_table')." CASCADE");
      DB::statement("TRUNCATE TABLE ".config('access.permission_role_table')." CASCADE");
      DB::statement("TRUNCATE TABLE ".config('access.permission_user_table')." CASCADE");
    }

    //Don't need to assign any permissions to administrator because the all flag is set to true

    /**
     * Misc Access Permissions
     */
    $permission_model = config('access.permission');
    $viewBackend = new $permission_model;
    $viewBackend->name = 'view-backend';
    $viewBackend->display_name = '查看后台';
    $viewBackend->system = true;
    $viewBackend->group_id = 1;
    $viewBackend->sort = 1;
    $viewBackend->created_at = Carbon::now();
    $viewBackend->updated_at = Carbon::now();
    $viewBackend->save();

    $permission_model = config('access.permission');
    $viewAccessManagement = new $permission_model;
    $viewAccessManagement->name = 'view-access-management';
    $viewAccessManagement->display_name = '查看访问管理';
    $viewAccessManagement->system = true;
    $viewAccessManagement->group_id = 1;
    $viewAccessManagement->sort = 2;
    $viewAccessManagement->created_at = Carbon::now();
    $viewAccessManagement->updated_at = Carbon::now();
    $viewAccessManagement->save();

    $permission_model = config('access.permission');
    $viewOrderManagement = new $permission_model;
    $viewOrderManagement->name = 'view-orders-management';
    $viewOrderManagement->display_name = '查看订单管理';
    $viewOrderManagement->system = true;
    $viewOrderManagement->group_id = 1;
    $viewOrderManagement->sort = 3;
    $viewOrderManagement->created_at = Carbon::now();
    $viewOrderManagement->updated_at = Carbon::now();
    $viewOrderManagement->save();

    /**
     * Access Permissions
     */

    /**
     * User
     */
    $permission_model = config('access.permission');
    $createUsers = new $permission_model;
    $createUsers->name = 'create-users';
    $createUsers->display_name = '创建用户';
    $createUsers->system = true;
    $createUsers->group_id = 2;
    $createUsers->sort = 5;
    $createUsers->created_at = Carbon::now();
    $createUsers->updated_at = Carbon::now();
    $createUsers->save();

    $permission_model = config('access.permission');
    $editUsers = new $permission_model;
    $editUsers->name = 'edit-users';
    $editUsers->display_name = '编辑用户';
    $editUsers->system = true;
    $editUsers->group_id = 2;
    $editUsers->sort = 6;
    $editUsers->created_at = Carbon::now();
    $editUsers->updated_at = Carbon::now();
    $editUsers->save();

    $permission_model = config('access.permission');
    $deleteUsers = new $permission_model;
    $deleteUsers->name = 'delete-users';
    $deleteUsers->display_name = '删除用户';
    $deleteUsers->system = true;
    $deleteUsers->group_id = 2;
    $deleteUsers->sort = 7;
    $deleteUsers->created_at = Carbon::now();
    $deleteUsers->updated_at = Carbon::now();
    $deleteUsers->save();

    $permission_model = config('access.permission');
    $changeUserPassword = new $permission_model;
    $changeUserPassword->name = 'change-user-password';
    $changeUserPassword->display_name = '修改用户密码';
    $changeUserPassword->system = true;
    $changeUserPassword->group_id = 2;
    $changeUserPassword->sort = 8;
    $changeUserPassword->created_at = Carbon::now();
    $changeUserPassword->updated_at = Carbon::now();
    $changeUserPassword->save();

    $permission_model = config('access.permission');
    $deactivateUser = new $permission_model;
    $deactivateUser->name = 'deactivate-users';
    $deactivateUser->display_name = '冻结用户';
    $deactivateUser->system = true;
    $deactivateUser->group_id = 2;
    $deactivateUser->sort = 9;
    $deactivateUser->created_at = Carbon::now();
    $deactivateUser->updated_at = Carbon::now();
    $deactivateUser->save();

    $permission_model = config('access.permission');
    $banUsers = new $permission_model;
    $banUsers->name = 'ban-users';
    $banUsers->display_name = '封禁用户';
    $banUsers->system = true;
    $banUsers->group_id = 2;
    $banUsers->sort = 10;
    $banUsers->created_at = Carbon::now();
    $banUsers->updated_at = Carbon::now();
    $banUsers->save();

    $permission_model = config('access.permission');
    $reactivateUser = new $permission_model;
    $reactivateUser->name = 'reactivate-users';
    $reactivateUser->display_name = '重激活用户';
    $reactivateUser->system = true;
    $reactivateUser->group_id = 2;
    $reactivateUser->sort = 11;
    $reactivateUser->created_at = Carbon::now();
    $reactivateUser->updated_at = Carbon::now();
    $reactivateUser->save();

    $permission_model = config('access.permission');
    $unbanUser = new $permission_model;
    $unbanUser->name = 'unban-users';
    $unbanUser->display_name = '解禁用户';
    $unbanUser->system = true;
    $unbanUser->group_id = 2;
    $unbanUser->sort = 12;
    $unbanUser->created_at = Carbon::now();
    $unbanUser->updated_at = Carbon::now();
    $unbanUser->save();

    $permission_model = config('access.permission');
    $undeleteUser = new $permission_model;
    $undeleteUser->name = 'undelete-users';
    $undeleteUser->display_name = '恢复用户';
    $undeleteUser->system = true;
    $undeleteUser->group_id = 2;
    $undeleteUser->sort = 13;
    $undeleteUser->created_at = Carbon::now();
    $undeleteUser->updated_at = Carbon::now();
    $undeleteUser->save();

    $permission_model = config('access.permission');
    $permanentlyDeleteUser = new $permission_model;
    $permanentlyDeleteUser->name = 'permanently-delete-users';
    $permanentlyDeleteUser->display_name = '永久删除用户';
    $permanentlyDeleteUser->system = true;
    $permanentlyDeleteUser->group_id = 2;
    $permanentlyDeleteUser->sort = 14;
    $permanentlyDeleteUser->created_at = Carbon::now();
    $permanentlyDeleteUser->updated_at = Carbon::now();
    $permanentlyDeleteUser->save();

    $permission_model = config('access.permission');
    $resendConfirmationEmail = new $permission_model;
    $resendConfirmationEmail->name = 'resend-user-confirmation-email';
    $resendConfirmationEmail->display_name = '重发送用户确认邮件';
    $resendConfirmationEmail->system = true;
    $resendConfirmationEmail->group_id = 2;
    $resendConfirmationEmail->sort = 15;
    $resendConfirmationEmail->created_at = Carbon::now();
    $resendConfirmationEmail->updated_at = Carbon::now();
    $resendConfirmationEmail->save();

    /**
     * Role
     */
    $permission_model = config('access.permission');
    $createRoles = new $permission_model;
    $createRoles->name = 'create-roles';
    $createRoles->display_name = '创建角色';
    $createRoles->system = true;
    $createRoles->group_id = 3;
    $createRoles->sort = 2;
    $createRoles->created_at = Carbon::now();
    $createRoles->updated_at = Carbon::now();
    $createRoles->save();

    $permission_model = config('access.permission');
    $editRoles = new $permission_model;
    $editRoles->name = 'edit-roles';
    $editRoles->display_name = '编辑角色';
    $editRoles->system = true;
    $editRoles->group_id = 3;
    $editRoles->sort = 3;
    $editRoles->created_at = Carbon::now();
    $editRoles->updated_at = Carbon::now();
    $editRoles->save();

    $permission_model = config('access.permission');
    $deleteRoles = new $permission_model;
    $deleteRoles->name = 'delete-roles';
    $deleteRoles->display_name = '删除角色';
    $deleteRoles->system = true;
    $deleteRoles->group_id = 3;
    $deleteRoles->sort = 4;
    $deleteRoles->created_at = Carbon::now();
    $deleteRoles->updated_at = Carbon::now();
    $deleteRoles->save();

    /**
     * Permission Group
     */
    $permission_model = config('access.permission');
    $createPermissionGroups = new $permission_model;
    $createPermissionGroups->name = 'create-permission-groups';
    $createPermissionGroups->display_name = '创建权限组';
    $createPermissionGroups->system = true;
    $createPermissionGroups->group_id = 4;
    $createPermissionGroups->sort = 1;
    $createPermissionGroups->created_at = Carbon::now();
    $createPermissionGroups->updated_at = Carbon::now();
    $createPermissionGroups->save();

    $permission_model = config('access.permission');
    $editPermissionGroups = new $permission_model;
    $editPermissionGroups->name = 'edit-permission-groups';
    $editPermissionGroups->display_name = '编辑权限组';
    $editPermissionGroups->system = true;
    $editPermissionGroups->group_id = 4;
    $editPermissionGroups->sort = 2;
    $editPermissionGroups->created_at = Carbon::now();
    $editPermissionGroups->updated_at = Carbon::now();
    $editPermissionGroups->save();

    $permission_model = config('access.permission');
    $deletePermissionGroups = new $permission_model;
    $deletePermissionGroups->name = 'delete-permission-groups';
    $deletePermissionGroups->display_name = '删除权限组';
    $deletePermissionGroups->system = true;
    $deletePermissionGroups->group_id = 4;
    $deletePermissionGroups->sort = 3;
    $deletePermissionGroups->created_at = Carbon::now();
    $deletePermissionGroups->updated_at = Carbon::now();
    $deletePermissionGroups->save();

    $permission_model = config('access.permission');
    $sortPermissionGroups = new $permission_model;
    $sortPermissionGroups->name = 'sort-permission-groups';
    $sortPermissionGroups->display_name = '排序权限组';
    $sortPermissionGroups->system = true;
    $sortPermissionGroups->group_id = 4;
    $sortPermissionGroups->sort = 4;
    $sortPermissionGroups->created_at = Carbon::now();
    $sortPermissionGroups->updated_at = Carbon::now();
    $sortPermissionGroups->save();

    /**
     * Permission
     */
    $permission_model = config('access.permission');
    $createPermissions = new $permission_model;
    $createPermissions->name = 'create-permissions';
    $createPermissions->display_name = '创建权限';
    $createPermissions->system = true;
    $createPermissions->group_id = 4;
    $createPermissions->sort = 5;
    $createPermissions->created_at = Carbon::now();
    $createPermissions->updated_at = Carbon::now();
    $createPermissions->save();

    $permission_model = config('access.permission');
    $editPermissions = new $permission_model;
    $editPermissions->name = 'edit-permissions';
    $editPermissions->display_name = '编辑权限';
    $editPermissions->system = true;
    $editPermissions->group_id = 4;
    $editPermissions->sort = 6;
    $editPermissions->created_at = Carbon::now();
    $editPermissions->updated_at = Carbon::now();
    $editPermissions->save();

    $permission_model = config('access.permission');
    $deletePermissions = new $permission_model;
    $deletePermissions->name = 'delete-permissions';
    $deletePermissions->display_name = '删除权限';
    $deletePermissions->system = true;
    $deletePermissions->group_id = 4;
    $deletePermissions->sort = 7;
    $deletePermissions->created_at = Carbon::now();
    $deletePermissions->updated_at = Carbon::now();
    $deletePermissions->save();

    $permission_model = config('access.permission');
    $editOrders = new $permission_model;
    $editOrders->name = 'edit-orders';
    $editOrders->display_name = '编辑订单';
    $editOrders->system = true;
    $editOrders->group_id = 5;
    $editOrders->sort = 1;
    $editOrders->created_at = Carbon::now();
    $editOrders->updated_at = Carbon::now();
    $editOrders->save();

    $permission_model = config('access.permission');
    $deleteOrders = new $permission_model;
    $deleteOrders->name = 'delete-orders';
    $deleteOrders->display_name = '删除订单';
    $deleteOrders->system = true;
    $deleteOrders->group_id = 5;
    $deleteOrders->sort = 2;
    $deleteOrders->created_at = Carbon::now();
    $deleteOrders->updated_at = Carbon::now();
    $deleteOrders->save();

    if(env('DB_DRIVER') == 'mysql')
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');
  }
}
