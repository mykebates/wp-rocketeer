<?php
class Permissions extends Rocketeer\Traits\Task
{
  protected $description = 'Setup permissions';

  public function execute()
  {
  	$remote_login_user = $this->rocketeer->getOption('config.connections.'.$stage.'.username');
  	$root_directory = $this->rocketeer->getHomeFolder().'/'.$this->rocketeer->getStage().'/current';
    $content_dir = $this->rocketeer->getOption('remote.wp_content_director');

    $this->command->info('Setting Permissions');
    // Setting up this space for potentially greater permissions handling
    //$this->runForCurrentRelease('chown -R www-data:www-data ../../shared/content/uploads');

  }
}
?>