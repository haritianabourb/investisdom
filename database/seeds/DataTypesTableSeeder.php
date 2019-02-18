<?php

use Illuminate\Database\Seeder;

class DataTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_types')->delete();
        
        \DB::table('data_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'users',
                'slug' => 'users',
                'display_name_singular' => 'User',
                'display_name_plural' => 'Users',
                'icon' => 'voyager-person',
                'model_name' => 'TCG\\Voyager\\Models\\User',
                'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'menus',
                'slug' => 'menus',
                'display_name_singular' => 'Menu',
                'display_name_plural' => 'Menus',
                'icon' => 'voyager-list',
                'model_name' => 'TCG\\Voyager\\Models\\Menu',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'roles',
                'slug' => 'roles',
                'display_name_singular' => 'Role',
                'display_name_plural' => 'Roles',
                'icon' => 'voyager-lock',
                'model_name' => 'TCG\\Voyager\\Models\\Role',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'contacts',
                'slug' => 'contacts',
                'display_name_singular' => 'Contact',
                'display_name_plural' => 'Contacts',
                'icon' => 'voyager-people',
                'model_name' => 'App\\Contact',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null}',
                'created_at' => '2018-08-23 17:18:48',
                'updated_at' => '2018-08-23 17:18:48',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'entities',
                'slug' => 'entities',
                'display_name_singular' => 'Entitée',
                'display_name_plural' => 'Entitées',
                'icon' => 'voyager-company',
                'model_name' => 'App\\Entity',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null}',
                'created_at' => '2018-09-10 15:30:20',
                'updated_at' => '2018-09-10 15:30:20',
            ),
            5 => 
            array (
                'id' => 9,
                'name' => 'type_entities',
                'slug' => 'type-entities',
                'display_name_singular' => 'Type Entity',
                'display_name_plural' => 'Type Entities',
                'icon' => NULL,
                'model_name' => 'App\\TypeEntity',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null}',
                'created_at' => '2018-09-10 15:42:35',
                'updated_at' => '2018-09-10 15:42:35',
            ),
            6 => 
            array (
                'id' => 14,
                'name' => 'sncs',
                'slug' => 'sncs',
                'display_name_singular' => 'SNC',
                'display_name_plural' => 'SNC',
                'icon' => 'voyager-wallet',
                'model_name' => 'App\\SNC',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => 'Société à Nomination Commune',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null}',
                'created_at' => '2018-09-10 15:53:00',
                'updated_at' => '2018-09-19 17:27:18',
            ),
            7 => 
            array (
                'id' => 16,
                'name' => 'registration_entities',
                'slug' => 'registration-entities',
                'display_name_singular' => 'Registration Entity',
                'display_name_plural' => 'Registration Entities',
                'icon' => NULL,
                'model_name' => 'App\\RegistrationEntity',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null}',
                'created_at' => '2018-09-10 16:45:25',
                'updated_at' => '2018-09-10 16:45:25',
            ),
            8 => 
            array (
                'id' => 22,
                'name' => 'mandat',
                'slug' => 'mandat',
                'display_name_singular' => 'Proposition de Financement',
                'display_name_plural' => 'Propositions de Financement',
                'icon' => 'voyager-receipt',
                'model_name' => 'App\\Mandat',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null}',
                'created_at' => '2018-09-26 06:30:26',
                'updated_at' => '2018-09-26 06:30:26',
            ),
            9 => 
            array (
                'id' => 13,
                'name' => 'leaseholders',
                'slug' => 'leaseholders',
                'display_name_singular' => 'Locataire',
                'display_name_plural' => 'Locataires',
                'icon' => 'voyager-archive',
                'model_name' => 'App\\Leaseholder',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => 'Locataires',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null}',
                'created_at' => '2018-09-10 15:53:00',
                'updated_at' => '2018-09-26 09:30:00',
            ),
            10 => 
            array (
                'id' => 15,
                'name' => 'suppliers',
                'slug' => 'suppliers',
                'display_name_singular' => 'Fournisseur',
                'display_name_plural' => 'Fournisseurs',
                'icon' => 'voyager-truck',
                'model_name' => 'App\\Supplier',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => 'Fournisseurs',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null}',
                'created_at' => '2018-09-10 15:54:06',
                'updated_at' => '2018-09-26 09:34:25',
            ),
            11 => 
            array (
                'id' => 8,
                'name' => 'intermediaries',
                'slug' => 'intermediaries',
                'display_name_singular' => 'Apporteur d Affaire',
                'display_name_plural' => 'Apporteurs d Affaire',
                'icon' => 'voyager-tag',
                'model_name' => 'App\\Intermediary',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => 'Apporteur d affaire et assimilés',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null}',
                'created_at' => '2018-09-10 15:38:45',
                'updated_at' => '2018-09-26 09:36:38',
            ),
            12 => 
            array (
                'id' => 6,
                'name' => 'banks',
                'slug' => 'banks',
                'display_name_singular' => 'Banque',
                'display_name_plural' => 'Banques',
                'icon' => 'voyager-treasure',
                'model_name' => 'App\\Bank',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => 'Banques et Assimilés',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null}',
                'created_at' => '2018-09-10 15:38:44',
                'updated_at' => '2018-12-27 06:30:38',
            ),
            13 => 
            array (
                'id' => 19,
                'name' => 'taux_cgp',
                'slug' => 'taux-cgp',
                'display_name_singular' => 'Taux Cgp',
                'display_name_plural' => 'Taux Cgps',
                'icon' => 'voyager-edit',
                'model_name' => 'App\\TauxCGP',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null}',
                'created_at' => '2018-09-19 17:21:21',
                'updated_at' => '2019-01-14 07:27:33',
            ),
            14 => 
            array (
                'id' => 20,
                'name' => 'type_contrats',
                'slug' => 'type-contrats',
                'display_name_singular' => 'Type Contrat',
                'display_name_plural' => 'Type Contrats',
                'icon' => NULL,
                'model_name' => 'App\\TypeContrat',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null}',
                'created_at' => '2018-09-19 17:27:46',
                'updated_at' => '2019-01-16 18:26:52',
            ),
            15 => 
            array (
                'id' => 17,
                'name' => 'reservations',
                'slug' => 'reservations',
                'display_name_singular' => 'Réservation',
                'display_name_plural' => 'Réservations',
                'icon' => 'voyager-receipt',
                'model_name' => 'App\\Reservation',
                'policy_name' => 'App\\Policies\\ReservationPolicy',
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null}',
                'created_at' => '2018-09-19 17:13:08',
                'updated_at' => '2019-01-16 20:53:35',
            ),
            16 => 
            array (
                'id' => 7,
                'name' => 'cgps',
                'slug' => 'cgps',
                'display_name_singular' => 'CGP',
                'display_name_plural' => 'CGP',
                'icon' => 'voyager-bookmark',
                'model_name' => 'App\\CGP',
                'policy_name' => NULL,
                'controller' => 'Investis\\CGPController',
                'description' => 'Conseiller en Gestion de Patrimoine',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null}',
                'created_at' => '2018-09-10 15:38:45',
                'updated_at' => '2019-01-17 06:23:10',
            ),
            17 => 
            array (
                'id' => 12,
                'name' => 'investors',
                'slug' => 'investors',
                'display_name_singular' => 'Investisseur',
                'display_name_plural' => 'Investisseurs',
                'icon' => 'voyager-medal-rank-star',
                'model_name' => 'App\\Investor',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => 'Investisseurs',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null}',
                'created_at' => '2018-09-10 15:53:00',
                'updated_at' => '2019-02-18 11:25:06',
            ),
        ));
        
        
    }
}