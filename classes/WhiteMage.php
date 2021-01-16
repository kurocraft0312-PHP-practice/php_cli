<?php

    class WhiteMage extends Human
    {
        const MAX_HITPOINT = 80;
        private $hitPoint = 80;
        private $attackPoint = 10;
        private $intelligence = 30;

        public function __construct($name)
        {
            parent::__construct($name,$this->hitPoint,$this->attackPoint,$this->intelligence);
        }
        
        public function doAttackWhiteMage($enemies,$members)
        {
            // 自分のHPが0以上か、敵のHPが0以上かなどをチェックするメソッドを用意
            if (!$this->isEnableAttack($enemies)) {
                return false;
            }

            // if ($this->hitPoint <= 0) {
            //     return false;
            // }

            // $humanIndex = rand(0, count($humans) -1);
            // $human = $humans[$humanIndex];


            if (rand(1,2) === 1) {
                // ターゲットの決定
                $member = $this->selectTarget($members);

                echo "『" . $this->getName() . "』のスキルが発動した！\n";
                echo "『ケアル』！！\n";
                // echo $human->getName() . "のHPを" . $this->intelligence * 1.5 . "回復！\n";
                echo $member->getName() . "のHPを" . $this->intelligence * 1.5 . "回復！\n";
                // $human->recoveryDamage($this->intelligence * 1.5, $human);
                $member->recoveryDamage($this->intelligence * 1.5, $member);
            } else {
                // ターゲットの決定
                $enemy = $this->selectTarget($enemies);
                parent::doAttack($enemies);
            }
            return true;
        }
    }

?>