<?php

namespace App\Utils;

use Ramsey\Uuid\Uuid;

class RandomUUID
{
  public static function getUUID($prefix)
  {
    $uuid4 = Uuid::uuid4()->toString();
    $uuidString = $prefix . substr($uuid4, 1);
    $uuidString = str_pad($uuidString, 36, '0', STR_PAD_RIGHT);

    return $uuidString;
  }
}
