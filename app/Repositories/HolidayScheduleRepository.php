<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

use function PHPUnit\Framework\throwException;

class HolidayScheduleRepository extends BaseRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\HolidaySchedule::class;
    }

    public function query($options = [])
    {
        $query = $this->model->query();

        if (isset($options['with']) && count($options['with']) > 0) {
            $query->with($options['with']);
        }

        if (isset($options['name'])) {
            $query->where('name', 'like', "%" . $options['name'] . "%");
        }

        if (isset($options['date_from'])) {
            $query->where('date_from', '>=', $options['date_from']);
        }

        if (isset($options['date_to'])) {
            $query->where('date_to', '<=', $options['date_to']);
        }

        return $query->orderBy('id', 'desc');
    }

    public function paginate($options = [], $take = 20)
    {
        return $this->query($options)->paginate($take);
    }
}
