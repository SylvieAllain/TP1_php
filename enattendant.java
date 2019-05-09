package TP2;

import static org.junit.Assert.assertEquals;
import static org.junit.Assert.assertArrayEquals;

import org.junit.Test;

import TP2_MAZE_SERVICES.MazeCreator;

/**
 * Reprï¿½sente le logiciel ï¿½ implï¿½menter
 *
 * @author 
 * @version 2019
 */
public class SoftwareTest {
	
	private final static IPathFinder ANY_PATH_FINDER_CLOCKWISE = new PathFinderClockwise();
	private final static IPathFinder ANY_PATH_FINDER_COUNTER_CLOCKWISE = new PathFinderCounterClockwise();
	
	@Test
	public void GIVEN_StartedSoftware_WHEN_SENTINEL_VALUE_isEntered_THEN_SoftwareShutsDown()
	{ 
		//Arrange

		FileReaderFake fileReaderFake = new FileReaderFake();
		ConsoleFake consoleFake = new ConsoleFake();
		KeyboardFake keyboardFake = new KeyboardFake();
		
		ISoftware software = new Software(keyboardFake, consoleFake, fileReaderFake);
		keyboardFake.add(Software.SENTINEL_VALUE);

		
		//Act
		
		software.start(ANY_PATH_FINDER_CLOCKWISE,ANY_PATH_FINDER_COUNTER_CLOCKWISE);
		
		//Assert
		keyboardFake.add(Software.SENTINEL_VALUE);
		final String EXPECTED_VALUE = Software.SENTINEL_VALUE;
		final String ACTUAL_VALUE = keyboardFake.read();
		assertEquals(EXPECTED_VALUE, ACTUAL_VALUE);

	}
	
	@Test
	public void GIVEN_NotStartedSoftware_WHEN_SoftwareIsStarted_THEN_properMessageIsDisplayed()
	{ 
		//Arrange
		
		FileReaderFake fileReaderFake = new FileReaderFake();
		ConsoleFake consoleFake = new ConsoleFake();
		KeyboardFake keyboardFake = new KeyboardFake(); 
		
		ISoftware software = new Software(keyboardFake, consoleFake, fileReaderFake);
		keyboardFake.add(Software.SENTINEL_VALUE);
		
		//Act

		software.start(ANY_PATH_FINDER_CLOCKWISE,ANY_PATH_FINDER_COUNTER_CLOCKWISE); 
		
		//Assert
		
		final String EXPECTED_VALUE = Software.WELCOME_MESSAGE_.replace("SENTINEL_VALUE", Software.SENTINEL_VALUE);
		int indexToGet = consoleFake.linesDisplayed.size() - 1; // -1 car, size débute à 1, tandis que les index commencent à 0. 
		
		final String ACTUAL_VALUE = consoleFake.linesDisplayed.get(indexToGet);
		
		assertEquals(EXPECTED_VALUE, ACTUAL_VALUE);
		
	}
	
	@Test
	public void GIVEN_Software_WHEN_userEnteredFileSourceThatDoesntExist_THEN_errorFileMessageIsDisplayed()
	{ 
		//Arrange

		FileReaderFake fileReaderFake = new FileReaderFake();
		ConsoleFake consoleFake = new ConsoleFake();
		KeyboardFake keyboardFake = new KeyboardFake(); 
		
		ISoftware software = new Software(keyboardFake, consoleFake, fileReaderFake);
		
		keyboardFake.add("mauvaisFichier.txt");
		keyboardFake.add(Software.SENTINEL_VALUE);
		fileReaderFake.isFileNameEmpty = true;
		
		//Act
		
		software.start(ANY_PATH_FINDER_CLOCKWISE,ANY_PATH_FINDER_COUNTER_CLOCKWISE);
		
		//Assert
		
		final String EXPECTED_VALUE = Software.ERROR_FILE_MESSAGE.replace("$fileName", "mauvaisFichier.txt");
		int indexToGet = consoleFake.linesDisplayed.size() - 2;// -1 car, size débute à 1, tandis que les index commencent à 0, -1 car le message Welcome_message est toujours affiché à la fin. Donc -2. 
		
		final String ACTUAL_VALUE = consoleFake.linesDisplayed.get(indexToGet);
		
		assertEquals(EXPECTED_VALUE, ACTUAL_VALUE);

	}
	
