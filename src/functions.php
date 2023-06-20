<?php
declare (strict_types = 1);

namespace Bileslav\Amp;

use Amp\CancelledException;
use Throwable;

function is_cancellation(Throwable $e): bool
{
	if ($e instanceof CancelledException) {
		return true;
	}

	$previous = $e->getPrevious();

	if ($previous !== null) {
		return is_cancellation($previous);
	}

	return false;
}
