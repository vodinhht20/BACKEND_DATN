<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

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
        $branch = array();
        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = $this->buildTree($elements, $element['id']);
                $branch[$element['id']] = $element;

                if ($children) {
                    $branch[$element['id']]['children'] = $children;
                }

                if ($element['positions']) {
                    foreach ($element['positions'] as $position) {
                        $branch[$element['id']]['children'][] = [...$position, 'id' => 'position_' . $position['id']];
                    }
                }
            }
        }

        return array_values($branch);
    }
}