	@Test
	public void GIVEN_Software_WHEN_userEnteredAFileThatDoesntContains20rowsAnd20Columns_THEN_NotAMazeMessageIsDisplayed()
	{ 
		//Arrange

		FileReaderFake fileReaderFake = new FileReaderFake();
		ConsoleFake consoleFake = new ConsoleFake();
		KeyboardFake keyboardFake = new KeyboardFake(); 
		
		ISoftware software = new Software(keyboardFake, consoleFake, fileReaderFake);
		keyboardFake.add("mauvaisFichier2.txt");
		keyboardFake.add(Software.SENTINEL_VALUE); 
		
		//Act
		
		software.start(ANY_PATH_FINDER_CLOCKWISE,ANY_PATH_FINDER_COUNTER_CLOCKWISE); 
		
		//Assert
		
		final String EXPECTED_VALUE = Software.NOT_A_MAZE_MESSAGE.replace("$fileName", "mauvaisFichier2.txt");
		int indexToGet = consoleFake.linesDisplayed.size() - 2;// -1 car, size débute à 1, tandis que les index commencent à 0, -1 car le message Welcome_message est toujours affiché à la fin. Donc -2.
		
		final String ACTUAL_VALUE = consoleFake.linesDisplayed.get(indexToGet);
		assertEquals(EXPECTED_VALUE, ACTUAL_VALUE);
		
	}
	
	@Test
	public void GIVEN_Software_WHEN_userEnteredAFileThatContains20rowsAnd20Columns_THEN_MazeMessageIsDisplayed()
	{ 
		//Arrange

		FileReaderFake fileReaderFake = new FileReaderFake();
		ConsoleFake consoleFake = new ConsoleFake();
		KeyboardFake keyboardFake = new KeyboardFake();
		
		ISoftware software = new Software(keyboardFake, consoleFake, fileReaderFake);
		keyboardFake.add("maze.txt");
		keyboardFake.add(Software.SENTINEL_VALUE);
		fileReaderFake.isFileContentIsAMaze = true;
		
		//Act
		
		software.start(ANY_PATH_FINDER_CLOCKWISE,ANY_PATH_FINDER_COUNTER_CLOCKWISE); 
		
		//Assert
		
		final String EXPECTED_VALUE = Software.MAZE_MESSAGE.replace("$fileName", "maze.txt");
		int indexToGet = consoleFake.linesDisplayed.size() - (7 + (MazeCreator.NUMBER_OF_ROWS * 3));// -1 car, size débute à 1, tandis que les index commencent à 0, -1 car le message Welcome_message est toujours affiché à la fin. Donc -2.
																							  // - 20 (ou MazeCreator.NUMBER_OF_ROWS) pour faire abstraction du labyrinthe.
		final String ACTUAL_VALUE = consoleFake.linesDisplayed.get(indexToGet);
		assertEquals(EXPECTED_VALUE, ACTUAL_VALUE);
		
	}
	
