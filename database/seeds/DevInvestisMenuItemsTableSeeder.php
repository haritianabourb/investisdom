<?php

use Illuminate\Database\Seeder;

class DevInvestisMenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_items')->delete();
        
        \DB::table('menu_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'menu_id' => 1,
                'title' => 'Dashboard',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-bar-chart',
                'color' => '--000000',
                'parent_id' => NULL,
                'order' => 1,
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 15:40:57',
                'route' => 'voyager.dashboard',
                'parameters' => 'null',
            ),
            1 => 
            array (
                'id' => 3,
                'menu_id' => 1,
                'title' => 'Utilisateurs',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-person',
                'color' => '#000000',
                'parent_id' => 14,
                'order' => 1,
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-09-10 16:14:13',
                'route' => 'voyager.users.index',
                'parameters' => 'null',
            ),
            2 => 
            array (
                'id' => 4,
                'menu_id' => 1,
                'title' => 'Roles',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-lock',
                'color' => NULL,
                'parent_id' => 14,
                'order' => 2,
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-09-10 16:14:13',
                'route' => 'voyager.roles.index',
                'parameters' => NULL,
            ),
            3 => 
            array (
                'id' => 6,
                'menu_id' => 1,
                'title' => 'Menu Builder',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-list',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 1,
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-28 08:06:57',
                'route' => 'voyager.menus.index',
                'parameters' => NULL,
            ),
            4 => 
            array (
                'id' => 7,
                'menu_id' => 1,
                'title' => 'Database',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-data',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 2,
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-28 08:06:57',
                'route' => 'voyager.database.index',
                'parameters' => NULL,
            ),
            5 => 
            array (
                'id' => 8,
                'menu_id' => 1,
                'title' => 'Compass',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-compass',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 3,
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-28 08:06:57',
                'route' => 'voyager.compass.index',
                'parameters' => NULL,
            ),
            6 => 
            array (
                'id' => 9,
                'menu_id' => 1,
                'title' => 'BREAD',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-bread',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 4,
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-28 08:06:57',
                'route' => 'voyager.bread.index',
                'parameters' => NULL,
            ),
            7 => 
            array (
                'id' => 11,
                'menu_id' => 1,
                'title' => 'Hooks',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-hook',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 5,
                'created_at' => '2018-08-12 14:26:05',
                'updated_at' => '2018-08-28 08:06:57',
                'route' => 'voyager.hooks',
                'parameters' => NULL,
            ),
            8 => 
            array (
                'id' => 12,
                'menu_id' => 1,
                'title' => 'Themes',
                'url' => '/admin/themes',
                'target' => '_self',
                'icon_class' => 'voyager-paint-bucket',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 6,
                'created_at' => '2018-08-23 17:09:17',
                'updated_at' => '2018-08-28 08:06:57',
                'route' => NULL,
                'parameters' => NULL,
            ),
            9 => 
            array (
                'id' => 13,
                'menu_id' => 1,
                'title' => 'Contacts',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-people',
                'color' => NULL,
                'parent_id' => 18,
                'order' => 1,
                'created_at' => '2018-08-23 17:18:48',
                'updated_at' => '2018-09-10 15:58:18',
                'route' => 'voyager.contacts.index',
                'parameters' => NULL,
            ),
            10 => 
            array (
                'id' => 15,
                'menu_id' => 1,
                'title' => 'Taux CGP',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-edit',
                'color' => '#000000',
                'parent_id' => 22,
                'order' => 3,
                'created_at' => '2018-08-23 17:42:47',
                'updated_at' => '2018-09-19 17:17:08',
                'route' => 'voyager.taux-cgp.index',
                'parameters' => 'null',
            ),
            11 => 
            array (
                'id' => 17,
                'menu_id' => 1,
                'title' => 'Type Entities',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-categories',
                'color' => '#000000',
                'parent_id' => 14,
                'order' => 4,
                'created_at' => '2018-09-10 15:42:35',
                'updated_at' => '2018-09-19 17:28:16',
                'route' => 'voyager.type-entities.index',
                'parameters' => 'null',
            ),
            12 => 
            array (
                'id' => 20,
                'menu_id' => 1,
                'title' => 'Ajouter une SNC',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-plus',
                'color' => '#000000',
                'parent_id' => 19,
                'order' => 1,
                'created_at' => '2018-09-10 16:00:45',
                'updated_at' => '2018-09-10 16:00:55',
                'route' => 'voyager.sncs.create',
                'parameters' => NULL,
            ),
            13 => 
            array (
                'id' => 21,
                'menu_id' => 1,
                'title' => 'Liste des SNC',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-wallet',
                'color' => '#000000',
                'parent_id' => 19,
                'order' => 2,
                'created_at' => '2018-09-10 16:04:48',
                'updated_at' => '2018-09-10 16:04:56',
                'route' => 'voyager.sncs.index',
                'parameters' => NULL,
            ),
            14 => 
            array (
                'id' => 23,
                'menu_id' => 1,
                'title' => 'Ajouter un CGP',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-plus',
                'color' => '#000000',
                'parent_id' => 22,
                'order' => 1,
                'created_at' => '2018-09-10 16:07:51',
                'updated_at' => '2018-09-10 16:08:09',
                'route' => 'voyager.cgps.create',
                'parameters' => 'null',
            ),
            15 => 
            array (
                'id' => 24,
                'menu_id' => 1,
                'title' => 'Liste des CGP',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-archive',
                'color' => '#000000',
                'parent_id' => 22,
                'order' => 2,
                'created_at' => '2018-09-10 16:09:44',
                'updated_at' => '2018-09-10 16:09:53',
                'route' => 'voyager.cgps.index',
                'parameters' => NULL,
            ),
            16 => 
            array (
                'id' => 25,
                'menu_id' => 1,
                'title' => 'Banque',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-treasure',
                'color' => '#000000',
                'parent_id' => 18,
                'order' => 2,
                'created_at' => '2018-09-10 16:11:55',
                'updated_at' => '2018-09-19 17:28:15',
                'route' => 'voyager.banks.index',
                'parameters' => NULL,
            ),
            17 => 
            array (
                'id' => 30,
                'menu_id' => 1,
                'title' => 'Registration Entities',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-categories',
                'color' => '#000000',
                'parent_id' => 14,
                'order' => 5,
                'created_at' => '2018-09-10 16:45:25',
                'updated_at' => '2018-09-19 17:28:16',
                'route' => 'voyager.registration-entities.index',
                'parameters' => 'null',
            ),
            18 => 
            array (
                'id' => 31,
                'menu_id' => 1,
                'title' => 'Réservations',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-receipt',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 2,
                'created_at' => '2018-09-19 17:13:08',
                'updated_at' => '2018-09-19 17:14:17',
                'route' => 'voyager.reservations.index',
                'parameters' => NULL,
            ),
            19 => 
            array (
                'id' => 33,
                'menu_id' => 1,
                'title' => 'Type Contrats',
                'url' => '',
                'target' => '_self',
                'icon_class' => NULL,
                'color' => NULL,
                'parent_id' => 14,
                'order' => 3,
                'created_at' => '2018-09-19 17:27:46',
                'updated_at' => '2018-09-19 17:28:15',
                'route' => 'voyager.type-contrats.index',
                'parameters' => NULL,
            ),
            20 => 
            array (
                'id' => 22,
                'menu_id' => 1,
                'title' => 'CGP',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-archive',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 5,
                'created_at' => '2018-09-10 16:07:18',
                'updated_at' => '2018-09-26 06:33:16',
                'route' => NULL,
                'parameters' => '',
            ),
            21 => 
            array (
                'id' => 27,
                'menu_id' => 1,
                'title' => 'Investisseurs',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-medal-rank-star',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 6,
                'created_at' => '2018-09-10 16:15:09',
                'updated_at' => '2018-09-26 06:33:16',
                'route' => 'voyager.investors.index',
                'parameters' => 'null',
            ),
            22 => 
            array (
                'id' => 28,
                'menu_id' => 1,
                'title' => 'Locataires',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-archive',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 7,
                'created_at' => '2018-09-10 16:16:37',
                'updated_at' => '2018-09-26 06:33:16',
                'route' => 'voyager.leaseholders.index',
                'parameters' => NULL,
            ),
            23 => 
            array (
                'id' => 26,
                'menu_id' => 1,
                'title' => 'Apporteurs d affaire',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-tag',
                'color' => '--000000',
                'parent_id' => NULL,
                'order' => 8,
                'created_at' => '2018-09-10 16:13:59',
                'updated_at' => '2018-09-26 06:33:16',
                'route' => 'voyager.intermediaries.index',
                'parameters' => NULL,
            ),
            24 => 
            array (
                'id' => 29,
                'menu_id' => 1,
                'title' => 'Fournisseurs',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-truck',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 9,
                'created_at' => '2018-09-10 16:19:00',
                'updated_at' => '2018-09-26 06:33:16',
                'route' => 'voyager.suppliers.index',
                'parameters' => NULL,
            ),
            25 => 
            array (
                'id' => 18,
                'menu_id' => 1,
                'title' => 'Répertoire',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-group',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 10,
                'created_at' => '2018-09-10 15:57:51',
                'updated_at' => '2018-09-26 06:33:16',
                'route' => NULL,
                'parameters' => '',
            ),
            26 => 
            array (
                'id' => 14,
                'menu_id' => 1,
                'title' => 'Paramètres',
                'url' => '#',
                'target' => '_self',
                'icon_class' => 'voyager-settings',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 11,
                'created_at' => '2018-08-23 17:24:32',
                'updated_at' => '2018-09-26 06:33:16',
                'route' => NULL,
                'parameters' => '',
            ),
            27 => 
            array (
                'id' => 2,
                'menu_id' => 1,
                'title' => 'Media',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-images',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 12,
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-09-26 06:33:16',
                'route' => 'voyager.media.index',
                'parameters' => NULL,
            ),
            28 => 
            array (
                'id' => 10,
                'menu_id' => 1,
                'title' => 'Settings',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-settings',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 13,
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-09-26 06:33:16',
                'route' => 'voyager.settings.index',
                'parameters' => NULL,
            ),
            29 => 
            array (
                'id' => 5,
                'menu_id' => 1,
                'title' => 'Tools',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-tools',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 14,
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-09-26 06:33:16',
                'route' => NULL,
                'parameters' => NULL,
            ),
            30 => 
            array (
                'id' => 34,
                'menu_id' => 1,
                'title' => 'Propositions de Financement',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-certificate',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 3,
                'created_at' => '2018-09-26 06:30:26',
                'updated_at' => '2018-09-26 06:33:42',
                'route' => 'voyager.mandat.index',
                'parameters' => 'null',
            ),
            31 => 
            array (
                'id' => 35,
                'menu_id' => 1,
                'title' => 'SNC en Stock',
                'url' => '',
                'target' => '_self',
                'icon_class' => NULL,
                'color' => '#000000',
                'parent_id' => 19,
                'order' => 3,
                'created_at' => '2018-11-02 06:40:29',
                'updated_at' => '2018-11-02 06:40:41',
                'route' => 'voyager.sncs.index',
                'parameters' => '{"s":"IN_STOCK","key":"status","filter":"equals"}',
            ),
            32 => 
            array (
                'id' => 36,
                'menu_id' => 1,
                'title' => 'SNC Active',
                'url' => '',
                'target' => '_self',
                'icon_class' => NULL,
                'color' => '#000000',
                'parent_id' => 19,
                'order' => 4,
                'created_at' => '2018-11-02 06:42:53',
                'updated_at' => '2018-11-02 06:43:09',
                'route' => 'voyager.sncs.index',
                'parameters' => '{"s":"ACTIVE","key":"status","filter":"equals"}',
            ),
            33 => 
            array (
                'id' => 39,
                'menu_id' => 1,
                'title' => 'SNC Fermées',
                'url' => '',
                'target' => '_self',
                'icon_class' => NULL,
                'color' => '#000000',
                'parent_id' => 19,
                'order' => 7,
                'created_at' => '2018-11-02 06:47:19',
                'updated_at' => '2018-11-02 14:27:08',
                'route' => 'voyager.sncs.index',
                'parameters' => '{"s":"CLOSE","key":"status","filter":"equals"}',
            ),
            34 => 
            array (
                'id' => 38,
                'menu_id' => 1,
                'title' => 'Terminées ouvertes à la comm',
                'url' => '',
                'target' => '_self',
                'icon_class' => NULL,
                'color' => '#000000',
                'parent_id' => 19,
                'order' => 6,
                'created_at' => '2018-11-02 06:46:12',
                'updated_at' => '2018-11-02 14:28:15',
                'route' => 'voyager.sncs.index',
                'parameters' => '{"s":"MARKETING_ON","key":"status","filter":"equals"}',
            ),
            35 => 
            array (
                'id' => 37,
                'menu_id' => 1,
                'title' => 'Terminées non ouvertes à la comm',
                'url' => '',
                'target' => '_self',
                'icon_class' => NULL,
                'color' => '#000000',
                'parent_id' => 19,
                'order' => 5,
                'created_at' => '2018-11-02 06:45:12',
                'updated_at' => '2018-11-02 14:28:26',
                'route' => 'voyager.sncs.index',
                'parameters' => '{"s":"MARKETING_OFF","key":"status","filter":"equals"}',
            ),
            36 => 
            array (
                'id' => 19,
                'menu_id' => 1,
                'title' => 'Structure de portage',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-wallet',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 4,
                'created_at' => '2018-09-10 15:59:48',
                'updated_at' => '2018-11-02 18:32:44',
                'route' => NULL,
                'parameters' => '',
            ),
        ));
        
        
    }
}