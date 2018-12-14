<?php

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('suppliers')->delete();
        
        \DB::table('suppliers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'CFAO MOTORS REUNION',
                'address_1' => '2 CHEMIN COUR DE LUSINE',
                'address_2' => 'RAVINE CREUSE',
                'postal_code' => 97440,
                'city' => 'SAINT ANDRE',
                'created_at' => '2018-09-26 09:44:55',
                'updated_at' => '2018-09-26 09:44:55',
                'capital' => '1222',
                'siren' => '00034',
                'purpose_creation' => NULL,
                'dom_agency' => NULL,
                'juridical_registration' => NULL,
                'end_exercise' => NULL,
                'activity' => NULL,
                'rib' => NULL,
                'kbis' => NULL,
                'bilan' => NULL,
                'divers_documents' => NULL,
                'preloan_convention' => NULL,
                'tresorery_convention_file' => NULL,
                'free_scale_convention_file' => NULL,
                'bank_name' => NULL,
                'bank_agency' => NULL,
                'iban' => NULL,
                'bic' => NULL,
                'bank_account_number' => NULL,
                'pre_loan' => NULL,
                'tresorery_convention' => NULL,
                'free_scale_convention' => NULL,
                'programme_adherent' => NULL,
                'type_registration' => NULL,
                'date_registration' => NULL,
                'contact_id' => NULL,
                'lieu_immat' => NULL,
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_cle' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'SCIME',
                'address_1' => '12 RUE LAMBERT',
                'address_2' => 'ZONE INDUSTRIELLE DE BEL AIR',
                'postal_code' => 97450,
                'city' => 'SAINT LOUIS',
                'created_at' => '2018-10-05 08:08:09',
                'updated_at' => '2018-10-05 08:08:09',
                'capital' => '10000',
                'siren' => 'RCS',
                'purpose_creation' => 'Financement',
                'dom_agency' => 'Reunion',
                'juridical_registration' => 'SA',
                'end_exercise' => '2018-12-31',
                'activity' => 'TP',
                'rib' => NULL,
                'kbis' => NULL,
                'bilan' => NULL,
                'divers_documents' => NULL,
                'preloan_convention' => NULL,
                'tresorery_convention_file' => NULL,
                'free_scale_convention_file' => NULL,
                'bank_name' => 'BFC',
                'bank_agency' => 'LE PORT',
                'iban' => NULL,
                'bic' => NULL,
                'bank_account_number' => NULL,
                'pre_loan' => 0,
                'tresorery_convention' => 0,
                'free_scale_convention' => 0,
                'programme_adherent' => 0,
                'type_registration' => NULL,
                'date_registration' => NULL,
                'contact_id' => NULL,
                'lieu_immat' => NULL,
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_cle' => NULL,
            ),
            2 => 
            array (
                'id' => 8,
                'name' => 'DMP',
                'address_1' => '3 RUE CHARLES DARWIN',
                'address_2' => NULL,
                'postal_code' => NULL,
                'city' => NULL,
                'created_at' => '2018-10-09 08:20:42',
                'updated_at' => '2018-10-09 08:20:42',
                'capital' => '1000000',
                'siren' => '123456789',
                'purpose_creation' => 'Financement',
                'dom_agency' => 'Reunion',
                'juridical_registration' => 'SA',
                'end_exercise' => '2018-12-31',
                'activity' => 'TP',
                'rib' => NULL,
                'kbis' => NULL,
                'bilan' => NULL,
                'divers_documents' => NULL,
                'preloan_convention' => NULL,
                'tresorery_convention_file' => NULL,
                'free_scale_convention_file' => NULL,
                'bank_name' => 'BFC OI',
                'bank_agency' => 'LE PORT',
                'iban' => 'FR76655535723883892339283',
                'bic' => 'BFCORERXXX',
                'bank_account_number' => '54567661477783783',
                'pre_loan' => 0,
                'tresorery_convention' => 0,
                'free_scale_convention' => 0,
                'programme_adherent' => 0,
                'type_registration' => 'RCS',
                'date_registration' => '2002-09-09',
                'contact_id' => NULL,
                'lieu_immat' => NULL,
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_cle' => NULL,
            ),
            3 => 
            array (
                'id' => 10,
                'name' => 'COTRANS',
                'address_1' => '62 BVD DU CHAUDRON',
                'address_2' => 'Centre d\'affaires CADJEE',
                'postal_code' => 97490,
                'city' => 'SAINTE CLOTILDE',
                'created_at' => '2018-10-11 07:27:11',
                'updated_at' => '2018-10-11 07:27:11',
                'capital' => '3000000',
                'siren' => '1234654532',
                'purpose_creation' => 'Financement',
                'dom_agency' => 'Reunion',
                'juridical_registration' => 'SA',
                'end_exercise' => '2018-12-31',
                'activity' => 'Automobile',
                'rib' => NULL,
                'kbis' => NULL,
                'bilan' => NULL,
                'divers_documents' => NULL,
                'preloan_convention' => NULL,
                'tresorery_convention_file' => NULL,
                'free_scale_convention_file' => NULL,
                'bank_name' => 'BFC OI',
                'bank_agency' => 'LE PORT',
                'iban' => 'FR761553637448950',
                'bic' => 'BFCORREX',
                'bank_account_number' => '5546634748438959',
                'pre_loan' => 1,
                'tresorery_convention' => 1,
                'free_scale_convention' => 1,
                'programme_adherent' => 1,
                'type_registration' => 'CMA',
                'date_registration' => '2000-08-08',
                'contact_id' => NULL,
                'lieu_immat' => NULL,
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_cle' => NULL,
            ),
            4 => 
            array (
                'id' => 11,
                'name' => 'JULES CAILLE AUTOMOBILES',
                'address_1' => '62 BVD DU CHAUDRON',
                'address_2' => 'Centre d\'affaires CADJEE',
                'postal_code' => 97490,
                'city' => 'SAINTE CLOTILDE',
                'created_at' => '2018-10-16 15:18:52',
                'updated_at' => '2018-10-16 15:18:52',
                'capital' => '1333',
                'siren' => '123123123',
                'purpose_creation' => 'Financement',
                'dom_agency' => 'Reunion',
                'juridical_registration' => 'SA',
                'end_exercise' => '2018-12-31',
                'activity' => 'Autre',
                'rib' => NULL,
                'kbis' => NULL,
                'bilan' => NULL,
                'divers_documents' => NULL,
                'preloan_convention' => NULL,
                'tresorery_convention_file' => NULL,
                'free_scale_convention_file' => NULL,
                'bank_name' => NULL,
                'bank_agency' => NULL,
                'iban' => NULL,
                'bic' => NULL,
                'bank_account_number' => NULL,
                'pre_loan' => 0,
                'tresorery_convention' => 0,
                'free_scale_convention' => 0,
                'programme_adherent' => 0,
                'type_registration' => 'RCS',
                'date_registration' => '2018-10-16',
                'contact_id' => 1,
                'lieu_immat' => 'SAINT DENIS',
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_cle' => NULL,
            ),
        ));
        
        
    }
}