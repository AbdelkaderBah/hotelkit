<?php
/**
 * Created by AbdelkaderBah.
 * Date: 9/10/19
 * Time: 05:50
 */

namespace Hotelkit\LodginGo;


use HotelKit\MessageImport;
use Hotelkit\LodginGo\Actions\AcceptButton;
use Hotelkit\LodginGo\Actions\CounterOffer;
use Hotelkit\LodginGo\Actions\IgnoreButton;
use Hotelkit\Structures\Attributes\RequestAttachment;
use Hotelkit\Structures\Collections\UserCollection;
use Hotelkit\Structures\RequestStructure;

class GuestWalkingCreated
{
    public function create()
    {
        /**
         * Actions
         */
        $actions = [
            new AcceptButton,
            new CounterOffer,
            new IgnoreButton
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


        $importer->create('guest_walk_created_notification', $notification);
    }
}
