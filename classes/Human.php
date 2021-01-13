<?php
    // 人間クラス
    class Human
    {
        const MAX_HITPOINT = 100;
        private $name;
        private $hitPoint = 100; //現在のHP
        private $attackPoint = 20; // 攻撃力

        public function __construct($name,$hitPoint = 100, $attackPoint = 20)
        {
            $this->name = $name;
            $this->hitPoint = $hitPoint;
            $this->attackPoint = $attackPoint;
        }
        public function doAttack($enemies)
        {
            if ($this->hitPoint <= 0) {
                return false;
            }

            $enemyIndex = rand(0, count($enemies) -1);
            $enemy = $enemies[$enemyIndex];


            echo "『" . $this->getName() . "』の攻撃！\n";
            echo "【" . $enemy->getName() . "】に" . $this->attackPoint . "のダメージ！\n";
            $enemy->tookDamage($this->attackPoint);
        }
        public function tookDamage($damage)
        {
            $this->hitPoint -= $damage; // HPからダメージを計算して残りのHPを表示する
            if ($this->hitPoint < 0) { // HPがマイナスにならないよう下限を設定する
                $this->hitPoint = 0;
            }
        }
        public function recoveryDamage($heal,$target)
        {
            $this->hitPoint += $heal;
            if ($this->hitPoint > $target::MAX_HITPOINT) {
                $this->hitPoint = $target::MAX_HITPOINT; // 最大HP以上に回復する値が増えないように上限を設定する
            }
        }
        public function getName()
        {
            return $this->name;
        }
        public function getHitPoint()
        {
            return $this->hitPoint;
        }
        public function getAttackPoint()
        {
            return $this->attackPoint;
        }
    }
?>