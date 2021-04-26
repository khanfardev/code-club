<?php


namespace App\Repo;


use App\Inter\MeetingInterface;
use App\Models\Meeting;

class MeetingRepo implements MeetingInterface
{

    public function all()
    {
        return Meeting::paginate(10);
    }

    public function show($id)
    {
        return Meeting::findOrFail($id);
    }

    public function create(array $data)
    {
        return Meeting::create($data);
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
}
