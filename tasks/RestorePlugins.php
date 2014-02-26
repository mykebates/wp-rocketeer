<?php
class RestorePlugins extends Rocketeer\Traits\Task
{
    

    protected $description = 'Restore WP Plugins';

    public function execute()
    {
        $root_directory = $this->rocketeer->getHomeFolder().'/'.$this->rocketeer->getStage().'/current';
        $content_dir = $this->rocketeer->getOption('remote.wp_content_director');
        $backup_directory = $this->rocketeer->getHomeFolder().'/'.$this->rocketeer->getStage().'/backup/plugins';



        $this->command->info('Restoring plugins to current release');

        if($this->fileExists($backup_directory))
        {   
            $this->remote->run(array(
                'cd '.$root_directory,
                'cp -rf '.$backup_directory.'/* '.$content_dir.'/plugins'
            ));
        }
        
        else
        {
            $this->command->info('Nothing to restore');
        }
    
    }
}
?>