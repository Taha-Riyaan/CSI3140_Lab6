<?php
namespace Yatzy;

class YatzyEngine {

    public static function scoreOnes($dice) {
        return array_reduce($dice, function($carry, $item) {
            return $carry + ($item == 1 ? 1 : 0);
        }, 0);
    }

    // Implement similar methods for other scores (Twos, Threes, etc.)

    public static function updateScore($game) {
        // This is a placeholder, you'll need to implement score and bonus calculation.
        $game->score = self::calculateScore($game);
        $game->bonus = self::calculateBonus($game);
    }

    public static function calculateScore($game) {
        // Implement score calculation
        return 0;
    }

    public static function calculateBonus($game) {
        // Implement bonus calculation
        return 0;
    }
}
