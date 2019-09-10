<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 9/10/19
 * Time: 04:51
 */

namespace Hotelkit\Structures;


use Hotelkit\Structures\Attributes\RequestAction;
use Hotelkit\Structures\Attributes\RequestAttachment;
use Hotelkit\Structures\Collections\UserCollection;

class RequestStructure
{
    private $referenceID;
    private $createrID;

    /** @var UserCollection|null */
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
        $this->actions = $request['Actions'] ?? [];
        $this->link = $request['link'] ?? null;
        $this->attachements = $request['attachements'] ?? [];
    }


    /**
     * @return string|null
     */
    public function getReferenceID(): string
    {
        return (string) $this->referenceID;
    }


    /**
     * @return string|null
     */
    public function getCreaterID(): string
    {
        return (string) $this->createrID;
    }


    /**
     * @return string|null
     */
    public function getTitle(): string
    {
        return (string) $this->title;
    }


    /**
     * @return UserCollection|null
     */
    public function getRecipientList(): UserCollection
    {
        return $this->recipientList ?: new UserCollection([]);
    }


    /**
     * @return boolean|null
     */
    public function getContent(): bool
    {
        return (bool)$this->content;
    }


    /**
     * @return RequestAction[]
     */
    public function getActions(): array
    {
        return $this->actions;
    }


    /**
     * @return string|null
     */
    public function getLink(): string
    {
        return (string) $this->link;
    }


    /**
     * @return RequestAttachment[]
     */
    public function getAttachements(): array
    {
        return $this->attachements ?: [];
    }

}
