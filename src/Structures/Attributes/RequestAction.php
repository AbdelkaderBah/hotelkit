<?php
/**
 * Created by AbdelkaderBah.
 * Date: 9/10/19
 * Time: 05:37
 */

namespace Hotelkit\Structures\Attributes;


class RequestAction
{
    protected $type;
    protected $label;
    protected $labelDone;
    protected $labelType;
    protected $isDone;
    protected $information;
    protected $required;


    public function create(array $action = [])
    {
        $this->type = $action['type'] ?? null;
        $this->label = $action['label'] ?? null;
        $this->labelDone = $action['labelDone'] ?? null;
        $this->labelType = $action['labelType'] ?? null;
        $this->isDone = $action['isDone'] ?? null;
        $this->information = $action['information'] ?? null;
        $this->required = $action['required'] ?? null;
    }


    public function toArray()
    {
        return [
            'type' => $this->type,
            'label' => $this->label,
            'labelDone' => $this->labelDone,
            'labelType' => $this->labelType,
            'isDone' => $this->isDone,
            'information' => $this->information,
            'required' => $this->required,
        ];
    }
}
