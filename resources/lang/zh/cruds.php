<?php

return [
    'userManagement' => [
        'title'          => '用戶管理',
        'title_singular' => '用戶管理',
    ],
    'permission' => [
        'title'          => '權限種類',
        'title_singular' => '權限種類',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => '角色種類',
        'title_singular' => '角色種類',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => '醫療人員',
        'title_singular' => '醫療人員',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'First Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'username'                 => 'Username',
            'username_helper'          => ' ',
            'phonenumber'              => 'Phone number',
            'phonenumber_helper'       => ' ',
            'picture'                  => 'Picture',
            'picture_helper'           => ' ',
            'second_name'              => 'Second Name',
            'second_name_helper'       => ' ',
            'fcmtoken'                 => 'Fcmtoken',
            'fcmtoken_helper'          => ' ',
            'designation'              => 'Designation',
            'designation_helper'       => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'vehicle' => [
        'title'          => 'Vehicles',
        'title_singular' => 'Vehicle',
    ],
    'vehicleCategory' => [
        'title'          => 'VehicleCategory',
        'title_singular' => 'VehicleCategory',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'base'              => 'Base',
            'base_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'fleet' => [
        'title'          => 'Fleet',
        'title_singular' => 'Fleet',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'manufacturer'         => 'Manufacturer',
            'manufacturer_helper'  => 'Like Fuso, toyota etc',
            'name'                 => 'Name',
            'name_helper'          => ' ',
            'pic'                  => 'Photo',
            'pic_helper'           => ' ',
            'number'               => 'Number',
            'number_helper'        => ' ',
            'otherpapapers'        => 'Otherpapapers',
            'otherpapapers_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'driver' => [
        'title'          => 'Driver',
        'title_singular' => 'Driver',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'fullname'          => 'Fullname',
            'fullname_helper'   => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'phone_1'           => 'Phone 1',
            'phone_1_helper'    => ' ',
            'photo'             => 'Photo',
            'photo_helper'      => ' ',
            'idphoto'           => 'ID Photo',
            'idphoto_helper'    => ' ',
            'long'              => 'Long',
            'long_helper'       => ' ',
            'lat'               => 'Lat',
            'lat_helper'        => ' ',
            'password'          => 'Password',
            'password_helper'   => ' ',
            'phone_2'           => 'Phone 2',
            'phone_2_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'routes'            => 'Routes',
            'routes_helper'     => ' ',
        ],
    ],
    'systemSetting' => [
        'title'          => 'System Settings',
        'title_singular' => 'System Setting',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'value'             => 'Value',
            'value_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'customer' => [
        'title'          => 'Customer',
        'title_singular' => 'Customer',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'firstname'         => 'Firstname',
            'firstname_helper'  => ' ',
            'secondname'        => 'Secondname',
            'secondname_helper' => ' ',
            'thirdname'         => 'Thirdname',
            'thirdname_helper'  => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'profilepic'        => 'Profilepic',
            'profilepic_helper' => ' ',
            'fcm'               => 'Fcm',
            'fcm_helper'        => ' ',
            'phone_1'           => 'Phone 1',
            'phone_1_helper'    => ' ',
            'phone_2'           => 'Phone 2',
            'phone_2_helper'    => ' ',
            'password'          => 'Password',
            'password_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'partner'           => 'Partner',
            'partner_helper'    => ' ',
        ],
    ],
    'addre' => [
        'title'          => 'Addres',
        'title_singular' => 'Addre',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'value'             => 'Value',
            'value_helper'      => ' ',
            'lat'               => 'Lat',
            'lat_helper'        => ' ',
            'long'              => 'Long',
            'long_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'orderManagement' => [
        'title'          => 'Order Management',
        'title_singular' => 'Order Management',
    ],
    'order' => [
        'title'          => 'Order',
        'title_singular' => 'Order',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'size'              => 'Size',
            'size_helper'       => ' ',
            'vehicle'           => 'Vehicle',
            'vehicle_helper'    => ' ',
            'from'              => 'From',
            'from_helper'       => ' ',
            'to'                => 'To',
            'to_helper'         => ' ',
            'money'             => 'Money',
            'money_helper'      => ' ',
            'distance'          => 'Distance',
            'distance_helper'   => ' ',
            'datetime'          => 'Date Time',
            'datetime_helper'   => ' ',
            'txn'               => 'Txn',
            'txn_helper'        => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'driver'            => 'Driver',
            'driver_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'route'             => 'Route',
            'route_helper'      => ' ',
        ],
    ],
    'partner' => [
        'title'          => 'Partner',
        'title_singular' => 'Partner',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'address'            => 'Address',
            'address_helper'     => ' ',
            'district'           => 'district',
            'district_helper'    => ' ',
            'lat'                => 'Lat',
            'lat_helper'         => ' ',
            'long'               => 'Long',
            'long_helper'        => ' ',
            'phone'              => 'Phone',
            'phone_helper'       => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'partnerUser' => [
        'title'          => 'Partner Users',
        'title_singular' => 'Partner User',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'password'          => 'Password',
            'password_helper'   => ' ',
            'username'          => 'Username',
            'username_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'route' => [
        'title'          => 'Routes',
        'title_singular' => 'Route',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'location'          => 'Location',
            'location_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'places'            => 'Places',
            'places_helper'     => ' ',
        ],
    ],
    'zone' => [
        'title'          => 'Zone',
        'title_singular' => 'Zone',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'from'              => 'From',
            'from_helper'       => ' ',
            'to'                => 'To',
            'to_helper'         => ' ',
            'distance'          => 'Distance',
            'distance_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'zoneVehicleCategory' => [
        'title'          => 'Zone Vehicle Category',
        'title_singular' => 'Zone Vehicle Category',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'zone'                    => 'Zone',
            'zone_helper'             => ' ',
            'vehicle_category'        => 'Vehicle Category',
            'vehicle_category_helper' => ' ',
            'price'                   => 'Price',
            'price_helper'            => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'place' => [
        'title'          => 'Place',
        'title_singular' => 'Place',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],

];
