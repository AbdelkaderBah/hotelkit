<?php
/**
 * Created by AbdelkaderBah.
 * Date: 9/10/19
 * Time: 05:54
 */

namespace Hotelkit\LodginGo\Actions;


use Hotelkit\Structures\Attributes\RequestAction;

class IgnoreButton  extends RequestAction
{
    public function construct(array $action = [])
    {
        $this->type = 'guest_walking_ignore_btn';
    }
}
