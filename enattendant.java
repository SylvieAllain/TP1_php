	public boolean isFileNameEmpty = false;
	public boolean isFileContentIsAMaze = false;
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
    final String[] ARRAY_ROWS = {FIRST_ROW,
								SECOND_ROW,
								THIRD_ROW,
								FOURTH_ROW,
								FIFTH_ROW,
								SIXTH_ROW,
								SEVENTH_ROW,
								EIGHT_ROW,
								NINETH_ROW,
								TENTH_ROW,
								ELEVENTH_ROW,
								TWELVETH_ROW,
								THIRDTEENTH_ROW,
								FOURTEENTH_ROW,
								FIFTHEENTH_ROW,
								SIXTEENTH_ROW,
								SEVENTEENTH_ROW,
								EIGHTEENTH_ROW,
								NINETEENTH_ROW,
								TWENTYTH_ROW};

	private final static int MAZE_LENGTH = MazeCreator.NUMBER_OF_COLUMNS * MazeCreator.NUMBER_OF_ROWS;
	
	
	private String createMaze() {
		
		String fileContentFake = "";
		
		for(String row : ARRAY_ROWS) {
			fileContentFake += row;
		}
		
		return fileContentFake;
	}
