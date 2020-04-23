<?php
/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 10/27/2018
 * Time: 6:20 PM
 */

class TennisGame
{
    const ZERO_SCORE = 0;
    const ONE_SCORE = 1;
    const TWO_SCORE = 2;
    const TURN_PLAYER1 = 1;
    const TURN_PLAYER2 = 2;
    protected $scoreSheet = '';
    protected $player1Name;
    protected $player2Name;

    public function __construct($player1Name, $player2Name)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
    }

    public function getScoreSheetWhenSameScore($scorePlayer)
    {
        switch ($scorePlayer) {
            case self::ZERO_SCORE:
                return $this->scoreSheet = "Love-All";
            case self::ONE_SCORE:
                return $this->scoreSheet = "Fifteen-All";
            case self::TWO_SCORE:
                return $this->scoreSheet = "Thirty-All";
            default: //THREE_SCORE, FOUR_SCORE, FIVE_SCORE,...
                return $this->scoreSheet = "Deuce";
        }
    }

    public function getScorePlayerLess4($scorePlayer)
    {
        switch ($scorePlayer) {
            case self::ZERO_SCORE:
                return $this->scoreSheet .= "Love";
            case self::ONE_SCORE:
                return $this->scoreSheet .= "Fifteen";
            case self::TWO_SCORE:
                return $this->scoreSheet .= "Thirty";
            default: //THREE_SCORE
                return $this->scoreSheet .= "Forty";
        }
    }

    public function getScoreSheetWhenScoreDifferentLess4($scorePlayer1, $scorePlayer2)
    {
        $turnGame = [self::TURN_PLAYER1, self::TURN_PLAYER2];
        foreach ($turnGame as $value) {
            if ($value == self::TURN_PLAYER1) {
                $this->getScorePlayerLess4($scorePlayer1);
            } else {
                $this->scoreSheet .= "-";
                $this->getScorePlayerLess4($scorePlayer2);
            }
        }
    }

    public function getScoreSheetWhenScoreDifferentMore3($scorePlayer1, $scorePlayer2)
    {
        $minusResult = $scorePlayer1 - $scorePlayer2;
        if ($minusResult == 1) $this->scoreSheet = "Advantage player1";
        else if ($minusResult == -1) $this->scoreSheet = "Advantage player2";
        else if ($minusResult >= 2) $this->scoreSheet = "Win for player1";
        else $this->scoreSheet = "Win for player2";
    }

    public function getScoreSheet($scorePlayer1, $scorePlayer2)
    {

        if ($scorePlayer1 == $scorePlayer2) {
            $this->getScoreSheetWhenSameScore($scorePlayer1);
        } else if ($scorePlayer1 > 3 || $scorePlayer2 > 3) {
            $this->getScoreSheetWhenScoreDifferentMore3($scorePlayer1, $scorePlayer2);
        } else {
            $this->getScoreSheetWhenScoreDifferentLess4($scorePlayer1, $scorePlayer2);
        }
    }

    public function __toString()
    {
        return $this->player1Name . ' vs ' . $this->player2Name . ': ' . $this->scoreSheet;
    }

}