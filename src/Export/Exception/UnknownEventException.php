<?php

declare(strict_types=1);

namespace Remorhaz\JSON\Data\Export\Exception;

use LogicException;
use Remorhaz\JSON\Data\Event\EventInterface;
use Throwable;

final class UnknownEventException extends LogicException implements ExceptionInterface
{
    public function __construct(
        private readonly EventInterface $event,
        ?Throwable $previous = null,
    ) {
        parent::__construct("Unknown event", previous: $previous);
    }

    public function getEvent(): EventInterface
    {
        return $this->event;
    }
}
