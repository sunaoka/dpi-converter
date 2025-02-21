<?php

declare(strict_types=1);

namespace Sunaoka\DpiConverter\Units;

class PointConverter extends UnitConverter
{
    public function toPixel(): float
    {
        return ($this->value * $this->dpi) / 72.0;
    }

    public function toMillimeter(): float
    {
        return ($this->value * 25.4) / 72.0;
    }

    public function toPoint(): float
    {
        return $this->value;
    }
}
