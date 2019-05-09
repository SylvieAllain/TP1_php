@Test
	public void GIVEN_Software_WHEN_mazeWithoutEnding_THEN_properErrorMessagesAreDisplayed()
	{ 
		//Arrange

		FileReaderFake fileReaderFake = new FileReaderFake();
		ConsoleFake consoleFake = new ConsoleFake();
		KeyboardFake keyboardFake = new KeyboardFake(); 
		
		ISoftware software = new Software(keyboardFake, consoleFake, fileReaderFake);
		
		keyboardFake.add("mauvaisFichier.txt");
		keyboardFake.add(Software.SENTINEL_VALUE);
		fileReaderFake.isMazeUnsolvable = true;
		
		//Act
		
		software.start(ANY_PATH_FINDER_CLOCKWISE,ANY_PATH_FINDER_COUNTER_CLOCKWISE);
		
		//Assert
		String firstExpectedMessage = Software.PATHFINDER_NO_SOLUTION_MESSAGE.replace("$pathfinderName", ANY_PATH_FINDER_CLOCKWISE.getClass().getSimpleName());
		String secondExpectedMessage = Software.PATHFINDER_NO_SOLUTION_MESSAGE.replace("$pathfinderName", ANY_PATH_FINDER_COUNTER_CLOCKWISE.getClass().getSimpleName());
		final String[] EXPECTED_VALUE = {firstExpectedMessage, secondExpectedMessage};
		int[] indexesToGet = {consoleFake.linesDisplayed.size() - 2, consoleFake.linesDisplayed.size() - 3};;// -1 car, size débute à 1, tandis que les index commencent à 0, -1 car le message Welcome_message est toujours affiché à la fin. Donc -2. 
		
		String firstMessage = consoleFake.linesDisplayed.get(indexesToGet[0]);
		String secondMessage = consoleFake.linesDisplayed.get(indexesToGet[1]);
		final String[] ACTUAL_VALUE = {firstMessage, secondMessage};
		
		assertArrayEquals(EXPECTED_VALUE, ACTUAL_VALUE);
	}
	
	
	
	
	
	
	
	
	package TP2;
import TP2_READ_WRITES_SERVICES.IFileInput;

import java.io.IOException;

public class FileReaderFake implements IFileInput  {
	
	public boolean isFileNameEmpty = false;
	public boolean isFileContentIsAMaze = false;
	public boolean isMazeUnsolvable = false;	
	
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
	 	
	public String read(String fileName) throws IOException {
		
		if (isFileNameEmpty) throw new FileNameEmpty();
		
		String fileContentFake = "";
		
		if (isFileContentIsAMaze) {
			fileContentFake = createMaze();
		}
		
		if(isMazeUnsolvable) throw new UnsolvableMaze();
		
		return fileContentFake;
	}	
	
	private String createMaze() {
		
		String fileContentFake = "";
		
		for(String row : ARRAY_ROWS) {
			fileContentFake += row;
		}
		
		return fileContentFake;
	}


	
}
@SuppressWarnings("serial")
class FileNameEmpty extends IOException{};

