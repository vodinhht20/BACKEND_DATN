<?php
namespace App\Repositories;

use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function register();
    public function getUserByEmail($email);
    public function getAllUserByPublic($take);
    public function changeRole($roles, $modelId);
    public function checkPassword($email, $password);
}
