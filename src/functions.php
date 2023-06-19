<?php
declare (strict_types = 1);

namespace Bileslav\Amp;

use Amp\CancelledException;
use Throwable;

function is_cancellation(Throwable $e): bool
{
	$previous = $e->getPrevious();

	return is_null($previous) ?
		$e instanceof CancelledException :
		is_cancellation($previous);
}
