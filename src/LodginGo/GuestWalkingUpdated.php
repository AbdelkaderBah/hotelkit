<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 9/10/19
 * Time: 05:50
 */

namespace Hotelkit\LodginGo;


use App\Services\Hotelkit\MessageImport;
use Hotelkit\LodginGo\Actions\Accept;
use Hotelkit\LodginGo\Actions\CounterOffer;
use Hotelkit\LodginGo\Actions\Refuse;
use Hotelkit\LodginGo\Actions\ViewClients;
use Hotelkit\LodginGo\Actions\ViewInvoice;
use Hotelkit\Structures\Attributes\RequestAttachment;
use Hotelkit\Structures\Collections\UserCollection;
use Hotelkit\Structures\RequestStructure;

class GuestWalkingUpdated
{
    public function create()
    {
        /**
         * Actions
         */
        $actions = [
            new ViewClients,
            new ViewInvoice
        ];


        $importer = new MessageImport;

        /**
         * Notification
         */

        $notification = new RequestStructure([
            'referenceID' => 'guest_walking_id',
            'createrID' => 'creater_id',
            'recipientList' => new UserCollection([]),
            'title' => 'title',
            'content' => true,
            'Actions' => $actions,
            'link' => 'uri',
            'attachements' => [
                new RequestAttachment
            ]
        ]);


        $importer->create('guest_walk_updated_notification', $notification);
    }
}
