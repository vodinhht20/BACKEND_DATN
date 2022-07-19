<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Builder;


class PositionRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\Position::class;
    }

    /**
     *
     * @param array $options
     * @return Builder
     */
    public function query(array $options): Builder
    {
        $query = $this->model->query();

        if (isset($options['with']) && count($options['with']) > 0) {
            $query->with($options['with']);
        }

        if (isset($options['department_ids']) && count($options['department_ids']) > 0) {
            $query->whereId("department_id", $options['department_ids']);
        }

        return $query;
    }

    public function createAndUpdateCustom($datas, $indexPositionLeader, $departmentId): void
    {
        foreach ($datas as $key => $data) {
            if (isset($data['id'])) {
                $position = $this->model->find($data['id']);
            } else {
                $position = new $this->model;
                $position->department_id = $departmentId;
            }
            if ($key == $indexPositionLeader) {
                $position->is_leader = config('position.is_leader.yes');
            } else {
                $position->is_leader = config('position.is_leader.no');
            }
            $position->name = $data['name'];
            $position->save();
        }
    }
}
