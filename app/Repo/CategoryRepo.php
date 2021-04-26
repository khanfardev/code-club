<?php


namespace App\Repo;


use App\Inter\CategoryInterface;
use App\Models\Category;

class CategoryRepo implements CategoryInterface
{

    public function all()
    {
        return Category::paginate(10);
    }

    public function show($id)
    {
        return Category::findOrFail($id);
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update(array $data, string $id)
    {
        return $this->show($id)->update($data);
    }

    public function delete($id)
    {
      return  $this->show($id)->delete();
    }

    public function massDestroy($id)
    {
        // TODO: Implement massDestroy() method.
    }
}
