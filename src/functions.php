<?php
declare (strict_types = 1);

namespace Bileslav\Amp;

use Amp\CancelledException;
use Throwable;

function is_cancellation(Throwable $e): bool
{
	return match (true) {
		$e instanceof CancelledException => true,
		!is_null($e = $e->getPrevious()) => is_cancellation($e),
		default => false,
	};
}
