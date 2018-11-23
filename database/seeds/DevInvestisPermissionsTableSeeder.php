<?php

use Illuminate\Database\Seeder;

class DevInvestisPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'browse_admin',
                'table_name' => NULL,
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'browse_bread',
                'table_name' => NULL,
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'browse_database',
                'table_name' => NULL,
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'browse_media',
                'table_name' => NULL,
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'browse_compass',
                'table_name' => NULL,
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'browse_menus',
                'table_name' => 'menus',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'read_menus',
                'table_name' => 'menus',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'edit_menus',
                'table_name' => 'menus',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'add_menus',
                'table_name' => 'menus',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'delete_menus',
                'table_name' => 'menus',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'browse_roles',
                'table_name' => 'roles',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'read_roles',
                'table_name' => 'roles',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'edit_roles',
                'table_name' => 'roles',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'add_roles',
                'table_name' => 'roles',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'delete_roles',
                'table_name' => 'roles',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'browse_users',
                'table_name' => 'users',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'read_users',
                'table_name' => 'users',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            17 => 
            array (
                'id' => 18,
                'key' => 'edit_users',
                'table_name' => 'users',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            18 => 
            array (
                'id' => 19,
                'key' => 'add_users',
                'table_name' => 'users',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            19 => 
            array (
                'id' => 20,
                'key' => 'delete_users',
                'table_name' => 'users',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            20 => 
            array (
                'id' => 21,
                'key' => 'browse_settings',
                'table_name' => 'settings',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            21 => 
            array (
                'id' => 22,
                'key' => 'read_settings',
                'table_name' => 'settings',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            22 => 
            array (
                'id' => 23,
                'key' => 'edit_settings',
                'table_name' => 'settings',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            23 => 
            array (
                'id' => 24,
                'key' => 'add_settings',
                'table_name' => 'settings',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            24 => 
            array (
                'id' => 25,
                'key' => 'delete_settings',
                'table_name' => 'settings',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            25 => 
            array (
                'id' => 26,
                'key' => 'browse_hooks',
                'table_name' => NULL,
                'created_at' => '2018-08-12 14:26:05',
                'updated_at' => '2018-08-12 14:26:05',
            ),
            26 => 
            array (
                'id' => 27,
                'key' => 'browse_themes',
                'table_name' => 'admin',
                'created_at' => '2018-08-23 17:09:17',
                'updated_at' => '2018-08-23 17:09:17',
            ),
            27 => 
            array (
                'id' => 28,
                'key' => 'browse_contacts',
                'table_name' => 'contacts',
                'created_at' => '2018-08-23 17:18:48',
                'updated_at' => '2018-08-23 17:18:48',
            ),
            28 => 
            array (
                'id' => 29,
                'key' => 'read_contacts',
                'table_name' => 'contacts',
                'created_at' => '2018-08-23 17:18:48',
                'updated_at' => '2018-08-23 17:18:48',
            ),
            29 => 
            array (
                'id' => 30,
                'key' => 'edit_contacts',
                'table_name' => 'contacts',
                'created_at' => '2018-08-23 17:18:48',
                'updated_at' => '2018-08-23 17:18:48',
            ),
            30 => 
            array (
                'id' => 31,
                'key' => 'add_contacts',
                'table_name' => 'contacts',
                'created_at' => '2018-08-23 17:18:48',
                'updated_at' => '2018-08-23 17:18:48',
            ),
            31 => 
            array (
                'id' => 32,
                'key' => 'delete_contacts',
                'table_name' => 'contacts',
                'created_at' => '2018-08-23 17:18:48',
                'updated_at' => '2018-08-23 17:18:48',
            ),
            32 => 
            array (
                'id' => 33,
                'key' => 'browse_entities',
                'table_name' => 'entities',
                'created_at' => '2018-09-10 15:30:20',
                'updated_at' => '2018-09-10 15:30:20',
            ),
            33 => 
            array (
                'id' => 34,
                'key' => 'read_entities',
                'table_name' => 'entities',
                'created_at' => '2018-09-10 15:30:20',
                'updated_at' => '2018-09-10 15:30:20',
            ),
            34 => 
            array (
                'id' => 35,
                'key' => 'edit_entities',
                'table_name' => 'entities',
                'created_at' => '2018-09-10 15:30:20',
                'updated_at' => '2018-09-10 15:30:20',
            ),
            35 => 
            array (
                'id' => 36,
                'key' => 'add_entities',
                'table_name' => 'entities',
                'created_at' => '2018-09-10 15:30:20',
                'updated_at' => '2018-09-10 15:30:20',
            ),
            36 => 
            array (
                'id' => 37,
                'key' => 'delete_entities',
                'table_name' => 'entities',
                'created_at' => '2018-09-10 15:30:20',
                'updated_at' => '2018-09-10 15:30:20',
            ),
            37 => 
            array (
                'id' => 38,
                'key' => 'browse_banks',
                'table_name' => 'banks',
                'created_at' => '2018-09-10 15:38:45',
                'updated_at' => '2018-09-10 15:38:45',
            ),
            38 => 
            array (
                'id' => 39,
                'key' => 'read_banks',
                'table_name' => 'banks',
                'created_at' => '2018-09-10 15:38:45',
                'updated_at' => '2018-09-10 15:38:45',
            ),
            39 => 
            array (
                'id' => 40,
                'key' => 'edit_banks',
                'table_name' => 'banks',
                'created_at' => '2018-09-10 15:38:45',
                'updated_at' => '2018-09-10 15:38:45',
            ),
            40 => 
            array (
                'id' => 41,
                'key' => 'add_banks',
                'table_name' => 'banks',
                'created_at' => '2018-09-10 15:38:45',
                'updated_at' => '2018-09-10 15:38:45',
            ),
            41 => 
            array (
                'id' => 42,
                'key' => 'delete_banks',
                'table_name' => 'banks',
                'created_at' => '2018-09-10 15:38:45',
                'updated_at' => '2018-09-10 15:38:45',
            ),
            42 => 
            array (
                'id' => 43,
                'key' => 'browse_cgps',
                'table_name' => 'cgps',
                'created_at' => '2018-09-10 15:38:45',
                'updated_at' => '2018-09-10 15:38:45',
            ),
            43 => 
            array (
                'id' => 44,
                'key' => 'read_cgps',
                'table_name' => 'cgps',
                'created_at' => '2018-09-10 15:38:45',
                'updated_at' => '2018-09-10 15:38:45',
            ),
            44 => 
            array (
                'id' => 45,
                'key' => 'edit_cgps',
                'table_name' => 'cgps',
                'created_at' => '2018-09-10 15:38:45',
                'updated_at' => '2018-09-10 15:38:45',
            ),
            45 => 
            array (
                'id' => 46,
                'key' => 'add_cgps',
                'table_name' => 'cgps',
                'created_at' => '2018-09-10 15:38:45',
                'updated_at' => '2018-09-10 15:38:45',
            ),
            46 => 
            array (
                'id' => 47,
                'key' => 'delete_cgps',
                'table_name' => 'cgps',
                'created_at' => '2018-09-10 15:38:45',
                'updated_at' => '2018-09-10 15:38:45',
            ),
            47 => 
            array (
                'id' => 48,
                'key' => 'browse_type_entities',
                'table_name' => 'type_entities',
                'created_at' => '2018-09-10 15:42:35',
                'updated_at' => '2018-09-10 15:42:35',
            ),
            48 => 
            array (
                'id' => 49,
                'key' => 'read_type_entities',
                'table_name' => 'type_entities',
                'created_at' => '2018-09-10 15:42:35',
                'updated_at' => '2018-09-10 15:42:35',
            ),
            49 => 
            array (
                'id' => 50,
                'key' => 'edit_type_entities',
                'table_name' => 'type_entities',
                'created_at' => '2018-09-10 15:42:35',
                'updated_at' => '2018-09-10 15:42:35',
            ),
            50 => 
            array (
                'id' => 51,
                'key' => 'add_type_entities',
                'table_name' => 'type_entities',
                'created_at' => '2018-09-10 15:42:35',
                'updated_at' => '2018-09-10 15:42:35',
            ),
            51 => 
            array (
                'id' => 52,
                'key' => 'delete_type_entities',
                'table_name' => 'type_entities',
                'created_at' => '2018-09-10 15:42:35',
                'updated_at' => '2018-09-10 15:42:35',
            ),
            52 => 
            array (
                'id' => 53,
                'key' => 'browse_intermediaries',
                'table_name' => 'intermediaries',
                'created_at' => '2018-09-10 15:53:00',
                'updated_at' => '2018-09-10 15:53:00',
            ),
            53 => 
            array (
                'id' => 54,
                'key' => 'read_intermediaries',
                'table_name' => 'intermediaries',
                'created_at' => '2018-09-10 15:53:00',
                'updated_at' => '2018-09-10 15:53:00',
            ),
            54 => 
            array (
                'id' => 55,
                'key' => 'edit_intermediaries',
                'table_name' => 'intermediaries',
                'created_at' => '2018-09-10 15:53:00',
                'updated_at' => '2018-09-10 15:53:00',
            ),
            55 => 
            array (
                'id' => 56,
                'key' => 'add_intermediaries',
                'table_name' => 'intermediaries',
                'created_at' => '2018-09-10 15:53:00',
                'updated_at' => '2018-09-10 15:53:00',
            ),
            56 => 
            array (
                'id' => 57,
                'key' => 'delete_intermediaries',
                'table_name' => 'intermediaries',
                'created_at' => '2018-09-10 15:53:00',
                'updated_at' => '2018-09-10 15:53:00',
            ),
            57 => 
            array (
                'id' => 58,
                'key' => 'browse_investors',
                'table_name' => 'investors',
                'created_at' => '2018-09-10 15:53:00',
                'updated_at' => '2018-09-10 15:53:00',
            ),
            58 => 
            array (
                'id' => 59,
                'key' => 'read_investors',
                'table_name' => 'investors',
                'created_at' => '2018-09-10 15:53:00',
                'updated_at' => '2018-09-10 15:53:00',
            ),
            59 => 
            array (
                'id' => 60,
                'key' => 'edit_investors',
                'table_name' => 'investors',
                'created_at' => '2018-09-10 15:53:00',
                'updated_at' => '2018-09-10 15:53:00',
            ),
            60 => 
            array (
                'id' => 61,
                'key' => 'add_investors',
                'table_name' => 'investors',
                'created_at' => '2018-09-10 15:53:00',
                'updated_at' => '2018-09-10 15:53:00',
            ),
            61 => 
            array (
                'id' => 62,
                'key' => 'delete_investors',
                'table_name' => 'investors',
                'created_at' => '2018-09-10 15:53:00',
                'updated_at' => '2018-09-10 15:53:00',
            ),
            62 => 
            array (
                'id' => 63,
                'key' => 'browse_leaseholders',
                'table_name' => 'leaseholders',
                'created_at' => '2018-09-10 15:53:00',
                'updated_at' => '2018-09-10 15:53:00',
            ),
            63 => 
            array (
                'id' => 64,
                'key' => 'read_leaseholders',
                'table_name' => 'leaseholders',
                'created_at' => '2018-09-10 15:53:00',
                'updated_at' => '2018-09-10 15:53:00',
            ),
            64 => 
            array (
                'id' => 65,
                'key' => 'edit_leaseholders',
                'table_name' => 'leaseholders',
                'created_at' => '2018-09-10 15:53:00',
                'updated_at' => '2018-09-10 15:53:00',
            ),
            65 => 
            array (
                'id' => 66,
                'key' => 'add_leaseholders',
                'table_name' => 'leaseholders',
                'created_at' => '2018-09-10 15:53:00',
                'updated_at' => '2018-09-10 15:53:00',
            ),
            66 => 
            array (
                'id' => 67,
                'key' => 'delete_leaseholders',
                'table_name' => 'leaseholders',
                'created_at' => '2018-09-10 15:53:00',
                'updated_at' => '2018-09-10 15:53:00',
            ),
            67 => 
            array (
                'id' => 68,
                'key' => 'browse_sncs',
                'table_name' => 'sncs',
                'created_at' => '2018-09-10 15:54:06',
                'updated_at' => '2018-09-10 15:54:06',
            ),
            68 => 
            array (
                'id' => 69,
                'key' => 'read_sncs',
                'table_name' => 'sncs',
                'created_at' => '2018-09-10 15:54:06',
                'updated_at' => '2018-09-10 15:54:06',
            ),
            69 => 
            array (
                'id' => 70,
                'key' => 'edit_sncs',
                'table_name' => 'sncs',
                'created_at' => '2018-09-10 15:54:06',
                'updated_at' => '2018-09-10 15:54:06',
            ),
            70 => 
            array (
                'id' => 71,
                'key' => 'add_sncs',
                'table_name' => 'sncs',
                'created_at' => '2018-09-10 15:54:06',
                'updated_at' => '2018-09-10 15:54:06',
            ),
            71 => 
            array (
                'id' => 72,
                'key' => 'delete_sncs',
                'table_name' => 'sncs',
                'created_at' => '2018-09-10 15:54:06',
                'updated_at' => '2018-09-10 15:54:06',
            ),
            72 => 
            array (
                'id' => 73,
                'key' => 'browse_suppliers',
                'table_name' => 'suppliers',
                'created_at' => '2018-09-10 15:54:06',
                'updated_at' => '2018-09-10 15:54:06',
            ),
            73 => 
            array (
                'id' => 74,
                'key' => 'read_suppliers',
                'table_name' => 'suppliers',
                'created_at' => '2018-09-10 15:54:06',
                'updated_at' => '2018-09-10 15:54:06',
            ),
            74 => 
            array (
                'id' => 75,
                'key' => 'edit_suppliers',
                'table_name' => 'suppliers',
                'created_at' => '2018-09-10 15:54:06',
                'updated_at' => '2018-09-10 15:54:06',
            ),
            75 => 
            array (
                'id' => 76,
                'key' => 'add_suppliers',
                'table_name' => 'suppliers',
                'created_at' => '2018-09-10 15:54:06',
                'updated_at' => '2018-09-10 15:54:06',
            ),
            76 => 
            array (
                'id' => 77,
                'key' => 'delete_suppliers',
                'table_name' => 'suppliers',
                'created_at' => '2018-09-10 15:54:06',
                'updated_at' => '2018-09-10 15:54:06',
            ),
            77 => 
            array (
                'id' => 78,
                'key' => 'browse_registration_entities',
                'table_name' => 'registration_entities',
                'created_at' => '2018-09-10 16:45:25',
                'updated_at' => '2018-09-10 16:45:25',
            ),
            78 => 
            array (
                'id' => 79,
                'key' => 'read_registration_entities',
                'table_name' => 'registration_entities',
                'created_at' => '2018-09-10 16:45:25',
                'updated_at' => '2018-09-10 16:45:25',
            ),
            79 => 
            array (
                'id' => 80,
                'key' => 'edit_registration_entities',
                'table_name' => 'registration_entities',
                'created_at' => '2018-09-10 16:45:25',
                'updated_at' => '2018-09-10 16:45:25',
            ),
            80 => 
            array (
                'id' => 81,
                'key' => 'add_registration_entities',
                'table_name' => 'registration_entities',
                'created_at' => '2018-09-10 16:45:25',
                'updated_at' => '2018-09-10 16:45:25',
            ),
            81 => 
            array (
                'id' => 82,
                'key' => 'delete_registration_entities',
                'table_name' => 'registration_entities',
                'created_at' => '2018-09-10 16:45:25',
                'updated_at' => '2018-09-10 16:45:25',
            ),
            82 => 
            array (
                'id' => 83,
                'key' => 'browse_reservations',
                'table_name' => 'reservations',
                'created_at' => '2018-09-19 17:13:08',
                'updated_at' => '2018-09-19 17:13:08',
            ),
            83 => 
            array (
                'id' => 84,
                'key' => 'read_reservations',
                'table_name' => 'reservations',
                'created_at' => '2018-09-19 17:13:08',
                'updated_at' => '2018-09-19 17:13:08',
            ),
            84 => 
            array (
                'id' => 85,
                'key' => 'edit_reservations',
                'table_name' => 'reservations',
                'created_at' => '2018-09-19 17:13:08',
                'updated_at' => '2018-09-19 17:13:08',
            ),
            85 => 
            array (
                'id' => 86,
                'key' => 'add_reservations',
                'table_name' => 'reservations',
                'created_at' => '2018-09-19 17:13:08',
                'updated_at' => '2018-09-19 17:13:08',
            ),
            86 => 
            array (
                'id' => 87,
                'key' => 'delete_reservations',
                'table_name' => 'reservations',
                'created_at' => '2018-09-19 17:13:08',
                'updated_at' => '2018-09-19 17:13:08',
            ),
            87 => 
            array (
                'id' => 88,
                'key' => 'browse_taux_cgp',
                'table_name' => 'taux_cgp',
                'created_at' => '2018-09-19 17:21:21',
                'updated_at' => '2018-09-19 17:21:21',
            ),
            88 => 
            array (
                'id' => 89,
                'key' => 'read_taux_cgp',
                'table_name' => 'taux_cgp',
                'created_at' => '2018-09-19 17:21:21',
                'updated_at' => '2018-09-19 17:21:21',
            ),
            89 => 
            array (
                'id' => 90,
                'key' => 'edit_taux_cgp',
                'table_name' => 'taux_cgp',
                'created_at' => '2018-09-19 17:21:21',
                'updated_at' => '2018-09-19 17:21:21',
            ),
            90 => 
            array (
                'id' => 91,
                'key' => 'add_taux_cgp',
                'table_name' => 'taux_cgp',
                'created_at' => '2018-09-19 17:21:21',
                'updated_at' => '2018-09-19 17:21:21',
            ),
            91 => 
            array (
                'id' => 92,
                'key' => 'delete_taux_cgp',
                'table_name' => 'taux_cgp',
                'created_at' => '2018-09-19 17:21:21',
                'updated_at' => '2018-09-19 17:21:21',
            ),
            92 => 
            array (
                'id' => 93,
                'key' => 'browse_type_contrats',
                'table_name' => 'type_contrats',
                'created_at' => '2018-09-19 17:27:46',
                'updated_at' => '2018-09-19 17:27:46',
            ),
            93 => 
            array (
                'id' => 94,
                'key' => 'read_type_contrats',
                'table_name' => 'type_contrats',
                'created_at' => '2018-09-19 17:27:46',
                'updated_at' => '2018-09-19 17:27:46',
            ),
            94 => 
            array (
                'id' => 95,
                'key' => 'edit_type_contrats',
                'table_name' => 'type_contrats',
                'created_at' => '2018-09-19 17:27:46',
                'updated_at' => '2018-09-19 17:27:46',
            ),
            95 => 
            array (
                'id' => 96,
                'key' => 'add_type_contrats',
                'table_name' => 'type_contrats',
                'created_at' => '2018-09-19 17:27:46',
                'updated_at' => '2018-09-19 17:27:46',
            ),
            96 => 
            array (
                'id' => 97,
                'key' => 'delete_type_contrats',
                'table_name' => 'type_contrats',
                'created_at' => '2018-09-19 17:27:46',
                'updated_at' => '2018-09-19 17:27:46',
            ),
            97 => 
            array (
                'id' => 98,
                'key' => 'browse_mandat',
                'table_name' => 'mandat',
                'created_at' => '2018-09-26 06:30:26',
                'updated_at' => '2018-09-26 06:30:26',
            ),
            98 => 
            array (
                'id' => 99,
                'key' => 'read_mandat',
                'table_name' => 'mandat',
                'created_at' => '2018-09-26 06:30:26',
                'updated_at' => '2018-09-26 06:30:26',
            ),
            99 => 
            array (
                'id' => 100,
                'key' => 'edit_mandat',
                'table_name' => 'mandat',
                'created_at' => '2018-09-26 06:30:26',
                'updated_at' => '2018-09-26 06:30:26',
            ),
            100 => 
            array (
                'id' => 101,
                'key' => 'add_mandat',
                'table_name' => 'mandat',
                'created_at' => '2018-09-26 06:30:26',
                'updated_at' => '2018-09-26 06:30:26',
            ),
            101 => 
            array (
                'id' => 102,
                'key' => 'delete_mandat',
                'table_name' => 'mandat',
                'created_at' => '2018-09-26 06:30:26',
                'updated_at' => '2018-09-26 06:30:26',
            ),
        ));
        
        
    }
}