<?php
/**
 * Created by AbdelkaderBah.
 * Date: 9/10/19
 * Time: 05:37
 */

namespace Hotelkit\Structures\Attributes;


class RequestAttachment
{
    protected $fileName;
    protected $mimeType;
    protected $base64;


    /**
     * RequestAttachment constructor.
     * @param array $attachment
     */
    public function __construct(array $attachment = [])
    {
        $this->fileName = $attachment['fileName'] ?? null;
        $this->mimeType = $attachment['mimeType'] ?? null;
        $this->base64 = $attachment['base64'] ?? null;
    }
}
