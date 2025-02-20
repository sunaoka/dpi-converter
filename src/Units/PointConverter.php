<?php

namespace Sunaoka\DpiConverter\Units;

class PointConverter extends UnitConverter
{
    public function toPixel(float $value): float
    {
        return ($value * $this->dpi) / 72.0;
    }

    public function toMillimeter(float $value): float
    {
        return ($value * 25.4) / 72.0;
    }

    public function toPoint(float $value): float
    {
        return $value;
    }
}