	@Test
	public void GIVEN_Software_WHEN_userEnteredAFileThatContains20rowsAnd20Columns_THEN_20CharsIsDisplayedPerRow()
	{ 
		//Arrange

		FileReaderFake fileReaderFake = new FileReaderFake();
		ConsoleFake consoleFake = new ConsoleFake();
		KeyboardFake keyboardFake = new KeyboardFake(); 
		
		ISoftware software = new Software(keyboardFake, consoleFake, fileReaderFake);
		keyboardFake.add("maze.txt");
		keyboardFake.add(Software.SENTINEL_VALUE); 
		fileReaderFake.isFileContentIsAMaze = true;
		
		//Act
		
		software.start(ANY_PATH_FINDER_CLOCKWISE,ANY_PATH_FINDER_COUNTER_CLOCKWISE); 
		
		//Assert
		
		final int EXPECTED_VALUE = MazeCreator.NUMBER_OF_COLUMNS;
		int indexToGet = consoleFake.linesDisplayed.size() - 3; // -1 car, size débute à 1, tandis que les index commencent à 0, -1 car le message Welcome_message est toujours affiché à la fin. Donc -2.
		String aMazeLine = consoleFake.linesDisplayed.get(indexToGet);
		
		final int ACTUAL_VALUE = aMazeLine.length();
		
		assertEquals(EXPECTED_VALUE, ACTUAL_VALUE);
		
	}
	
   @Test
   public void GIVEN_Software_WHEN_userEnteredAFileThatContains20rowsAnd20Columns_THEN_ProperMazeIsDisplay()
   {   
       //Arrange
	   
       FileReaderFake fileReaderFake = new FileReaderFake();
       ConsoleFake consoleFake = new ConsoleFake();
       KeyboardFake keyboardFake = new KeyboardFake(); 
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
       final String ELEVENTH_ROW =		    "XX    X    X XXXX XX";
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
   
       ISoftware software = new Software(keyboardFake, consoleFake, fileReaderFake);

       keyboardFake.add("wonderfulMaze.txt");
       keyboardFake.add(Software.SENTINEL_VALUE);
       fileReaderFake.isFileContentIsAMaze = true;
       
       //Act 
       
       software.start(ANY_PATH_FINDER_CLOCKWISE,ANY_PATH_FINDER_COUNTER_CLOCKWISE); 
   
       //Assert
       
       int indexToGet = consoleFake.linesDisplayed.size() - 65; // -1 car, size débute à 1, tandis que les index commencent à 0, -1 car le message Welcome_message est toujours affiché à la fin. Donc -2.
     
       String []expectedMaze = ARRAY_ROWS;
       
       String[] actualMaze = new String[MazeCreator.NUMBER_OF_ROWS];
       for (int i = 0; i < MazeCreator.NUMBER_OF_ROWS ;i++) {
           actualMaze[i] = consoleFake.linesDisplayed.get(indexToGet + i) ;
       }
       
       final String[] EXPECTED_VALUE = expectedMaze;
       final String[] ACTUAL_VALUE =  actualMaze;
   
       assertArrayEquals(EXPECTED_VALUE, ACTUAL_VALUE);
   } 
   
    @Test
	public void GIVEN_Software_WHEN_userEnteredAFileThatContains20rowsAnd20Columns_THEN_PathFinderClockwiseMazeMessageIsDisplayed()
	{ 
		//Arrange

		FileReaderFake fileReaderFake = new FileReaderFake();
		ConsoleFake consoleFake = new ConsoleFake();
		KeyboardFake keyboardFake = new KeyboardFake();
		
		ISoftware software = new Software(keyboardFake, consoleFake, fileReaderFake);
		keyboardFake.add("maze.txt");
		keyboardFake.add(Software.SENTINEL_VALUE);
		fileReaderFake.isFileContentIsAMaze = true;
		
		//Act
		
		software.start(ANY_PATH_FINDER_CLOCKWISE,ANY_PATH_FINDER_COUNTER_CLOCKWISE); 
		
		//Assert
		
		final String EXPECTED_VALUE = Software.PATHFINDER_SOLVED_MESSAGE.replace("$pathfinderName", ANY_PATH_FINDER_CLOCKWISE.getClass().getSimpleName());
		int indexToGet = consoleFake.linesDisplayed.size() - (5 + (MazeCreator.NUMBER_OF_ROWS * 2));// -1 car, size débute à 1, tandis que les index commencent à 0, -1 car le message Welcome_message est toujours affiché à la fin. Donc -2.
																							  // - 20 (ou MazeCreator.NUMBER_OF_ROWS) pour faire abstraction du labyrinthe.
		final String ACTUAL_VALUE = consoleFake.linesDisplayed.get(indexToGet);
		assertEquals(EXPECTED_VALUE, ACTUAL_VALUE);
		
	}
    
