<?php


namespace App\Repo;


use App\Inter\UserInterface;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserRepo implements UserInterface
{

    public function all()
    {
        return User::paginate(10);
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function update(array $data, string $id)
    {
        // TODO: Implement update() method.
    }
    public function updateHandel(array $data){
        return $this->show(Auth()->id())->update($data);
    }
    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
