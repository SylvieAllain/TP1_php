
	@Test
	public void GIVEN_pathFinderCounterClockwise_WHEN_IsAskedToResolveAMastermindMaze_THEN_MazeIsResolve(){

		final String FIRST_ROW =             "XXXXXXXXXXXXXXXXXXXX";
        final String SECOND_ROW =            "XS                 X";
        final String THIRD_ROW =             "X XXXXXXXXXXXXXXXXXX";
        final String FOURTH_ROW =            "X         XXXXXXXXXX";
        final String FIFTH_ROW =             "X XXXXXXX XXXX XXXXX";
        final String SIXTH_ROW =             "X XXXXXXX XXXX     X";
        final String SEVENTH_ROW =           "X XX         X XX XX";
        final String EIGHT_ROW =             "X XXXXXXXXXX X  X XX";
        final String NINETH_ROW =            "X       XXXX XX X XX";
        final String TENTH_ROW =             "XXXXX XXXXXX    X XX";
        final String ELEVENTH_ROW =		     "XX    X    X XXXX XX";
        final String TWELVETH_ROW =          "XX XXXX XX XXXXXX XX";
        final String THIRDTEENTH_ROW =       "XX      X          X";
        final String FOURTEENTH_ROW =        "XXXXXXXXXXXXX XXXXXX";
        final String FIFTHEENTH_ROW =        "XXXXXXXXXXXXX     EX";
        final String SIXTEENTH_ROW =         "XXXXXXXXXXXXXXXXXXXX";
        final String SEVENTEENTH_ROW =       "XXXXXXXXXXXXXXXXXX X";
        final String EIGHTEENTH_ROW =        "XXXXXXXXXXXXXXXXXX X";
        final String NINETEENTH_ROW =        "XXXXXXXXXXXXXXXXXX X";
        final String TWENTYTH_ROW =          "XXXXXXXXXXXXXXXXXXXX";


		final String MAZE = FIRST_ROW + SECOND_ROW + THIRD_ROW + FOURTH_ROW + FIFTH_ROW + SIXTH_ROW + SEVENTH_ROW + EIGHT_ROW + NINETH_ROW + TENTH_ROW + ELEVENTH_ROW + TWELVETH_ROW + THIRDTEENTH_ROW + FOURTEENTH_ROW + FIFTHEENTH_ROW + SIXTEENTH_ROW + SEVENTEENTH_ROW + EIGHTEENTH_ROW + NINETEENTH_ROW + TWENTYTH_ROW;

		PathFinderCounterClockwise pathfinder = new PathFinderCounterClockwise();

		//Act
		final String ACTUAL_MAZE = pathfinder.pathToExitClockwise(MAZE);

		//Assert
		final String EXPECTED_FIRST_ROW =             "XXXXXXXXXXXXXXXXXXXX";
        final String EXPECTED_SECOND_ROW =            "XS                 X";
        final String EXPECTED_THIRD_ROW =             "XPXXXXXXXXXXXXXXXXXX";
        final String EXPECTED_FOURTH_ROW =            "XP        XXXXXXXXXX";
        final String EXPECTED_FIFTH_ROW =             "XPXXXXXXX XXXX XXXXX";
        final String EXPECTED_SIXTH_ROW =             "XPXXXXXXX XXXX     X";
        final String EXPECTED_SEVENTH_ROW =           "XPXX         X XX XX";
        final String EXPECTED_EIGHT_ROW =             "XPXXXXXXXXXX X  X XX";
        final String EXPECTED_NINETH_ROW =            "XPPPPP  XXXX XX X XX";
        final String EXPECTED_TENTH_ROW =             "XXXXXPXXXXXX    X XX";
        final String EXPECTED_ELEVENTH_ROW =		  "XXPPPPXPPPPX XXXX XX";
        final String EXPECTED_TWELVETH_ROW =          "XXPXXXXPXXPXXXXXX XX";
        final String EXPECTED_THIRDTEENTH_ROW =       "XXPPPPPPX PPPP     X";
        final String EXPECTED_FOURTEENTH_ROW =        "XXXXXXXXXXXXXPXXXXXX";
        final String EXPECTED_FIFTHEENTH_ROW =        "XXXXXXXXXXXXXPPPPPEX";
        final String EXPECTED_SIXTEENTH_ROW =         "XXXXXXXXXXXXXXXXXXXX";
        final String EXPECTED_SEVENTEENTH_ROW =       "XXXXXXXXXXXXXXXXXX X";
        final String EXPECTED_EIGHTEENTH_ROW =        "XXXXXXXXXXXXXXXXXX X";
        final String EXPECTED_NINETEENTH_ROW =        "XXXXXXXXXXXXXXXXXX X";
        final String EXPECTED_TWENTYTH_ROW =          "XXXXXXXXXXXXXXXXXXXX";

        final String EXPECTED_MAZE = EXPECTED_FIRST_ROW + EXPECTED_SECOND_ROW + EXPECTED_THIRD_ROW + EXPECTED_FOURTH_ROW + EXPECTED_FIFTH_ROW + EXPECTED_SIXTH_ROW + EXPECTED_SEVENTH_ROW + EXPECTED_EIGHT_ROW + EXPECTED_NINETH_ROW + EXPECTED_TENTH_ROW + EXPECTED_ELEVENTH_ROW + EXPECTED_TWELVETH_ROW + EXPECTED_THIRDTEENTH_ROW + EXPECTED_FOURTEENTH_ROW + EXPECTED_FIFTHEENTH_ROW + EXPECTED_SIXTEENTH_ROW + EXPECTED_SEVENTEENTH_ROW + EXPECTED_EIGHTEENTH_ROW + EXPECTED_NINETEENTH_ROW + EXPECTED_TWENTYTH_ROW;

		assertEquals(EXPECTED_MAZE, ACTUAL_MAZE);
	}