    @Test
    public void GIVEN_Software_WHEN_userEnteredAFileThatContains20rowsAnd20Columns_THEN_ClockwiseProperMazeIsDisplay()
    {   
        //Arrange
 	   
        FileReaderFake fileReaderFake = new FileReaderFake();
        ConsoleFake consoleFake = new ConsoleFake();
        KeyboardFake keyboardFake = new KeyboardFake(); 

        final String EXPECTED_FIRST_ROW =             "XXXXXXXXXXXXXXXXXXXX";
        final String EXPECTED_SECOND_ROW =            "XS                 X";
        final String EXPECTED_THIRD_ROW =             "XPXXXXXXXXXXXXXXXXXX";
        final String EXPECTED_FOURTH_ROW =            "XPPPPPPPPPXXXXXXXXXX";
        final String EXPECTED_FIFTH_ROW =             "X XXXXXXXPXXXX XXXXX";
        final String EXPECTED_SIXTH_ROW =             "X XXXXXXXPXXXXPPPP X";
        final String EXPECTED_SEVENTH_ROW =           "X XX     PPPPXPXXPXX";
        final String EXPECTED_EIGHT_ROW =             "X XXXXXXXXXXPXPPXPXX";
        final String EXPECTED_NINETH_ROW =            "X       XXXXPXXPXPXX";
        final String EXPECTED_TENTH_ROW =             "XXXXX XXXXXXPPPPXPXX";
        final String EXPECTED_ELEVENTH_ROW =		  "XX    X    X XXXXPXX";
        final String EXPECTED_TWELVETH_ROW =          "XX XXXX XX XXXXXXPXX";
        final String EXPECTED_THIRDTEENTH_ROW =       "XX      X    PPPPP X";
        final String EXPECTED_FOURTEENTH_ROW =        "XXXXXXXXXXXXXPXXXXXX";
        final String EXPECTED_FIFTHEENTH_ROW =        "XXXXXXXXXXXXXPPPPPEX";
        final String EXPECTED_SIXTEENTH_ROW =         "XXXXXXXXXXXXXXXXXXXX";
        final String EXPECTED_SEVENTEENTH_ROW =       "XXXXXXXXXXXXXXXXXX X";
        final String EXPECTED_EIGHTEENTH_ROW =        "XXXXXXXXXXXXXXXXXX X";
        final String EXPECTED_NINETEENTH_ROW =        "XXXXXXXXXXXXXXXXXX X";
        final String EXPECTED_TWENTYTH_ROW =          "XXXXXXXXXXXXXXXXXXXX";
        final String[] ARRAY_ROWS = {EXPECTED_FIRST_ROW,
        		EXPECTED_SECOND_ROW,
        		EXPECTED_THIRD_ROW,
        		EXPECTED_FOURTH_ROW,
        		EXPECTED_FIFTH_ROW,
        		EXPECTED_SIXTH_ROW,
        		EXPECTED_SEVENTH_ROW,
        		EXPECTED_EIGHT_ROW,
        		EXPECTED_NINETH_ROW,
        		EXPECTED_TENTH_ROW,
        		EXPECTED_ELEVENTH_ROW,
        		EXPECTED_TWELVETH_ROW,
        		EXPECTED_THIRDTEENTH_ROW,
        		EXPECTED_FOURTEENTH_ROW,
        		EXPECTED_FIFTHEENTH_ROW,
        		EXPECTED_SIXTEENTH_ROW,
        		EXPECTED_SEVENTEENTH_ROW,
        		EXPECTED_EIGHTEENTH_ROW,
        		EXPECTED_NINETEENTH_ROW,
        		EXPECTED_TWENTYTH_ROW};
    
        ISoftware software = new Software(keyboardFake, consoleFake, fileReaderFake);

        keyboardFake.add("wonderfulMaze.txt");
        keyboardFake.add(Software.SENTINEL_VALUE);
        fileReaderFake.isFileContentIsAMaze = true;
        
        //Act 
        
        software.start(ANY_PATH_FINDER_CLOCKWISE,ANY_PATH_FINDER_COUNTER_CLOCKWISE); 
    
        //Assert
        
        int indexToGet = consoleFake.linesDisplayed.size() - 44; // -1 car, size débute à 1, tandis que les index commencent à 0, -1 car le message Welcome_message est toujours affiché à la fin. Donc -2.
      
        String []expectedMaze = ARRAY_ROWS;
        
        String[] actualMaze = new String[MazeCreator.NUMBER_OF_ROWS];
        for (int i = 0; i < MazeCreator.NUMBER_OF_ROWS ;i++) {
            actualMaze[i] = consoleFake.linesDisplayed.get(indexToGet + i) ;
        }
        
        final String[] EXPECTED_VALUE = expectedMaze;
        final String[] ACTUAL_VALUE =  actualMaze;
    
        assertArrayEquals(EXPECTED_VALUE, ACTUAL_VALUE);
    } 
    
