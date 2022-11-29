<?php

namespace App\Services;
// A php interface allows us to define
// a contract that any implementers
// of this interface must confirm to
interface Newsletter
{
	public function subscribe(string $email, string $list = null);
}