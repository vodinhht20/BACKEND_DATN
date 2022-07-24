<?php
namespace App\Repositories;

use App\Models\Position;
use App\Repositories\BaseRepository;
use Illuminate\Support\Collection;

class DepartmentRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\Department::class;
    }

    public function formatVueSelect($nameCustom = 'label')
    {
        $datas =  $this->model->with(['positions' => function ($q) use($nameCustom) {
            $q->selectRaw('id, name as `' . $nameCustom . '`, department_id, is_leader');
        }])->selectRaw('id, name as `' . $nameCustom . '`, parent_id')->get()->toArray();
        return $this->buildTree($datas);
    }

    private function buildTree(array $elements, $parentId = null) {
        $departments = array();
        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = $this->buildTree($elements, $element['id']);
                $departments[$element['id']] = $element;
                $indexLeader = config('position.is_leader.no');
                if ($children) {
                    $departments[$element['id']]['children'] = $children;
                }

                if ($element['positions']) {
                    foreach ($element['positions'] as $index => $position) {
                        $departments[$element['id']]['children'][] = [...$position, 'id' => 'position_' . $position['id']];
                        if ($position['is_leader'] == config('position.is_leader.yes')) {
                            $indexLeader = $index;
                        }
                    }
                }

                $departments[$element['id']]['position_leader'] = $indexLeader;
            }
        }

        return array_values($departments);
    }

    /**
     *
     * @param string|int $id
     * @return boolean
     */
    public function removeDepartmentAndPosition($id): bool
    {
        $department = $this->find($id);
        if ($department) {
            if ($department->delete()) {
                $result = Position::where('department_id', $id)->delete();
                return $result;
            }
        }
        return false;
    }


    /**
     * Hàm lấy ra danh sách các leader của các phòng ban
     *
     * @param array $departmentIds
     * @return Collection
     */
    public function getDepartmentWithLeader(array $departmentIds): Collection
    {
        $departments = $this->model->query()->whereIn('id', $departmentIds)
            ->with(['positions' => function($query) {
                    $query->where('is_leader', config('position.is_leader.yes'));
                },
                'positions.employee' => function($query) {
                    $query->where('status', config('employee.status.active'));
                    $query->select('id', 'position_id', 'fullname', 'avatar');
                }
            ])->get();

        $departments = $departments->map(function ($record) {
            $employee = $record?->positions[0]?->employee[0];
            $record->setRelation('positions' , null);
            return collect([
                'department' => $record,
                'employee' => $employee
            ]);
        });
        return $departments->keyBy('department.id');
    }
}
