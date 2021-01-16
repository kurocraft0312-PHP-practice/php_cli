<?php
    class Human extends Lives
    {
        const MAX_HITPOINT = 100;
        // private $name;
        // private $hitPoint = 100; //現在のHP
        // private $attackPoint = 20; // 攻撃力

        public function __construct($name,$hitPoint = 100, $attackPoint = 20, $intelligence = 0)
        {
            // $this->name = $name;
            // $this->hitPoint = $hitPoint;
            // $this->attackPoint = $attackPoint;
            parent::__construct($name, $hitPoint, $attackPoint, $intelligence);
        }
    }
?>