<?php
namespace Yatzy;

class YatzyGame {
    public $rolls;
    public $dice;
    public $keeps;

    public function __construct() {
        $this->rolls = 0;
        $this->dice = array_fill(0, 5, 0);
        $this->keeps = array_fill(0, 5, false);
    }

    public function roll() {
        if ($this->rolls >= 3) {
            return;
        }
        for ($i = 0; $i < 5; $i++) {
            if (!$this->keeps[$i]) {
                $this->dice[$i] = rand(1, 6);
            }
        }
        $this->rolls++;
    }

    public function keep($index) {
        if ($index >= 0 && $index < 5) {
            $this->keeps[$index] = true;
        }
    }

    public function unkeep($index) {
        if ($index >= 0 && $index < 5) {
            $this->keeps[$index] = false;
        }
    }
}

