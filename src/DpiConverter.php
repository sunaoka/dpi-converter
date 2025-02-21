<?php

declare(strict_types=1);

namespace Sunaoka\DpiConverter;

use Sunaoka\DpiConverter\Enums\Unit;
use Sunaoka\DpiConverter\Units\MillimeterConverter;
use Sunaoka\DpiConverter\Units\PixelConverter;
use Sunaoka\DpiConverter\Units\PointConverter;
use Sunaoka\DpiConverter\Units\UnitConverterInterface;

class DpiConverter
{
    private float $dpi;

    /**
     * @var array<class-string<UnitConverterInterface>, UnitConverterInterface>
     */
    private array $converters = [];

    public function __construct(float $dpi)
    {
        if ($dpi <= 0.0) {
            throw new \InvalidArgumentException('DPI must be greater than 0.');
        }

        $this->dpi = $dpi;
    }

    /**
     * @param 'mm'|'pt'|'px'|Unit $unit
     */
    public function of(float $value, string|Unit $unit): UnitConverterInterface
    {
        if (is_string($unit)) {
            $unit = Unit::tryFrom($unit);
        }

        return match ($unit) {
            Unit::mm => $this->getConverter(MillimeterConverter::class)->setValue($value),
            Unit::pt => $this->getConverter(PointConverter::class)->setValue($value),
            Unit::px => $this->getConverter(PixelConverter::class)->setValue($value),
            default => throw new \InvalidArgumentException("Invalid unit: {$unit}"),
        };
    }

    /**
     * @param class-string<UnitConverterInterface> $className
     */
    private function getConverter(string $className): UnitConverterInterface
    {
        if (!isset($this->converters[$className])) {
            $this->converters[$className] = new $className($this->dpi);
        }

        return $this->converters[$className];
    }
}
