package TP2;
import TP2_MAZE_SERVICES.*;

import java.io.IOException;

import TP2_READ_WRITES_SERVICES.*;
import TP2_MAZE_SERVICES.*;

/**
 * Reprï¿½sente le logiciel ï¿½ implï¿½menter
 *
 * @author 
 * @version 2019
 */
public class Software implements ISoftware {
	private static final String ROOT_PATH = "./";
	
	public static void main(String[] args){
		
		IKeyboardInput keyboardInput = new Keyboard();
		IFileInput fileInput = new FileReader();
		IScreenOutput screenOutput = new Console();
		IPathFinder pathFinderCounterClockwise = new PathFinderCounterClockwise();
		IPathFinder pathFinderClockwise = new PathFinderClockwise();
		
		ISoftware software = new Software(keyboardInput, screenOutput, fileInput);
		software.start(pathFinderCounterClockwise,pathFinderClockwise);	
	}
	
	public static final String SENTINEL_VALUE = "0";
	
	public static final String WELCOME_MESSAGE_= "Entrer le nom du fichier (entrer SENTINEL_VALUE pour quitter le programme):";
	public static final String ERROR_FILE_MESSAGE = "Erreur lors de la lecture du fichier $fileName.";
	public static final String MAZE_MESSAGE = "Voici le labyrinthe lu depuis le fichier $fileName.";
	public static final String NOT_A_MAZE_MESSAGE = "Le fichier $fileName ne contient pas un labyrinthe de " + MazeCreator.NUMBER_OF_ROWS + " rangées et de " + MazeCreator.NUMBER_OF_COLUMNS + " colonnes.";
	public static final String PATHFINDER_SOLVED_MESSAGE  = "Solution du pathfinder $pathfinderName.";
	public static final String PATHFINDER_NO_SOLUTION_MESSAGE  = "Le pathfinder $pathfinderName n'a pas réussi à solutionner le problème.";
	
	private IKeyboardInput keyboardInput;
	private IFileInput fileInput;
	private IScreenOutput screenOutput;
	
	public Software(IKeyboardInput keyboardInput, IScreenOutput screenOutput, IFileInput fileInput)
	{	
		this.keyboardInput = keyboardInput;
		this.screenOutput = screenOutput;
		this.fileInput = fileInput;
	}
	
	public void start(IPathFinder pathFinderCounterClockwise, IPathFinder pathFinderClockwise) {	
		final String WELCOME_MESSAGE = WELCOME_MESSAGE_.replace("SENTINEL_VALUE", Software.SENTINEL_VALUE);
		this.screenOutput.write(WELCOME_MESSAGE);
		String lineRead = this.keyboardInput.read();
		
		while(!lineRead.equals(Software.SENTINEL_VALUE)) {
			
			String fileContent = null;

			try {
				fileContent = this.fileInput.read(lineRead);
				MazeCreator.validateDimensions(fileContent);
				String solvedClockMaze = pathFinderClockwise.pathToExit(fileContent);
				String solvedCounterClockMaze = pathFinderCounterClockwise.pathToExit(fileContent);
				
				this.screenOutput.writeLine(MAZE_MESSAGE.replace("$fileName", lineRead));
				this.screenOutput.writeLine("");
				String[] Ilines = fileContent.split("(?<=\\G.{" + MazeCreator.NUMBER_OF_COLUMNS + "})");
				for (String lines : Ilines) {
                    this.screenOutput.writeLine(lines);
                }
				
				this.screenOutput.writeLine(PATHFINDER_SOLVED_MESSAGE.replace("$pathfinderName", pathFinderClockwise.getClass().getSimpleName()));
				String[] lines = solvedClockMaze.split("(?<=\\G.{" + MazeCreator.NUMBER_OF_COLUMNS + "})");
                for (String line : lines) {
                    this.screenOutput.writeLine(line);
                }
                this.screenOutput.writeLine("");
                
                this.screenOutput.writeLine(PATHFINDER_SOLVED_MESSAGE.replace("$pathfinderName", pathFinderCounterClockwise.getClass().getSimpleName()));
                lines = solvedCounterClockMaze.split("(?<=\\G.{" + MazeCreator.NUMBER_OF_COLUMNS + "})");
                for (String line : lines) {
                    this.screenOutput.writeLine(line);
                }
                this.screenOutput.writeLine("");
                
                 //this.screenOutput.write(WELCOME_MESSAGE);
			}
			catch (MazeLengthNotEqualToExpectedValuesException ex) {
				this.screenOutput.writeLine(NOT_A_MAZE_MESSAGE.replace("$fileName", lineRead));
			}
			catch (IOException ex) {
				this.screenOutput.writeLine(ERROR_FILE_MESSAGE.replace("$fileName", lineRead));
			}
			catch(UnsolvableMaze ex) {
				this.screenOutput.writeLine(PATHFINDER_NO_SOLUTION_MESSAGE.replace("$pathfinderName", pathFinderClockwise.getClass().getSimpleName()));
				this.screenOutput.writeLine(PATHFINDER_NO_SOLUTION_MESSAGE.replace("$pathfinderName", pathFinderCounterClockwise.getClass().getSimpleName()));
			}
			finally {
				this.screenOutput.write(WELCOME_MESSAGE);
				lineRead = this.keyboardInput.read();
			}
		}
	}
}



