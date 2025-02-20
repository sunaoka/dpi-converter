<?php

namespace Sunaoka\DpiConverter\Units;

class PixelConverter extends UnitConverter
{
    public function toMillimeter(float $value): float
    {
        return ($value * 25.4) / $this->dpi;
    }

    public function toPoint(float $value): float
    {
        return ($value * 72.0) / $this->dpi;
    }

    public function toPixel(float $value): float
    {
        return $value;
    }
}
