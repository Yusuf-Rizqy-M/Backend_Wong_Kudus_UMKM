<?php

use App\Models\Activity;

if (!function_exists('logActivity')) {
    function logActivity($actor, $activity, $type, $relatedId = null, $relatedTable = null)
    {
        Activity::create([
            'actor' => $actor,
            'activity' => $activity,
            'type' => $type,
            'related_id' => $relatedId,
            'related_table' => $relatedTable,
        ]);
    }
}
