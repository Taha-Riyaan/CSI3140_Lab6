<?php
namespace Yatzy\Test;

use PHPUnit\Framework\TestCase;
use Yatzy\Dice;
use Yatzy\YatzyGame;
use Yatzy\YatzyEngine;

class YatzyGameTest extends TestCase
{
    // Tests for Dice class
    public function testDiceConstructor()
    {
        $d = new Dice();
        $this->assertEquals(1, $d->min);
        $this->assertEquals(6, $d->max);

        $d = new Dice(10, 20);
        $this->assertEquals(10, $d->min);
        $this->assertEquals(20, $d->max);
    }

    public function testDiceRoll()
    {
        $d = new Dice();
        for ($i = 0; $i < 100; $i++) {
            $roll = $d->roll();
            $this->assertGreaterThanOrEqual(1, $roll);
            $this->assertLessThanOrEqual(6, $roll);
        }
    }

    // Tests for YatzyGame class
    public function testYatzyGameConstructor()
    {
        $game = new YatzyGame();
        $this->assertEquals(0, $game->rolls);
        $this->assertCount(5, $game->dice);
        $this->assertCount(5, $game->keeps);
    }

    public function testYatzyGameRoll()
    {
        $game = new YatzyGame();
        $game->roll();
        $this->assertEquals(1, $game->rolls);
        foreach ($game->dice as $die) {
            $this->assertGreaterThanOrEqual(1, $die);
            $this->assertLessThanOrEqual(6, $die);
        }
    }

    public function testYatzyGameKeepAndUnkeep()
    {
        $game = new YatzyGame();
        $game->keep(0);
        $this->assertTrue($game->keeps[0]);
        $game->unkeep(0);
        $this->assertFalse($game->keeps[0]);
    }

    // Tests for YatzyEngine class
    public function testYatzyEngineScoreOnes()
    {
        $dice = [1, 1, 2, 3, 4];
        $score = YatzyEngine::scoreOnes($dice);
        $this->assertEquals(2, $score);
    }

    public function testYatzyEngineUpdateScore()
    {
        $game = new YatzyGame();
        $game->roll();
        YatzyEngine::updateScore($game);
        // Implement specific assertions based on your score and bonus calculation logic
        $this->assertEquals(0, $game->score);
        $this->assertEquals(0, $game->bonus);
    }
}
