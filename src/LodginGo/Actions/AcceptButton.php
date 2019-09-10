<?php
/**
 * Created by AbdelkaderBah.
 * Date: 9/10/19
 * Time: 05:51
 */

namespace Hotelkit\LodginGo\Actions;


use Hotelkit\Structures\Attributes\RequestAction;

class AcceptButton extends RequestAction
{
    public function construct(array $action = [])
    {
        $this->type = 'guest_walking_accept_btn';
    }
}
