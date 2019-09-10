<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 9/10/19
 * Time: 06:59
 */

namespace Hotelkit\LodginGo\Actions;


use Hotelkit\Structures\Attributes\RequestAction;

class ViewClients extends RequestAction
{
    public function construct(array $action = [])
    {
        $this->type = 'guest_walking_view_clients_btn';
    }
}
