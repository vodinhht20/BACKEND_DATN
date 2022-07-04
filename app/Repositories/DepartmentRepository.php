<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

class DepartmentRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\Department::class;
    }

    public function formatVueSelect()
    {
        $datas =  $this->model->with(['positions' => function ($q) {
            $q->selectRaw('id, name as `label`, department_id');
        }])->selectRaw('id, name as `label`, parent_id')->get()->toArray();
        return $this->buildTree($datas);
    }

    function buildTree(array $elements, $parentId = null) {
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


    // public function buildTree(array $elements) {
        // dd($elements);
        // $dataNN = [];
        // $childrenNN = [];
        // foreach ($elements as $element) {
        //     if ($element['parent_id']) {
        //         $children = $this->buildTree($elements, $element['id']);
        //         if ($children) {
        //             $childrenNN = $children;
        //         }
        //         $dataNN[] = [
        //             "id" => $element['id'],
        //             "label" => $element['name'],
        //             "children" => $childrenNN
        //         ];
        //     } else {
        //         $dataNN[] = [
        //             "id" => $element['id'],
        //             "label" => $element['name'],
        //             "children" => $childrenNN
        //         ];
        //     }
        // }

        // return $dataNN;
    // }

    // public function test($datas, &$dataNN)
    // {
    //     foreach ($datas as $data) {
    //         if (!$data['    ']) {
    //             $dataNN[$data['id']] = [
    //                 'id' => $data['id'],
    //                 'label' => $data['name'],
    //                 'children'=> []
    //             ];
    //         } else {
    //             if (isset($dataNN[$data['parent_id']])) {
    //                 $dataNN[$data['parent_id']][$data['id']] = [
    //                     'id' => $data['id'],
    //                     'label' => $data['name']
    //                 ];
    //             }
    //         }
    //     }
    // }
}
