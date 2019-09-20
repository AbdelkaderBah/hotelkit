<?php
/**
 * Created by AbdelkaderBah.
 * Date: 9/10/19
 * Time: 05:54
 */

namespace Hotelkit\LodginGo\Actions;


use Hotelkit\Structures\Attributes\RequestAction;

class CounterOfferButton extends RequestAction
{
    public function __construct()
    {
        $this->create([
            "type" => "counterOffer",
            "label" => "Counter offer",
            "labelDone" => "Counter offered",
            "labelType" => "primary",
            "isDone" => true,
            "information" => [
                "counterOffer" => [
                    "required" => true,
                    "type" => "string",
                    "label" => "Counteroffer"
                ]
            ]
        ]);
    }
}
