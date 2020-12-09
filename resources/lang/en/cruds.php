<?php

return [
    'userManagement'       => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'           => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
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
    'role'                 => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
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
    'user'                 => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
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
        ],
    ],
    'basicCRM'             => [
        'title'          => 'CRM',
        'title_singular' => 'CRM',
    ],
    'crmStatus'            => [
        'title'          => 'Statuses',
        'title_singular' => 'Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'crmCustomer'          => [
        'title'          => 'Customers',
        'title_singular' => 'Customer',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'first_name'              => 'First name',
            'first_name_helper'       => ' ',
            'last_name'               => 'Last name',
            'last_name_helper'        => ' ',
            'status'                  => 'Status',
            'status_helper'           => ' ',
            'email'                   => 'Email',
            'email_helper'            => ' ',
            'phone'                   => 'Phone',
            'phone_helper'            => ' ',
            'address'                 => 'Address',
            'address_helper'          => ' ',
            'description'             => 'Description',
            'description_helper'      => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated At',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted At',
            'deleted_at_helper'       => ' ',
            'market_segment'          => 'Market Segment',
            'market_segment_helper'   => ' ',
            'vehicle_reg'             => 'Vehicle Reg',
            'vehicle_reg_helper'      => ' ',
            'job_type'                => 'Job Type',
            'job_type_helper'         => ' ',
            'title'                   => 'Title',
            'title_helper'            => ' ',
            'vehicle_make'            => 'Vehicle Make',
            'vehicle_make_helper'     => ' ',
            'salesperson'             => 'Salesperson',
            'salesperson_helper'      => ' ',
            'instagram'               => 'Instagram',
            'instagram_helper'        => ' ',
            'facebook'                => 'Facebook',
            'facebook_helper'         => ' ',
            'social_other'            => 'Social Other',
            'social_other_helper'     => ' ',
            'vehicle_model'           => 'Vehicle Model',
            'vehicle_model_helper'    => ' ',
            'vehicle_age'             => 'Vehicle Age',
            'vehicle_age_helper'      => ' ',
            'vehicle_colour'          => 'Vehicle Colour',
            'vehicle_colour_helper'   => ' ',
            'price'                   => 'Price',
            'price_helper'            => ' ',
            'lead_source'             => 'Lead Source',
            'lead_source_helper'      => ' ',
            'date_time'               => 'Date Time',
            'date_time_helper'        => ' ',
            'address_2'               => 'Address 2',
            'address_2_helper'        => ' ',
            'address_3'               => 'Address 3',
            'address_3_helper'        => ' ',
            'address_town'            => 'Address Town',
            'address_town_helper'     => ' ',
            'address_city'            => 'Address City',
            'address_city_helper'     => ' ',
            'address_county'          => 'Address County',
            'address_county_helper'   => ' ',
            'address_postcode'        => 'Address Postcode',
            'address_postcode_helper' => ' ',
            'address_country'         => 'Address Country',
            'address_country_helper'  => ' ',
            'job_notes'               => 'Job Notes',
            'job_notes_helper'        => ' ',
        ],
    ],
    'crmNote'              => [
        'title'          => 'Notes',
        'title_singular' => 'Note',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'customer'          => 'Customer',
            'customer_helper'   => ' ',
            'note'              => 'Note',
            'note_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'crmDocument'          => [
        'title'          => 'Documents',
        'title_singular' => 'Document',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'customer'             => 'Customer',
            'customer_helper'      => ' ',
            'document_file'        => 'File',
            'document_file_helper' => ' ',
            'name'                 => 'Document name',
            'name_helper'          => ' ',
            'description'          => 'Description',
            'description_helper'   => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated At',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted At',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'leadSource'           => [
        'title'          => 'Lead Sources',
        'title_singular' => 'Lead Source',
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
    'marketSegment'        => [
        'title'          => 'Market Segments',
        'title_singular' => 'Market Segment',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
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
    'crmField'             => [
        'title'          => 'CRM Fields',
        'title_singular' => 'CRM Field',
    ],
    'jobType'              => [
        'title'          => 'Job Types',
        'title_singular' => 'Job Type',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'title'                  => 'Title',
            'title_helper'           => ' ',
            'description'            => 'Description',
            'description_helper'     => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'category_number'        => 'Category Number',
            'category_number_helper' => ' ',
        ],
    ],
    'auditLog'             => [
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
    'customerStatusChange' => [
        'title'          => 'Customer Status Changes',
        'title_singular' => 'Customer Status Change',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'old_status'        => 'Old Status',
            'old_status_helper' => ' ',
            'new_status'        => 'New Status',
            'new_status_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
];
