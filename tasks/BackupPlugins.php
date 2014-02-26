<?php
class BackupPlugins extends Rocketeer\Traits\Task
{
  protected $description = 'Back WP Plugins';

  public function execute()
  {
    $root_directory = $this->rocketeer->getHomeFolder().'/'.$this->rocketeer->getStage().'/current';
    $content_dir = $this->rocketeer->getOption('remote.wp_content_director');
    $backup_directory = $this->rocketeer->getHomeFolder().'/'.$this->rocketeer->getStage().'/backup/plugins';
    
    

    $this->command->info('Copying existing plugins to a safe location');
    
    if(!$this->fileExists($backup_directory))
    {
    	$this->command->info('Initializing backup folder');
    	$this->remote->run('mkdir -p '.$backup_directory);
    }

    //$this->command->info($root_directory);

    $this->remote->run(array(
        'cd '.$root_directory,
        'cp -rf '.$content_dir.'/plugins/* '.$backup_directory
    ));
    
  }
}
?>