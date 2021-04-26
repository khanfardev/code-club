<?php


namespace App\Repo;


use App\Inter\TopicInterface;
use App\Models\Level;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TopicRepo implements TopicInterface
{

    public function showLevel(string $level_id){
        return Level::findOrFail($level_id);
    }
    public function getLevel(){
        return Level::all();
    }
    public function all()
    {
       return Topic::paginate(10);
    }

    public function show($id)
    {
        return Topic::find($id);
    }

    public function create(array $data)
    {
        $this->showLevel($data['level_id']);
            $image = $data['image'];
            $new_image = time() . $image->getClientOriginalName();
            $image->move('public/uploads/topic/', $new_image);
            return Topic::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'image' => 'public/uploads/topic/' . $new_image,
                'level_id' => $data['level_id'],
                'user_id' => Auth::id(),
                'slug' => Str::slug($data['name'])
            ]);

    }

    public function update(array $data, string $id)
    {
        $this->showLevel($data['level_id']);
        if(!empty($data['image'])){
        $image = $data['image'];
        $new_image = time().$image->getClientOriginalName();
        $image->move('public/uploads/topic/', $new_image);
        $topics = [
            'name'=>$data['name'],
            'description'=>$data['description'],
            'image'=>'public/uploads/topic/'.$new_image,
            'level_id'=>$data['level_id'],
            'user_id'=>Auth::id(),
            'slug'=>Str::slug($data['name'])
        ];
        }else{
            $topics = [
                'name'=>$data['name'],
                'description'=>$data['description'],
                'level_id'=>$data['level_id'],
                'user_id'=>Auth::id(),
                'slug'=>Str::slug($data['name'])];
        }
        return $this->show($id)->update($topics);
    }

    public function delete($id)
    {
        return $this->show($id)->delete();
    }
}
