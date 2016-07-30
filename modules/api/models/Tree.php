<?php

namespace app\modules\api\models;

class Tree
{
    private $tree;
    
    private $stack;

    private $visited;

    public function __construct($tree)
    {
        $this->tree  = $tree;
        $this->stack = new \SplStack();
        $this->visited = [];
    }
    
    public function findChilds($start)
    {
        $tree = $this->tree;
        $stack = $this->stack;
        $visited = &$this->visited;
        
        if (in_array($start, $visited)==false) {
            $visited[] = $start;
            $stack->push($start);
        }
        while (isset($tree[$start]) && !$stack->isEmpty()) {
            $child = $tree[$start];

            foreach ($child as $v){
                $this->findChilds($v);
            }
            if (!$stack->isEmpty()){
                $stack->pop();
            }
        }
    }
    
    public function getVisited()
    {
        return $this->visited;
    }
}
/*
$tree = [
    1 => [3,8,2],
    2 => [4,5],
    3 => [10,11],
    8 => [7,6],
    10 => [20],
    4 => [15,16],
];
$treeClass = new Tree($tree);
$res = $treeClass->findChilds2(15);
var_dump($treeClass->getVisited());*/