<?php

declare(strict_types=1);

namespace Remorhaz\JSON\Data\Test\Export\Exception;

use Exception;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Remorhaz\JSON\Data\Export\Exception\EncodingFailedException;

#[CoversClass(EncodingFailedException::class)]
class EncodingFailedExceptionTest extends TestCase
{
    public function testGetMessage_Constructed_ReturnsMatchingValue(): void
    {
        $exception = new EncodingFailedException('a');
        self::assertSame('Failed to encode data to JSON', $exception->getMessage());
    }

    public function testGetData_ConstructedWithData_ReturnsSameValue(): void
    {
        $exception = new EncodingFailedException('a');
        self::assertSame('a', $exception->getData());
    }

    public function testGetPrevious_ConstructedWithoutPrevious_ReturnsNull(): void
    {
        $exception = new EncodingFailedException('a');
        self::assertNull($exception->getPrevious());
    }

    public function testGetPrevious_ConstructedWithPrevious_ReturnsSameInstance(): void
    {
        $previous = new Exception();
        $exception = new EncodingFailedException('a', $previous);
        self::assertSame($previous, $exception->getPrevious());
    }
}
