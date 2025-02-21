<?php

declare(strict_types=1);

namespace Sunaoka\DpiConverter\Units;

class MillimeterConverter extends UnitConverter
{
    public function toPixel(): float
    {
        return ($this->value * $this->dpi) / 25.4;
    }

    public function toPoint(): float
    {
        return ($this->value * 72.0) / 25.4;
    }

    public function toMillimeter(): float
    {
        return $this->value;
    }
}
