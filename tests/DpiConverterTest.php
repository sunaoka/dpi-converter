<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use Sunaoka\DpiConverter\DpiConverter;
use Sunaoka\DpiConverter\Enums\Unit;
use Sunaoka\DpiConverter\Units\MillimeterConverter;
use Sunaoka\DpiConverter\Units\PixelConverter;
use Sunaoka\DpiConverter\Units\PointConverter;

class DpiConverterTest extends TestCase
{
    #[Test]
    public function instanceOf(): void
    {
        $converter = new DpiConverter(300.0);

        $actual = $converter->of(1, Unit::mm);
        self::assertInstanceOf(MillimeterConverter::class, $actual);

        $actual = $converter->of(1, 'mm');
        self::assertInstanceOf(MillimeterConverter::class, $actual);

        $actual = $converter->of(1, Unit::pt);
        self::assertInstanceOf(PointConverter::class, $actual);

        $actual = $converter->of(1, 'pt');
        self::assertInstanceOf(PointConverter::class, $actual);

        $actual = $converter->of(1, Unit::px);
        self::assertInstanceOf(PixelConverter::class, $actual);

        $actual = $converter->of(1, 'px');
        self::assertInstanceOf(PixelConverter::class, $actual);

        $this->expectException(\ValueError::class);
        $converter->of(1, 'xx');
    }

    #[Test]
    public function construct(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new DpiConverter(-1.0);
    }

    #[Test]
    public function toPixel(): void
    {
        $converter = new DpiConverter(300.0);

        $actual = $converter->of(25.4, Unit::mm)->toPixel();
        self::assertSame(300.0, $actual);

        $actual = $converter->of(72.0, Unit::pt)->toPixel();
        self::assertSame(300.0, $actual);

        $actual = $converter->of(72.0, Unit::px)->toPixel();
        self::assertSame(72.0, $actual);
    }

    #[Test]
    public function toMillimeter(): void
    {
        $converter = new DpiConverter(300.0);

        $actual = $converter->of(25.4, Unit::mm)->toMillimeter();
        self::assertSame(25.4, $actual);

        $actual = $converter->of(72.0, Unit::pt)->toMillimeter();
        self::assertSame(25.4, $actual);

        $actual = $converter->of(300.0, Unit::px)->toMillimeter();
        self::assertSame(25.4, $actual);
    }

    #[Test]
    public function toPoint(): void
    {
        $converter = new DpiConverter(300.0);

        $actual = $converter->of(25.4, Unit::mm)->toPoint();
        self::assertSame(72.0, $actual);

        $actual = $converter->of(72.0, Unit::pt)->toPoint();
        self::assertSame(72.0, $actual);

        $actual = $converter->of(300.0, Unit::px)->toPoint();
        self::assertSame(72.0, $actual);
    }
}
