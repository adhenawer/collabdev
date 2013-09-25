<?php
class Git implements Actions
{
    /**
    * Repository path.
    */
    public $path = null;

    public function create($repo)
    {
        return $this->runCmd('cd '. $this->path . ' ; mkdir ' . $repo . '.git ; cd ' . $repo . '.git ; git init --bare');
    }

    public function rename($oldName, $newName)
    {
        return $this->runCmd('cd ' . $this->path .' ; mv ' . $oldName . '.git ' . $newName . '.git');
    }

    public function delete($repo)
    {
        return $this->runCmd('cd ' . $this->path .' ; rm -Rf ' . $repo . '.git');
    }

    public function addUser($user, $pass)
    {
    }

    public function deleteUser($user)
    {
    }

    public function changePassWd($user, $pass)
    {
    }

    private function runCmd($command){
        if ($this->path == NULL) {
            throw new NotFoundException('Path is not defined!');
        }
        return shell_exec($command);
    }
}