    @Test
   	public void GIVEN_Software_WHEN_userEnteredAFileThatContains20rowsAnd20Columns_THEN_PathFinderCounterClockwiseMazeMessageIsDisplayed()
   	{ 
   		//Arrange

   		FileReaderFake fileReaderFake = new FileReaderFake();
   		ConsoleFake consoleFake = new ConsoleFake();
   		KeyboardFake keyboardFake = new KeyboardFake();
   		
   		ISoftware software = new Software(keyboardFake, consoleFake, fileReaderFake);
   		keyboardFake.add("maze.txt");
   		keyboardFake.add(Software.SENTINEL_VALUE);
   		fileReaderFake.isFileContentIsAMaze = true;
   		
   		//Act
   		
   		software.start(ANY_PATH_FINDER_CLOCKWISE,ANY_PATH_FINDER_COUNTER_CLOCKWISE); 
   		
   		//Assert
   		
   		final String EXPECTED_VALUE = Software.PATHFINDER_SOLVED_MESSAGE.replace("$pathfinderName", ANY_PATH_FINDER_COUNTER_CLOCKWISE.getClass().getSimpleName());
   		int indexToGet = consoleFake.linesDisplayed.size() - (3 + (MazeCreator.NUMBER_OF_ROWS * 1));// -1 car, size débute à 1, tandis que les index commencent à 0, -1 car le message Welcome_message est toujours affiché à la fin. Donc -2.
   																							  // - 20 (ou MazeCreator.NUMBER_OF_ROWS) pour faire abstraction du labyrinthe.
   		final String ACTUAL_VALUE = consoleFake.linesDisplayed.get(indexToGet);
   		assertEquals(EXPECTED_VALUE, ACTUAL_VALUE);
   	}
    
