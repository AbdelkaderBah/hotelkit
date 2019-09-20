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
    public function __construct()
    {
        $this->create([
            "type" => 'do',
            "label" => "Accepter",
            "labelDone" => "Acceptee",
            "labelType" => "success",
            "isDone" => true,
        ]);
    }

}
