<?php

use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('reservations')->delete();
        
        \DB::table('reservations')->insert(array (
            0 => 
            array (
                'id' => 37,
                'identifiant' => 'GFI-20190214/37',
                'montant_reduction' => '45000',
                'commission_cgp' => '0.01',
                'mandat_start_at' => '2019-02-14',
                'mandat_finnish_at' => '2019-02-15',
                'type_contrats_id' => 3,
                'cgps_id' => 5,
                'investors_id' => 7,
                'nbr_snc' => 1,
                'assistance_juridique' => 0,
                'secteurs_activite' => 'indifferent',
                'taux_rentabilite' => '0.206',
                'apport' => '37313.432835821',
                'montant_commission_cgp' => '373.13432835821',
                'gain_brut' => '7686.5671641791',
                'taux_reservation' => '0.82918739635158',
                'created_at' => '2019-02-14 10:18:57',
                'updated_at' => '2019-02-14 10:18:57',
                'type_aj' => NULL,
                'taux_ponctuel' => NULL,
                'paiement' => 'echelonne',
                'user_id' => 1,
                'user_created_id' => 1,
                'user_updated_id' => 1,
                'mode_paiement' => 'cheque',
                'yousign_procedure_id' => 'null',
            ),
            1 => 
            array (
                'id' => 33,
                'identifiant' => 'GFI-20190201/33',
                'montant_reduction' => '120000',
                'commission_cgp' => '0.02',
                'mandat_start_at' => '2019-02-14',
                'mandat_finnish_at' => '2019-02-28',
                'type_contrats_id' => 3,
                'cgps_id' => 4,
                'investors_id' => 8,
                'nbr_snc' => 1,
                'assistance_juridique' => 0,
                'secteurs_activite' => 'indifferent',
                'taux_rentabilite' => '0.196',
                'apport' => '100334.44816054',
                'montant_commission_cgp' => '2006.6889632107',
                'gain_brut' => '19665.551839465',
                'taux_reservation' => '0.83612040133779',
                'created_at' => '2019-02-01 07:21:00',
                'updated_at' => '2019-02-14 12:20:46',
                'type_aj' => NULL,
                'taux_ponctuel' => NULL,
                'paiement' => 'echelonne',
                'user_id' => 5,
                'user_created_id' => 1,
                'user_updated_id' => 5,
                'mode_paiement' => 'cheque',
                'yousign_procedure_id' => '{"id":"\\/procedures\\/1026f644-2994-4ce1-8e2d-8e582f6eb4c2","name":"GFI-20190201\\/33 - INVEST Isseur","description":"Reservation d\'un Mandat de Recherche pour INVEST Isseur - Dossier n\\u00b0 GFI-20190201\\/33","createdAt":"2019-02-07T08:22:19+01:00","updatedAt":"2019-02-07T08:22:28+01:00","finishedAt":null,"expiresAt":"2019-02-22T00:00:00+01:00","status":"active","creator":null,"creatorFirstName":null,"creatorLastName":null,"company":"\\/companies\\/4721c514-5197-4a5c-a5fb-68f284851e29","template":false,"ordered":true,"parent":null,"metadata":[],"config":{"email":{"procedure.started":[{"subject":"Une Nouvelle procedure de R\\u00e9servation est en cours","message":"Bonjour <tag data-tag-type=\'string\' data-tag-name=\'recipient.firstname\'><\\/tag> <tag data-tag-type=\'string\' data-tag-name=\'recipient.lastname\'><\\/tag>, <br><br> Votre Contrat de Reservation est pr\\u00eat, Veuillez cliquer ici pour \\u00eatre redirig\\u00e9: <tag data-tag-type=\'button\' data-tag-name=\'url\' data-tag-title=\'Access to documents\'>Acc\\u00e9s \\u00e0 la R\\u00e9servation<\\/tag>","to":["@creator"]}],"member.started":[{"subject":"Vous \\u00eates invit\\u00e9s \\u00e0 signer votre contrat sur Yousign!","message":"Bonjour <tag data-tag-type=\'string\' data-tag-name=\'recipient.firstname\'><\\/tag> <tag data-tag-type=\'string\' data-tag-name=\'recipient.lastname\'><\\/tag>, <br><br> Votre Contrat de Reservation est pr\\u00eat, Veuillez cliquer ici pour \\u00eatre redirig\\u00e9: <tag data-tag-type=\'button\' data-tag-name=\'url\' data-tag-title=\'Access to documents\'>Acc\\u00e9s \\u00e0 la R\\u00e9servation<\\/tag>","to":["@member"]}]}},"members":[{"id":"\\/members\\/d8dc56f5-958f-4727-8f63-f34bf4178734","user":null,"type":"signer","firstname":"INVEST","lastname":"Isseur","email":"monelchristophe@gmail.com","phone":"+262692448152","position":1,"createdAt":"2019-02-07T08:22:24+01:00","updatedAt":"2019-02-07T08:22:28+01:00","finishedAt":null,"status":"pending","fileObjects":[{"id":"\\/file_objects\\/3a6d17d8-c9db-4786-b79e-ae6702c968cc","file":{"id":"\\/files\\/efc02b06-08cd-4302-bf0f-a88b167b9a53","name":"Demande_de_ReservationINVEST_Isseur_02-07-2019.pdf","type":"signable","contentType":"application\\/pdf","description":null,"createdAt":"2019-02-07T08:22:22+01:00","updatedAt":"2019-02-07T08:22:22+01:00","sha256":"a3599919fc72687dbf8954c45ae81ada7d58f10a03e67df711b55407f11343c3","metadata":[],"company":"\\/companies\\/4721c514-5197-4a5c-a5fb-68f284851e29","creator":null,"protected":false,"position":0,"parent":null},"page":6,"position":"117,197,255,252","fieldName":null,"mention":null,"mention2":null,"createdAt":"2019-02-07T08:22:26+01:00","updatedAt":"2019-02-07T08:22:26+01:00","parent":null,"reason":"Signed by Yousign"},{"id":"\\/file_objects\\/9fcf35e6-14ac-47d6-9aa2-3aeed0de6fbb","file":{"id":"\\/files\\/9b09387e-7341-4751-9aa1-6fc2f8b44bf5","name":"Mandat_de_RechercheINVEST_Isseur_02-07-2019.pdf","type":"signable","contentType":"application\\/pdf","description":null,"createdAt":"2019-02-07T08:22:23+01:00","updatedAt":"2019-02-07T08:22:23+01:00","sha256":"145fc0e533631e66537c83e8237c6526dc77293010fc8b13fd866aa3a2a3ccb0","metadata":[],"company":"\\/companies\\/4721c514-5197-4a5c-a5fb-68f284851e29","creator":null,"protected":false,"position":0,"parent":null},"page":1,"position":"116,56,237,110","fieldName":null,"mention":"Lu et approuv\\u00e9, bon pour mandat","mention2":"Sign\\u00e9 par INVEST Isseur.","createdAt":"2019-02-07T08:22:28+01:00","updatedAt":"2019-02-07T08:22:28+01:00","parent":null,"reason":"Signed by Yousign"},{"id":"\\/file_objects\\/a8370ec8-d304-4b37-b5a2-875d91e285ea","file":{"id":"\\/files\\/efc02b06-08cd-4302-bf0f-a88b167b9a53","name":"Demande_de_ReservationINVEST_Isseur_02-07-2019.pdf","type":"signable","contentType":"application\\/pdf","description":null,"createdAt":"2019-02-07T08:22:22+01:00","updatedAt":"2019-02-07T08:22:22+01:00","sha256":"a3599919fc72687dbf8954c45ae81ada7d58f10a03e67df711b55407f11343c3","metadata":[],"company":"\\/companies\\/4721c514-5197-4a5c-a5fb-68f284851e29","creator":null,"protected":false,"position":0,"parent":null},"page":12,"position":"71,72,208,127","fieldName":null,"mention":"Lu et approuv\\u00e9","mention2":"Sign\\u00e9 par INVEST Isseur.","createdAt":"2019-02-07T08:22:27+01:00","updatedAt":"2019-02-07T08:22:27+01:00","parent":null,"reason":"Signed by Yousign"},{"id":"\\/file_objects\\/b03f5b85-9976-429e-b552-dfe40bb84aca","file":{"id":"\\/files\\/efc02b06-08cd-4302-bf0f-a88b167b9a53","name":"Demande_de_ReservationINVEST_Isseur_02-07-2019.pdf","type":"signable","contentType":"application\\/pdf","description":null,"createdAt":"2019-02-07T08:22:22+01:00","updatedAt":"2019-02-07T08:22:22+01:00","sha256":"a3599919fc72687dbf8954c45ae81ada7d58f10a03e67df711b55407f11343c3","metadata":[],"company":"\\/companies\\/4721c514-5197-4a5c-a5fb-68f284851e29","creator":null,"protected":false,"position":0,"parent":null},"page":7,"position":"118,373,256,428","fieldName":null,"mention":null,"mention2":null,"createdAt":"2019-02-07T08:22:27+01:00","updatedAt":"2019-02-07T08:22:27+01:00","parent":null,"reason":"Signed by Yousign"},{"id":"\\/file_objects\\/c616f3fe-645d-47c3-8220-a2e8ebbceda7","file":{"id":"\\/files\\/efc02b06-08cd-4302-bf0f-a88b167b9a53","name":"Demande_de_ReservationINVEST_Isseur_02-07-2019.pdf","type":"signable","contentType":"application\\/pdf","description":null,"createdAt":"2019-02-07T08:22:22+01:00","updatedAt":"2019-02-07T08:22:22+01:00","sha256":"a3599919fc72687dbf8954c45ae81ada7d58f10a03e67df711b55407f11343c3","metadata":[],"company":"\\/companies\\/4721c514-5197-4a5c-a5fb-68f284851e29","creator":null,"protected":false,"position":0,"parent":null},"page":9,"position":"115,96,252,151","fieldName":null,"mention":"Bon pour pouvoir","mention2":"Sign\\u00e9 par INVEST Isseur.","createdAt":"2019-02-07T08:22:27+01:00","updatedAt":"2019-02-07T08:22:27+01:00","parent":null,"reason":"Signed by Yousign"},{"id":"\\/file_objects\\/e037532a-1c8f-4d83-9eab-024c4cc53781","file":{"id":"\\/files\\/efc02b06-08cd-4302-bf0f-a88b167b9a53","name":"Demande_de_ReservationINVEST_Isseur_02-07-2019.pdf","type":"signable","contentType":"application\\/pdf","description":null,"createdAt":"2019-02-07T08:22:22+01:00","updatedAt":"2019-02-07T08:22:22+01:00","sha256":"a3599919fc72687dbf8954c45ae81ada7d58f10a03e67df711b55407f11343c3","metadata":[],"company":"\\/companies\\/4721c514-5197-4a5c-a5fb-68f284851e29","creator":null,"protected":false,"position":0,"parent":null},"page":5,"position":"124,187,222,226","fieldName":null,"mention":"Bon pour r\\u00e9servation","mention2":"Sign\\u00e9 par INVEST Isseur.","createdAt":"2019-02-07T08:22:26+01:00","updatedAt":"2019-02-07T08:22:26+01:00","parent":null,"reason":"Signed by Yousign"}],"comment":null,"notificationsEmail":[],"operationLevel":"custom","operationCustomModes":["sms"],"operationModeSmsConfig":null,"parent":null,"contact":null,"fields":null},{"id":"\\/members\\/7d2efe56-100d-47dc-8da2-aa6cde987e36","user":"\\/users\\/c73c6dd5-06ff-419e-a283-8ab68c719a5d","type":"signer","firstname":"Christophe","lastname":"MONEL","email":"contact@investis-dom.com","phone":"+262692448152","position":2,"createdAt":"2019-02-07T08:22:23+01:00","updatedAt":"2019-02-07T08:22:28+01:00","finishedAt":null,"status":"pending","fileObjects":[{"id":"\\/file_objects\\/6f4cb656-854e-4c3a-ad33-edcab86494f2","file":{"id":"\\/files\\/efc02b06-08cd-4302-bf0f-a88b167b9a53","name":"Demande_de_ReservationINVEST_Isseur_02-07-2019.pdf","type":"signable","contentType":"application\\/pdf","description":null,"createdAt":"2019-02-07T08:22:22+01:00","updatedAt":"2019-02-07T08:22:22+01:00","sha256":"a3599919fc72687dbf8954c45ae81ada7d58f10a03e67df711b55407f11343c3","metadata":[],"company":"\\/companies\\/4721c514-5197-4a5c-a5fb-68f284851e29","creator":null,"protected":false,"position":0,"parent":null},"page":12,"position":"415,72,553,127","fieldName":null,"mention":"Lu et approuv\\u00e9","mention2":"Sign\\u00e9 par INVESTIS DOM.","createdAt":"2019-02-07T08:22:25+01:00","updatedAt":"2019-02-07T08:22:25+01:00","parent":null,"reason":"Signed by Yousign"},{"id":"\\/file_objects\\/ae5a2110-b9cb-45b0-be6b-76e10df3d150","file":{"id":"\\/files\\/efc02b06-08cd-4302-bf0f-a88b167b9a53","name":"Demande_de_ReservationINVEST_Isseur_02-07-2019.pdf","type":"signable","contentType":"application\\/pdf","description":null,"createdAt":"2019-02-07T08:22:22+01:00","updatedAt":"2019-02-07T08:22:22+01:00","sha256":"a3599919fc72687dbf8954c45ae81ada7d58f10a03e67df711b55407f11343c3","metadata":[],"company":"\\/companies\\/4721c514-5197-4a5c-a5fb-68f284851e29","creator":null,"protected":false,"position":0,"parent":null},"page":5,"position":"419,172,557,227","fieldName":null,"mention":"Bon pour accord","mention2":"Sign\\u00e9 par InvestisDOM.","createdAt":"2019-02-07T08:22:25+01:00","updatedAt":"2019-02-07T08:22:25+01:00","parent":null,"reason":"Signed by Yousign"},{"id":"\\/file_objects\\/d63c86b8-9c94-48ee-9d49-9996fe095d0a","file":{"id":"\\/files\\/9b09387e-7341-4751-9aa1-6fc2f8b44bf5","name":"Mandat_de_RechercheINVEST_Isseur_02-07-2019.pdf","type":"signable","contentType":"application\\/pdf","description":null,"createdAt":"2019-02-07T08:22:23+01:00","updatedAt":"2019-02-07T08:22:23+01:00","sha256":"145fc0e533631e66537c83e8237c6526dc77293010fc8b13fd866aa3a2a3ccb0","metadata":[],"company":"\\/companies\\/4721c514-5197-4a5c-a5fb-68f284851e29","creator":null,"protected":false,"position":0,"parent":null},"page":1,"position":"430,56,551,110","fieldName":null,"mention":"Lu et approuv\\u00e9, bon pour acceptation de mandat","mention2":"Sign\\u00e9 par InvestisDOM.","createdAt":"2019-02-07T08:22:26+01:00","updatedAt":"2019-02-07T08:22:26+01:00","parent":null,"reason":"Signed by Yousign"}],"comment":null,"notificationsEmail":[],"operationLevel":"custom","operationCustomModes":["sms"],"operationModeSmsConfig":null,"parent":null,"contact":null,"fields":null}],"subscribers":[],"files":[{"id":"\\/files\\/9b09387e-7341-4751-9aa1-6fc2f8b44bf5","name":"Mandat_de_RechercheINVEST_Isseur_02-07-2019.pdf","type":"signable","contentType":"application\\/pdf","description":null,"createdAt":"2019-02-07T08:22:23+01:00","updatedAt":"2019-02-07T08:22:23+01:00","sha256":"145fc0e533631e66537c83e8237c6526dc77293010fc8b13fd866aa3a2a3ccb0","metadata":[],"company":"\\/companies\\/4721c514-5197-4a5c-a5fb-68f284851e29","creator":null,"protected":false,"position":0,"parent":null},{"id":"\\/files\\/efc02b06-08cd-4302-bf0f-a88b167b9a53","name":"Demande_de_ReservationINVEST_Isseur_02-07-2019.pdf","type":"signable","contentType":"application\\/pdf","description":null,"createdAt":"2019-02-07T08:22:22+01:00","updatedAt":"2019-02-07T08:22:22+01:00","sha256":"a3599919fc72687dbf8954c45ae81ada7d58f10a03e67df711b55407f11343c3","metadata":[],"company":"\\/companies\\/4721c514-5197-4a5c-a5fb-68f284851e29","creator":null,"protected":false,"position":0,"parent":null}],"relatedFilesEnable":false,"archive":false,"archiveMetadata":[],"fields":[],"permissions":[]}',
            ),
            2 => 
            array (
                'id' => 38,
                'identifiant' => 'PatiPA-20190215/38',
                'montant_reduction' => '120000',
                'commission_cgp' => '0.01',
                'mandat_start_at' => '2019-02-15',
                'mandat_finnish_at' => '2020-02-19',
                'type_contrats_id' => 3,
                'cgps_id' => 8,
                'investors_id' => 13,
                'nbr_snc' => 1,
                'assistance_juridique' => 0,
                'secteurs_activite' => 'indifferent',
                'taux_rentabilite' => '0.206',
                'apport' => '99502.487562189',
                'montant_commission_cgp' => '995.02487562189',
                'gain_brut' => '20497.512437811',
                'taux_reservation' => '0.82918739635158',
                'created_at' => '2019-02-15 05:40:43',
                'updated_at' => '2019-02-15 05:40:43',
                'type_aj' => NULL,
                'taux_ponctuel' => NULL,
                'paiement' => 'unique',
                'user_id' => 1,
                'user_created_id' => 1,
                'user_updated_id' => 1,
                'mode_paiement' => 'cheque',
                'yousign_procedure_id' => 'null',
            ),
        ));
        
        
    }
}