    @Test
    public void GIVEN_Software_WHEN_userEnteredAFileThatContains20rowsAnd20Columns_THEN_CounterClockwiseProperMazeIsDisplay()
    {   
        //Arrange
 	   
        FileReaderFake fileReaderFake = new FileReaderFake();
        ConsoleFake consoleFake = new ConsoleFake();
        KeyboardFake keyboardFake = new KeyboardFake(); 

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
        final String[] ARRAY_ROWS = {EXPECTED_FIRST_ROW,
        		EXPECTED_SECOND_ROW,
        		EXPECTED_THIRD_ROW,
        		EXPECTED_FOURTH_ROW,
        		EXPECTED_FIFTH_ROW,
        		EXPECTED_SIXTH_ROW,
        		EXPECTED_SEVENTH_ROW,
        		EXPECTED_EIGHT_ROW,
        		EXPECTED_NINETH_ROW,
        		EXPECTED_TENTH_ROW,
        		EXPECTED_ELEVENTH_ROW,
        		EXPECTED_TWELVETH_ROW,
        		EXPECTED_THIRDTEENTH_ROW,
        		EXPECTED_FOURTEENTH_ROW,
        		EXPECTED_FIFTHEENTH_ROW,
        		EXPECTED_SIXTEENTH_ROW,
        		EXPECTED_SEVENTEENTH_ROW,
        		EXPECTED_EIGHTEENTH_ROW,
        		EXPECTED_NINETEENTH_ROW,
        		EXPECTED_TWENTYTH_ROW};
    
        ISoftware software = new Software(keyboardFake, consoleFake, fileReaderFake);

        keyboardFake.add("wonderfulMaze.txt");
        keyboardFake.add(Software.SENTINEL_VALUE);
        fileReaderFake.isFileContentIsAMaze = true;
        
        //Act 
        
        software.start(ANY_PATH_FINDER_CLOCKWISE,ANY_PATH_FINDER_COUNTER_CLOCKWISE); 
    
        //Assert
        
        int indexToGet = consoleFake.linesDisplayed.size() - 22; // -1 car, size débute à 1, tandis que les index commencent à 0, -1 car le message Welcome_message est toujours affiché à la fin. Donc -2.
      
        String []expectedMaze = ARRAY_ROWS;
        
        String[] actualMaze = new String[MazeCreator.NUMBER_OF_ROWS];
        for (int i = 0; i < MazeCreator.NUMBER_OF_ROWS ;i++) {
            actualMaze[i] = consoleFake.linesDisplayed.get(indexToGet + i) ;
        }
        
        final String[] EXPECTED_VALUE = expectedMaze;
        final String[] ACTUAL_VALUE =  actualMaze;
    
        assertArrayEquals(EXPECTED_VALUE, ACTUAL_VALUE);
    } 
    
    
    @Test
	public void GIVEN_Software_WHEN_theFileContentBeenDisplayed_THEN_welcomeMessageIsDisplayedAgain()
	{ 
		//Arrange

		FileReaderFake fileReaderFake = new FileReaderFake();
		ConsoleFake consoleFake = new ConsoleFake();
		KeyboardFake keyboardFake = new KeyboardFake(); 
		
		ISoftware software = new Software(keyboardFake, consoleFake, fileReaderFake);
		keyboardFake.add("maze.txt");
		keyboardFake.add(Software.SENTINEL_VALUE); 
		fileReaderFake.isFileContentIsAMaze = true;
		
		//Act
		
		software.start(ANY_PATH_FINDER_CLOCKWISE,ANY_PATH_FINDER_COUNTER_CLOCKWISE); 
		
		//Assert
		
		final String EXPECTED_VALUE = Software.WELCOME_MESSAGE_.replace("SENTINEL_VALUE", Software.SENTINEL_VALUE);
		
		int indexToGet = consoleFake.linesDisplayed.size() - 1;// -1 car, size débute à 1, tandis que les index commencent à 0.
		final String ACTUAL_VALUE = consoleFake.linesDisplayed.get(indexToGet);
		
		assertEquals(EXPECTED_VALUE, ACTUAL_VALUE);

	}
    
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
		int[] indexesToGet = {consoleFake.linesDisplayed.size() - 3, consoleFake.linesDisplayed.size() - 2};;// -1 car, size débute à 1, tandis que les index commencent à 0, -1 car le message Welcome_message est toujours affiché à la fin. Donc -2. 
		
		String firstMessage = consoleFake.linesDisplayed.get(indexesToGet[0]);
		String secondMessage = consoleFake.linesDisplayed.get(indexesToGet[1]);
		final String[] ACTUAL_VALUE = {firstMessage, secondMessage};
		
		assertArrayEquals(EXPECTED_VALUE, ACTUAL_VALUE);
	}
   
}
