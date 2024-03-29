<?php

declare(strict_types=1);

namespace Remorhaz\JSON\Data\Test\Value\DecodedJson\Exception;

use Exception;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Remorhaz\JSON\Data\Value\DecodedJson\Exception\InvalidNodeDataException;
use Remorhaz\JSON\Data\Path\Path;

#[CoversClass(InvalidNodeDataException::class)]
class InvalidNodeDataExceptionTest extends TestCase
{
    /**
     * @param list<int|string> $elements
     * @param string $expectedValue
     */
    #[DataProvider('providerGetMessage')]
    public function testGetMessage_Constructed_ReturnsMatchingValue(array $elements, string $expectedValue): void
    {
        $exception = new InvalidNodeDataException(null, new Path(...$elements));
        self::assertSame($expectedValue, $exception->getMessage());
    }

    /**
     * @return iterable<string, array{list<int|string>, string}>
     */
    public static function providerGetMessage(): iterable
    {
        return [
            'Empty path' => [[], 'Invalid data in decoded JSON at /'],
            'Non-empty path' => [['a', 1], 'Invalid data in decoded JSON at /a/1'],
        ];
    }

    public function testGetData_ConstructedWithGivenData_ReturnsSameInstance(): void
    {
        $data = (object) [];
        $exception = new InvalidNodeDataException($data, new Path());
        self::assertSame($data, $exception->getData());
    }

    public function testGetPath_ConstructedWithGivenPath_ReturnsSameInstance(): void
    {
        $path = new Path();
        $exception = new InvalidNodeDataException(0, $path);
        self::assertSame($path, $exception->getPath());
    }

    public function testGetPrevious_ConstructedWithoutPrevious_ReturnsNull(): void
    {
        $exception = new InvalidNodeDataException(0, new Path());
        self::assertNull($exception->getPrevious());
    }

    public function testGetPrevious_ConstructedWithGivenPrevious_ReturnsSameInstance(): void
    {
        $previous = new Exception();
        $exception = new InvalidNodeDataException(0, new Path(), $previous);
        self::assertSame($previous, $exception->getPrevious());
    }
}
