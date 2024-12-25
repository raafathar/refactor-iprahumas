<?php

namespace App\Helper;

use Illuminate\Support\Str;

trait StandartData
{
    /**
     * Base Create Data
     * @param array $data
     * @return array
     */
    public function baseCreateData($data, $pivotTable = false)
    {
        if (!isset($data["id"]) && !$pivotTable)
            $data["id"] = Str::uuid()->toString();

        if (!isset($data["created_at"]))
            $data["created_at"] = now();

        return $data;
    }
}
