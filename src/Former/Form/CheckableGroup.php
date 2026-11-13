<?php
namespace Former\Form;

/**
 * Manages groups of checkable items
 */
class CheckableGroup extends Group
{
    public function wrap($contents, $label = null)
    {
        $this->attributes['role'] = 'radiogroup';

        // do we have a label element
        if ($this->label) {
            $this->label->element = 'div';
            $this->label->attributes['id'] = $this->label->attributes['for'] . '_label';

            if (!isset($this->attributes['aria-label'])) {
                $this->attributes['aria-labelledby'] = $this->label->attributes['for'] . '_label';
            }
        }

        return parent::wrap($contents, $label);
    }

    public function groupLabel($label)
    {
        unset($this->attributes['aria-labelledby']);

        $this->attributes['aria-label'] = $label;
    }
}
