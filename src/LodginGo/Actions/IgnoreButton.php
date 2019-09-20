<?php
/**
 * Created by AbdelkaderBah.
 * Date: 9/10/19
 * Time: 05:54
 */

namespace Hotelkit\LodginGo\Actions;


use Hotelkit\Structures\Attributes\RequestAction;

class IgnoreButton extends RequestAction
{
    public function __construct()
    {
        $this->create([
            "type" => "decline",
            "label" => "Refuse",
            "labelDone" => "Refused",
            "labelType" => "error",
            "isDone" => true
        ]);
    }
}
