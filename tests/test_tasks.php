<?php
require __DIR__ . '/../api/tasks.php';
function assertTrue($cond, $message)
{
    echo ($cond ? 'PASS: ' : 'FAIL: ') . $message . PHP_EOL;
}
$tasks = [];
$task = addTask($tasks, 'Write report');
assertTrue($task['id'] === 1, 'First task gets id 1');
addTask($tasks, 'Review PR');
assertTrue(count($tasks) === 2, 'Two tasks added');
$tasks[0]['status'] = 'done';
assertTrue($tasks[0]['status'] === 'done', 'Task marked done');
