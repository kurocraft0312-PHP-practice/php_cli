<?php
    // 人間クラス
    class Human
    {
        const MAX_HITPOINT = 100;
        private $name;
        private $hitPoint = 100; //現在のHP
        private $attackPoint = 20; // 攻撃力
        public function doAttack($enemy)
        {
            echo "『" . $this->name . "』の攻撃！\n";
            echo "【" . $enemy->name . "】に" . $this->attackPoint . "のダメージ！\n";
            $enemy->tookDamage($this->attackPoint);
        }
        public function tookDamage($damage)
        {
            $this->hitPoint -= $damage; // HPからダメージを計算して残りのHPを表示する
            if ($this->hitPoint < 0) { // HPがマイナスにならないよう下限を設定する
                $this->hitPoint = 0;
            }
        }
    }
?>