<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 9/10/19
 * Time: 04:51
 */

namespace App\Services\Hotelkit\Structures;


use App\Services\Hotelkit\Structures\Attributes\RequestAction;
use App\Services\Hotelkit\Structures\Attributes\RequestAttachment;
use App\Services\Hotelkit\Structures\Collections\UserCollection;

class RequestStructure
{
    private $referenceID;
    private $createrID;

    /** @var UserCollection */
    private $recipientList;

    private $title;
    private $content;

    /** @var RequestAction[] */
    private $actions;

    private $link;

    /** @var RequestAttachment[] */
    private $attachements;


    public function __construct(array $request)
    {
        $this->referenceID = $request['referenceID'] ?? null;
        $this->createrID = $request['createrID'] ?? null;
        $this->recipientList = $request['recipientList'] ?? null;
        $this->title = $request['title'] ?? null;
        $this->content = $request['content'] ?? null;
        $this->actions = $request['actions'] ?? [];
        $this->link = $request['link'] ?? null;
        $this->attachements = $request['attachements'] ?? [];
    }

}
