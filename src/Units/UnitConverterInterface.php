<?php

declare(strict_types=1);

namespace Sunaoka\DpiConverter\Units;

interface UnitConverterInterface
{
    /**
     * @internal
     */
    public function setValue(float $value): static;

    public function toPixel(): float;

    public function toMillimeter(): float;

    public function toPoint(): float;
}
