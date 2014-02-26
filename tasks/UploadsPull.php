<?php
class UploadsPull extends Rocketeer\Traits\Task
{
    protected $description = 'Pull uploads from remote server';

    public function execute()
    {
        $stage = $this->rocketeer->getStage();

        $root_directory = $this->rocketeer->getHomeFolder().'/'.$this->rocketeer->getStage();
        $content_dir = $this->rocketeer->getOption('remote.wp_content_director');

        $remote_login_user =    $this->rocketeer->getOption('config.connections.'.$stage.'.username');
        $remote_login_host =    $this->rocketeer->getOption('config.connections.'.$stage.'.host');

        // Run locally
        // might still need to do some checking here to see if directoris exist before running
        $this->command->info('Pulling uploads');
        exec('rsync -avzhk '.$remote_login_user.'@'.$remote_login_host.':'.$root_directory.'/current/'.$content_dir.'/uploads '.$content_dir.'/');
    }
}
?>