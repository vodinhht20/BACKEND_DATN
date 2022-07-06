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
}