<?php
declare(strict_types=1);

namespace App\Filey\Users\Repository;
use App\Filey\Users\User;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
class UserRepository implements UserRepositoryInterface
{
    /**
     * @param int $user_id
     * @return User|null
     */
    public function find(int $user_id): ?User
    {
        return User::find($user_id);
    }

    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }


    /**
     * @param User $user
     * @param array $data
     * @return bool
     */
    public function update(User $user, array $data): bool
    {
        return $user->update($data);
    }

    // /**
    //  * @return LengthAwarePaginator
    //  */
    // public function all(array $filters = []): LengthAwarePaginator
    // {
    //     $model = $this->applyFilters(new User(), $filters);
    //     return $model->orderBy('id', 'DESC')->where('super_admin', 0)->jsonPaginate(env('PAGE_LIMIT', 8));
    // }

    /**
     * @param $id
     * @return User|null
     */
    public function findOrFail($id): ?User
    {
        return User::findOrFail($id);
    }

    public function create($data)
    {
        return User::create($data);
    }


    /**
     * @param User $user
     * @return bool
     * @throws Exception
     */
    public function delete(User $user): bool
    {
        return $user->delete();
    }

    public function findUserByConfirmToken(string $token): ?User
    {
        return User::where('confirm_token', $token)->first();
    }

    /**
     * @param int $token
     * @return bool
     */
    public function checkConfirmToken(int $token): bool
    {
        return User::where('confirm_token', $token)->exists();
    }
}
