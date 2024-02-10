<?php

declare(strict_types=1);

namespace Remorhaz\JSON\Data\Event;

use Remorhaz\JSON\Data\Path\PathInterface;

final class BeforeElementEvent implements BeforeElementEventInterface
{
    public function __construct(
        private readonly int $index,
        private readonly PathInterface $path,
    ) {
    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function getPath(): PathInterface
    {
        return $this->path;
    }
}
