<?php

namespace Sunaoka\DpiConverter\Units;

interface UnitConverterInterface
{
    public function toPixel(float $value): float;

    public function toMillimeter(float $value): float;

    public function toPoint(float $value): float;
}
