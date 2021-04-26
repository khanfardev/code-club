<?php


namespace App\Repo;


use App\Inter\LadderInterface;
use App\Models\Ladder;
use App\Models\Level;
use App\Models\Problem;
use Illuminate\Support\Str;

class LadderRepo implements LadderInterface
{

    public function allLevel()
    {
        return Level::all();
    }

    public function all()
    {
        return Ladder::paginate(10);
    }

    public function show($id)
    {
        return Ladder::findOrFail($id);
    }

    public function create(array $data)
    {
        $this->showLevel($data['level_id']);
        return Ladder::create(
          [
              'name'=>$data['name'],
              'description'=>$data['description'],
              'level_id'=>$data['level_id'],
              'user_id'=>Auth()->id(),
              'slug'=>Str::slug($data['name'])

              ]
        );
    }

    public function update(array $data, string $id)
    {
        $this->showLevel($data['level_id']);

        return $this->show($id)->update(
            [
                'name'=>$data['name'],
                'description'=>$data['description'],
                'level_id'=>$data['level_id'],
                'slug'=>Str::slug($data['name'])

            ]
        );

    }

    public function delete($id)
    {
        Problem::where(['ladder_id'=>$id])->delete();
        $this->show($id)->delete();
    }

    public function showLevel(string $level_id)
    {
        return Level::findOrFail($level_id);
    }
}
