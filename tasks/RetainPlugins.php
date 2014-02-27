<?php

use Rocketeer\Facades\Rocketeer;

Rocketeer::addTaskListeners('deploy', 'before-symlink', 'RestorePlugins');
Rocketeer::addTaskListeners('deploy', 'before-symlink', 'WPConfig');

?>
