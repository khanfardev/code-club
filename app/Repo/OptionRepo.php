<?php


namespace App\Repo;


use App\Inter\OptionInterface;
use App\Models\Option;
use App\Models\Question;

class OptionRepo implements OptionInterface
{

    public function all()
    {
        return Option::paginate(10);

    }

    public function show($id)
    {
        return Option::findOrFail($id);
    }

    public function create(array $data)
    {
        return Option::create($data);
    }

    public function update(array $data, string $id)
    {
        return $this->show($id)->update($data);
    }

    public function delete($id)
    {
        return $this->show($id)->delete();
    }

    public function massDestroy($id)
    {
        // TODO: Implement massDestroy() method.
    }

    public function allQuestion()
    {
        return Question::all();
    }
}
