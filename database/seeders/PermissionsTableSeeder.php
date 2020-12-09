<?php

namespace Database\Seeders;

use App\Permission;
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
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 18,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 19,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 20,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 21,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 22,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 23,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 24,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 25,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 26,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 27,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 28,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 29,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 30,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 31,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 32,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 33,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 34,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 35,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 36,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 37,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 38,
                'title' => 'lead_source_create',
            ],
            [
                'id'    => 39,
                'title' => 'lead_source_edit',
            ],
            [
                'id'    => 40,
                'title' => 'lead_source_show',
            ],
            [
                'id'    => 41,
                'title' => 'lead_source_delete',
            ],
            [
                'id'    => 42,
                'title' => 'lead_source_access',
            ],
            [
                'id'    => 43,
                'title' => 'market_segment_create',
            ],
            [
                'id'    => 44,
                'title' => 'market_segment_edit',
            ],
            [
                'id'    => 45,
                'title' => 'market_segment_show',
            ],
            [
                'id'    => 46,
                'title' => 'market_segment_delete',
            ],
            [
                'id'    => 47,
                'title' => 'market_segment_access',
            ],
            [
                'id'    => 48,
                'title' => 'crm_field_access',
            ],
            [
                'id'    => 49,
                'title' => 'job_type_create',
            ],
            [
                'id'    => 50,
                'title' => 'job_type_edit',
            ],
            [
                'id'    => 51,
                'title' => 'job_type_show',
            ],
            [
                'id'    => 52,
                'title' => 'job_type_delete',
            ],
            [
                'id'    => 53,
                'title' => 'job_type_access',
            ],
            [
                'id'    => 54,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 55,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 56,
                'title' => 'customer_status_change_create',
            ],
            [
                'id'    => 57,
                'title' => 'customer_status_change_edit',
            ],
            [
                'id'    => 58,
                'title' => 'customer_status_change_show',
            ],
            [
                'id'    => 59,
                'title' => 'customer_status_change_delete',
            ],
            [
                'id'    => 60,
                'title' => 'customer_status_change_access',
            ],
            [
                'id'    => 61,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
