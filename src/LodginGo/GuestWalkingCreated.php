<?php
/**
 * Created by AbdelkaderBah.
 * Date: 9/10/19
 * Time: 05:50
 */

namespace Hotelkit\LodginGo;


use Hotelkit\LodginGo\Actions\AcceptButton;
use Hotelkit\LodginGo\Actions\CounterOfferButton;
use Hotelkit\LodginGo\Actions\IgnoreButton;
use Hotelkit\MessageImport;
use Hotelkit\Structures\RequestStructure;

class GuestWalkingCreated
{
    public function create()
    {
        /**
         * Actions
         */
        $actions = [
            (new AcceptButton)->toArray(),
            (new CounterOfferButton)->toArray(),
            (new IgnoreButton)->toArray()
        ];

        $importer = new MessageImport;

        /**
         * Notification
         */
        $notification = new RequestStructure([
            'title' => '#D-420',
            'content' => [
                "Emetteur" => [
                    "Nom" => "Hotel Alpha",
                    "Adresse" => "01, Paris, France"
                ],
                "Guest" => [
                    "Chambre" => "1"
                ],
                "Prix proposee" => "100$"
            ],
            'referenceID' => '#D-420',
            'actions' => $actions,
            'link' => 'uri',
        ]);


        return $importer->create('newOffer', $notification);
    }
}
