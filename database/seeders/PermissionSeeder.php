<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run():void
    {
        $permissions = [
            'Thêm tài khoản',
            'Sửa tài khoản',
            'Xóa tài khoản',
            'Thêm chức vụ',
            'Sửa chức vụ',
            'Xóa chức vụ',
            'Xem thông tin tài khoản',
            'Xem thông tin chức vụ',
            'Thêm bất động sản',
            'Sửa bất động sản',
            'Xóa bất động sản',
            'Xem bất động sản',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
