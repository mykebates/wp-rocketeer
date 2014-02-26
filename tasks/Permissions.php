<?php
class Permissions extends Rocketeer\Traits\Task
{
  protected $description = 'Setup permissions';

  public function execute()
  {
  	$remote_login_user = $this->rocketeer->getOption('config.connections.'.$stage.'.username');

    $this->command->info('Setting Permissions');
    $this->runForCurrentRelease('chown -R '.$remote_login_user.':www-data ./');
    $this->runForCurrentRelease('chmod g+w ./ -R');
    $this->runForCurrentRelease('chown -R '.$remote_login_user.':www-data ../../shared');
  }
}
?>