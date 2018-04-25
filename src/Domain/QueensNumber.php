<?php
declare(strict_types=1);

namespace Domain;

use Domain\Exception\InvalidQueenNumberException;

final class QueensNumber
{
    /** @var int */
	private $value;

    /**
     * @throws InvalidQueenNumberException
     */
	public function __construct(int $value)
	{
		if ($value <= 0) {
			throw new InvalidQueenNumberException();
		}

		$this->value = $value;
	}

	public function value(): int
    {
        return $this->value;
    }
}
