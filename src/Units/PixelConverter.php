<?php

declare(strict_types=1);

namespace Sunaoka\DpiConverter\Units;

class PixelConverter extends UnitConverter
{
    public function toMillimeter(): float
    {
        return ($this->value * 25.4) / $this->dpi;
    }

    public function toPoint(): float
    {
        return ($this->value * 72.0) / $this->dpi;
    }

    public function toPixel(): float
    {
        return $this->value;
    }
}
