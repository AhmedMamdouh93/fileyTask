<?php
declare(strict_types=1);

namespace App\Filey\Users\Repository;
use App\Filey\Users\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    /**
     * @return LengthAwarePaginator
     */
    // public function all(): LengthAwarePaginator;
    /**
     * @param  int  $user_id
     * @return User|null
     */
    public function find(int $user_id): ?User;


    /**
     * @param  string  $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User;


    /**
     * @param  User  $user
     * @param  array  $data
     * @return bool
     */
    public function update(User $user, array $data): bool;

    /**
     * @param $id
     * @return User|null
     */
    public function findOrFail($id): ?User;

    public function create($data);


    /**
     * @param  User  $user
     * @return bool
     */
    public function delete(User $user): bool;


    /**
     * @param  string  $token
     * @return int
     */
    public function findUserByConfirmToken(string $token): ?User;

    /**
     * @param int $token
     * @return bool
     */
    public function checkConfirmToken(int $token): bool;
}
