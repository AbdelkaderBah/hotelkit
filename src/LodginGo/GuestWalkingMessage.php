<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 9/10/19
 * Time: 05:50
 */

namespace App\Services\Hotelkit\LodginGo;


use App\Services\Hotelkit\MessageImport;
use App\Services\Hotelkit\Structures\Attributes\RequestAttachment;
use App\Services\Hotelkit\Structures\Collections\UserCollection;
use App\Services\Hotelkit\Structures\RequestStructure;

class GuestWalkingMessage
{
    public function create()
    {
        /**
         * Actions
         */
        $actions = [
            new AcceptAction,
            new CounterOfferAction,
            new RefuseAction
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
            'actions' => $actions,
            'link' => 'uri',
            'attachements' => [
                new RequestAttachment
            ]
        ]);


        $importer->create('guest_walk_notification', $notification);
    }
}
