<?php

declare(strict_types=1);

namespace Sunaoka\DpiConverter\Units;

class MillimeterConverter extends UnitConverter
{
    public function toPixel(float $value): float
    {
        return ($value * $this->dpi) / 25.4;
    }

    public function toPoint(float $value): float
    {
        return ($value * 72.0) / 25.4;
    }

    public function toMillimeter(float $value): float
    {
        return $value;
    }
}
