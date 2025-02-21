<?php

declare(strict_types=1);

namespace Sunaoka\DpiConverter\Units;

abstract class UnitConverter implements UnitConverterInterface
{
    protected float $dpi;

    protected float $value;

    public function __construct(float $dpi)
    {
        $this->dpi = $dpi;
    }

    #[\Override]
    public function setValue(float $value): static
    {
        $this->value = $value;

        return $this;
    }

    abstract public function toPixel(): float;

    abstract public function toMillimeter(): float;

    abstract public function toPoint(): float;
}
