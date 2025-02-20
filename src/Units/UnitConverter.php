<?php

namespace Sunaoka\DpiConverter\Units;

abstract class UnitConverter implements UnitConverterInterface
{
    protected float $dpi;

    public function __construct(float $dpi)
    {
        $this->dpi = $dpi;
    }

    abstract public function toPixel(float $value): float;

    abstract public function toMillimeter(float $value): float;

    abstract public function toPoint(float $value): float;
}
