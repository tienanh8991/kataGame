<?php
/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 10/27/2018
 * Time: 6:29 PM
 */

include('TennisGame.php');

$tennisGame = new TennisGame('player1', 'player2');

$tennisGame->getScoreSheet( 3, 2);

echo $tennisGame;