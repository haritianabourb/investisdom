<?php
return [
    "file" => [
        "name"
    ],
    "fileObjects" => [
      "author" => [
          "approval" => "lu et approuvé",
          "aggrement" => "bon pour accord",
          "signature" => "signé par",
          "mandate_signature" => "bon pour acceptation de mandat"
      ]
    ],
    "email" => [
        "member" => [
            "started" => [
                "subject" => "Vous êtes invités à signer votre contrat sur Yousign!",
                "message" => "Bonjour <tag data-tag-type='string' data-tag-name='recipient.firstname'></tag> <tag data-tag-type='string' data-tag-name='recipient.lastname'></tag>, <br><br> Votre Contrat de Reservation est prêt, Veuillez cliquer ici pour être redirigé: <tag data-tag-type='button' data-tag-name='url' data-tag-title='Access to documents'>Accés à la Réservation</tag>"
            ],
            "finnished" => [
                "subject" => "Votre contrat sur Yousign a été signé!",
                "message" => "Bonjour <tag data-tag-type='string' data-tag-name='recipient.firstname'></tag> <tag data-tag-type='string' data-tag-name='recipient.lastname'></tag>, <br><br> Votre Contrat de Reservation a été, Veuillez cliquer ici pour être redirigé: <tag data-tag-type='button' data-tag-name='url' data-tag-title='Access to documents'>Accés aux documents</tag>"
            ],
        ],
        "procedure" => [
            "started" => [
                "subject" => "Vous êtes invités à signer votre contrat sur Yousign!",
                "message" => "Bonjour <tag data-tag-type='string' data-tag-name='recipient.firstname'></tag> <tag data-tag-type='string' data-tag-name='recipient.lastname'></tag>, <br><br> Votre Contrat de Reservation est prêt, La procédure a débuté, Veuillez cliquer ici pour être redirigé: <tag data-tag-type='button' data-tag-name='url' data-tag-title='Access to documents'>Accés à la Procédure</tag>"
            ],
            "finnished" => [
                "subject" => "Votre contrat sur Yousign a été signé!",
                "message" => "Bonjour <tag data-tag-type='string' data-tag-name='recipient.firstname'></tag> <tag data-tag-type='string' data-tag-name='recipient.lastname'></tag>, <br><br> Votre Contrat de Reservation est validé, Veuillez cliquer ici pour être redirigé: <tag data-tag-type='button' data-tag-name='url' data-tag-title='Access to documents'>Accés à la Procédure</tag>"
            ],
            "refused" => [
                "subject" => "La procedure de Réservation est refusée",
                "message" => "Bonjour <tag data-tag-type='string' data-tag-name='recipient.firstname'></tag> <tag data-tag-type='string' data-tag-name='recipient.lastname'></tag>, <br><br> Votre Contrat de Reservation est refusé, Veuillez cliquer ici pour être redirigé: <tag data-tag-type='button' data-tag-name='url' data-tag-title='Access to documents'>Accés à la Procédure</tag>"
            ]
        ]
    ]
];