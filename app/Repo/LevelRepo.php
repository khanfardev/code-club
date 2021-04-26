<?php


namespace App\Repo;


use App\Inter\LevelInterface;
use App\Models\Level;

class LevelRepo implements LevelInterface
{

    public function all()
    {
        return Level::paginate(10);

    }

    public function show($id)
    {
        return Level::findOrFail($id);
    }

    public function create(array $data)
    {
        return Level::create($data);
    }

    public function update(array $data, string $id)
    {
        return $this->show($id)->update($data);
    }

    public function delete($id)
    {
        return $this->show($id)->delete();
    }


}
