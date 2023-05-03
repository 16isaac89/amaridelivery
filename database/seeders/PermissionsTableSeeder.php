<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'vehicle_access',
            ],
            [
                'id'    => 20,
                'title' => 'vehicle_category_create',
            ],
            [
                'id'    => 21,
                'title' => 'vehicle_category_edit',
            ],
            [
                'id'    => 22,
                'title' => 'vehicle_category_show',
            ],
            [
                'id'    => 23,
                'title' => 'vehicle_category_delete',
            ],
            [
                'id'    => 24,
                'title' => 'vehicle_category_access',
            ],
            [
                'id'    => 25,
                'title' => 'fleet_create',
            ],
            [
                'id'    => 26,
                'title' => 'fleet_edit',
            ],
            [
                'id'    => 27,
                'title' => 'fleet_show',
            ],
            [
                'id'    => 28,
                'title' => 'fleet_delete',
            ],
            [
                'id'    => 29,
                'title' => 'fleet_access',
            ],
            [
                'id'    => 30,
                'title' => 'driver_create',
            ],
            [
                'id'    => 31,
                'title' => 'driver_edit',
            ],
            [
                'id'    => 32,
                'title' => 'driver_show',
            ],
            [
                'id'    => 33,
                'title' => 'driver_delete',
            ],
            [
                'id'    => 34,
                'title' => 'driver_access',
            ],
            [
                'id'    => 35,
                'title' => 'system_setting_create',
            ],
            [
                'id'    => 36,
                'title' => 'system_setting_edit',
            ],
            [
                'id'    => 37,
                'title' => 'system_setting_show',
            ],
            [
                'id'    => 38,
                'title' => 'system_setting_delete',
            ],
            [
                'id'    => 39,
                'title' => 'system_setting_access',
            ],
            [
                'id'    => 40,
                'title' => 'customer_create',
            ],
            [
                'id'    => 41,
                'title' => 'customer_edit',
            ],
            [
                'id'    => 42,
                'title' => 'customer_show',
            ],
            [
                'id'    => 43,
                'title' => 'customer_delete',
            ],
            [
                'id'    => 44,
                'title' => 'customer_access',
            ],
            [
                'id'    => 45,
                'title' => 'addre_create',
            ],
            [
                'id'    => 46,
                'title' => 'addre_edit',
            ],
            [
                'id'    => 47,
                'title' => 'addre_show',
            ],
            [
                'id'    => 48,
                'title' => 'addre_delete',
            ],
            [
                'id'    => 49,
                'title' => 'addre_access',
            ],
            [
                'id'    => 50,
                'title' => 'order_management_access',
            ],
            [
                'id'    => 51,
                'title' => 'order_create',
            ],
            [
                'id'    => 52,
                'title' => 'order_edit',
            ],
            [
                'id'    => 53,
                'title' => 'order_show',
            ],
            [
                'id'    => 54,
                'title' => 'order_delete',
            ],
            [
                'id'    => 55,
                'title' => 'order_access',
            ],
            [
                'id'    => 56,
                'title' => 'partner_create',
            ],
            [
                'id'    => 57,
                'title' => 'partner_edit',
            ],
            [
                'id'    => 58,
                'title' => 'partner_show',
            ],
            [
                'id'    => 59,
                'title' => 'partner_delete',
            ],
            [
                'id'    => 60,
                'title' => 'partner_access',
            ],
            [
                'id'    => 61,
                'title' => 'partner_user_create',
            ],
            [
                'id'    => 62,
                'title' => 'partner_user_edit',
            ],
            [
                'id'    => 63,
                'title' => 'partner_user_show',
            ],
            [
                'id'    => 64,
                'title' => 'partner_user_delete',
            ],
            [
                'id'    => 65,
                'title' => 'partner_user_access',
            ],
            [
                'id'    => 66,
                'title' => 'route_create',
            ],
            [
                'id'    => 67,
                'title' => 'route_edit',
            ],
            [
                'id'    => 68,
                'title' => 'route_show',
            ],
            [
                'id'    => 69,
                'title' => 'route_delete',
            ],
            [
                'id'    => 70,
                'title' => 'route_access',
            ],
            [
                'id'    => 71,
                'title' => 'zone_create',
            ],
            [
                'id'    => 72,
                'title' => 'zone_edit',
            ],
            [
                'id'    => 73,
                'title' => 'zone_show',
            ],
            [
                'id'    => 74,
                'title' => 'zone_delete',
            ],
            [
                'id'    => 75,
                'title' => 'zone_access',
            ],
            [
                'id'    => 76,
                'title' => 'zone_vehicle_category_create',
            ],
            [
                'id'    => 77,
                'title' => 'zone_vehicle_category_edit',
            ],
            [
                'id'    => 78,
                'title' => 'zone_vehicle_category_show',
            ],
            [
                'id'    => 79,
                'title' => 'zone_vehicle_category_delete',
            ],
            [
                'id'    => 80,
                'title' => 'zone_vehicle_category_access',
            ],
            [
                'id'    => 81,
                'title' => 'place_create',
            ],
            [
                'id'    => 82,
                'title' => 'place_edit',
            ],
            [
                'id'    => 83,
                'title' => 'place_show',
            ],
            [
                'id'    => 84,
                'title' => 'place_delete',
            ],
            [
                'id'    => 85,
                'title' => 'place_access',
            ],
            [
                'id'    => 86,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
