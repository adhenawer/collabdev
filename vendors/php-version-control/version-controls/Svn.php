<?php
class Svn implements Actions
{
    /**
    * Repository path
    */
    public $path = null;

    public function create($repo)
    {
        return $this->runCmd('cd '. $this->path .' ; svnadmin create '.$repo);
    }

    public function rename($oldName, $newName)
    {
        return $this->runCmd('cd ' . $this->path .' ; mv ' . $oldName . ' ' . $newName);
    }

    public function delete($repo)
    {
        shell_exec('chmod 777 -R ' . $this->path . '/' . $repo);
        return $this->runCmd('cd ' . $this->path .' ; rm -Rf ' . $repo);
    }

    private function runCmd($command){
        if ($this->path == NULL) {
            throw new NotFoundException('Path is not defined!');
        }
        return shell_exec($command);
    }
}