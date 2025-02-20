<?php

declare(strict_types=1);

namespace Sunaoka\DpiConverter;

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
        if ($dpi <= 0) {
            throw new \InvalidArgumentException('DPI must be greater than 0.');
        }
        $this->dpi = $dpi;
    }

    public function millimeter(): UnitConverterInterface
    {
        return $this->getConverter(MillimeterConverter::class);
    }

    public function point(): UnitConverterInterface
    {
        return $this->getConverter(PointConverter::class);
    }

    public function pixel(): UnitConverterInterface
    {
        return $this->getConverter(PixelConverter::class);
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
