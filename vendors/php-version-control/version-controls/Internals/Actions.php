<?php
/**
* Actions interact with subversion.
*/
interface Actions
{
    /**
    * Create repository
    */
    public function create($repo);

    /**
    * Rename repository
    */
    public function rename($oldName, $newName);

    /**
    * Delete repository
    */
    public function delete($repo);

    /**
    * Add user
    */
    public function addUser($user, $pass);

    /**
    * Delete user
    */
    public function deleteUser($user);

    /**
    * Delete user
    */
    public function changePassWd($user, $pass);
}