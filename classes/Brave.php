<?php
    class Brave extends Human
    {
        const MAX_HITPOINT = 120;
        private $hitPoint = self::MAX_HITPOINT;
        private $attackPoint = 30;

        public function __construct($name)
        {
            parent::__construct($name, $this->hitPoint,$this->attackPoint);
        }

        public function doAttack($enemies)
        {
            // 自分のHPが0以上か、敵のHPが0以上かなどをチェックするメソッドを用意
            if (!$this->isEnableAttack($enemies)) {
                return false;
            }
            // ターゲットの決定
            $enemy = $this->selectTarget($enemies);

            // 自身のHPが0かどうかを判定
            // if ($this->hitPoint <= 0) {
            //     return false;
            // }

            // $enemyIndex = rand(0,count($enemies) - 1);
            // $enemy = $enemies[$enemyIndex];            

            // 乱数の発生
            if(rand(1,3) === 1) {
                echo "『" . $this->getName() . "』のスキルが発動した！\n";
                echo "『ぜんりょくぎり』！！\n";
                echo $enemy->getName() . "に" . $this->attackPoint * 1.5 . "のダメージ！\n";
                $enemy->tookDamage($this->attackPoint * 1.5);
            } else {
                parent::doAttack($enemies);
            }
            return true;
        }
        public function tookDamage($damage)
        {
            $this->hitPoint -= $damage;
            if ($this->hitPoint < 0) { // HPの下限を0に設定
                $this->hitPoint = 0;
            }
        }
    }
?>