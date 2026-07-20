<?php
function parseDate($dateStr)
{
    return DateTime::createFromFormat('Y-m-d', $dateStr);
}
function isPastDue($dateStr)
{
    $date = parseDate($dateStr);
    return $date && $date < new DateTime();
}
function formatRelativeDate($dateStr)
{
    $date = parseDate($dateStr);
    if (!$date) return '';
    $diff = (new DateTime())->diff($date);
    $days = (int)$diff->format('%r%a');
    if ($days < 0) return abs($days) . ' day(s) overdue';
    if ($days === 0) return 'due today';
    return "due in {$days} day(s)";
}
