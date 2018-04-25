<?php
declare(strict_types=1);

namespace Domain;

use Domain\Exception\InvalidDimensionArgumentException;

final class Dimensions
{
	/** @var int */
	private $columns  = 0;

	/** @var int */
	private $rows = 0;

    /**
     * @throws InvalidDimensionArgumentException
     */
	public function __construct(int $columns, int $rows)
	{
		if ($columns <= 0 || $rows <= 0) {
			throw new InvalidDimensionArgumentException();
		}

		$this->columns  = $columns;
		$this->rows = $rows;
	}

	/**
	 * @return int
	 */
	public function getColumns(): int
	{
		return $this->columns;
	}

	/**
	 * @return int
	 */
	public function getRows(): int
	{
		return $this->rows;
	}
}
