//APathFinder contenu ******************************************************************************************************************
package TP2;

import java.util.ArrayDeque;
import java.util.ArrayList;
import java.util.List;
import java.util.Stack;

import TP2_MAZE_SERVICES.MazeCreator;
import TP2_MAZE_SERVICES.MazeLengthNotEqualToExpectedValuesException;
import TP2_MAZE_SERVICES.Room;

public abstract class APathFinder implements IPathFinder{
	
	private List<Room> listOfDoomedRooms;
	private Stack<Room> path;
	private String[] arrayOfDirection;
	
	public APathFinder (String[] arrayOfDirection) {
		this.listOfDoomedRooms = new ArrayList<Room>();
		this.path = new Stack<Room>();
		this.arrayOfDirection = arrayOfDirection;
	}	
	
	public String pathToExit (String fileContent) {
		try {
            Room room = MazeCreator.getStartRoom(fileContent);
            Room loopRoom = null;
            
            while(room.type != Room.Type.Exit) {
            	
            	boolean isStartRoom = false;
            	if (room.type == Room.Type.Start) {
            		isStartRoom = true;
            	}
            	
            	Room lastRoomVisited = null;
            	if(!path.empty()) {
            		lastRoomVisited = this.path.peek();
            	}
            	
            	boolean isMovedFromRoom = false;
                
                for (String direction: arrayOfDirection) {
                	Room roomDirection = getRoomDirection(direction,room);
                	if (isStartRoom) {
                		stopLoopToStart(loopRoom, roomDirection);
                	}
                	if(roomDirection.type != Room.Type.Wall && !isMovedFromRoom) {
                    	boolean isWrongPath = this.isRoomVisited(roomDirection, listOfDoomedRooms);
                    	if(!isWrongPath && !roomDirection.equals(lastRoomVisited)) {
                    		if(isStartRoom) {
                    			loopRoom = roomDirection;
                    		}
                    		this.path.push(room);
                    		room = roomDirection;
                            isMovedFromRoom = true;
                            isStartRoom = false;
                    	}
                    }
                }
                if(!isMovedFromRoom){
                	boolean isMazeUnSolvable = isMazeUnsolvable(room);
                	if(isMazeUnSolvable) throw new UnsolvableMaze();
                	
	        		this.listOfDoomedRooms.add(room);
	        		room = this.path.peek();
	        		this.path.pop();
            	}
            }
		} 
		catch (MazeLengthNotEqualToExpectedValuesException e) {
		
		}
		String newFileContent = this.createNewFileContent(path);
		return newFileContent;
	}
	
	private boolean isRoomVisited (Room room, List<Room> listOfDoomedRooms) {
		boolean isRoomVisited = false;
		for(Room element : listOfDoomedRooms) {
    		if (element.equals(room)) {
    			isRoomVisited = true;
    		}
		}
		return isRoomVisited;
	}
	
	private String createNewFileContent(Stack<Room> roomPath) {
		List<Room> arrayBuffer = new ArrayList<Room>();
		
		createArrayListBuffer(roomPath,arrayBuffer);
		
		ArrayList<Room> realList = new ArrayList<Room>();
		
		createRealArrayList(arrayBuffer,realList);
		
		Room startRoom = realList.get(0);
		
		String newFileContent = MazeCreator.getStringMazeWithPathToExitRoom(startRoom, realList);
		
		return newFileContent;
	}
	
	private void createArrayListBuffer(Stack<Room> roomPath, List<Room> arrayBuffer) {
		
		for (Room element: roomPath) {
			arrayBuffer.add(element);
		}
	}
	
	private void createRealArrayList (List<Room> arrayBuffer, ArrayList<Room> realList) {
		
		int arrayBufferLength = arrayBuffer.size();
		
		for(int i = arrayBufferLength - 1; i > -1; i--) {
			realList.add(arrayBuffer.get(i));
		}
	}
	
	private Room getRoomDirection (String direction, Room room) {
		Room roomDirection = room;
    	switch (direction) {
    	case "up":
    		roomDirection = room.up;
    		break;
    	case "left":
    		roomDirection = room.left;
    		break;
    	case "down":
    		roomDirection = room.down;
    		break;
    	case "right":
    		roomDirection = room.right;
    		break;
    	}
    	return roomDirection;
	}
	
	private boolean isMazeUnsolvable (Room room) {
		boolean isMazeUnsolvable = false;
		int numberOfBlockedRoom = 0;
		for (String direction: arrayOfDirection) {
        	Room roomDirection = getRoomDirection(direction,room);
        	boolean isWrongPath = this.isRoomVisited(roomDirection, listOfDoomedRooms);
        	if(roomDirection.type == Room.Type.Wall || isWrongPath) {
        		numberOfBlockedRoom++;
        	}
        }
		
		if(numberOfBlockedRoom == arrayOfDirection.length) {
			isMazeUnsolvable = true;
		}
		return isMazeUnsolvable;
	}
	private void stopLoopToStart (Room firstRoomLoop,Room roomToVisite) {
		if(roomToVisite.equals(firstRoomLoop)) {
			listOfDoomedRooms.add(firstRoomLoop);
		}
	}
}

@SuppressWarnings("serial")
class UnsolvableMaze extends RuntimeException{}

// Nouveau test **********************************************************************************************************

	@Test
	public void GIVEN_pathFinder_WHEN_IsaskedToResolveLoopLinearPathMaze_THEN_MazeIsResolve() {
		
		//Arrange
		IPathFinder pathfinder = new PathFinderCounterClockwise();
		
		final String FIRST_ROW = 		"XXXXXXXXXXXXXXXXXXXX";
		final String SECOND_ROW = 		"XXXXXXXXXXXXXXXXXXXX";
		final String THIRD_ROW = 		"XXXXXXXXXXXXXXXXXXXX";
		final String FOURTH_ROW = 		"XXXXXXXXXXXXXEXXXXXX";
		final String FIFTH_ROW = 		"XXXXXXXXXXXXX XXXXXX";
		final String SIXTH_ROW = 		"XXXXX    S    XXXXXX";
		final String SEVENTH_ROW = 		"XXXXX XXX XXXXXXXXXX";
		final String EIGHTH_ROW = 		"XXXXX XXX  XXXXXXXXX";
		final String NINETH_ROW = 		"XXXXX XXXX XXXXXXXXX";
		final String TENTH_ROW = 		"XXXXX      XXXXXXXXX";
		final String ELEVENTH_ROW = 	"XXXXXXXXXXXXXXXXXXXX";
		final String TWELVETH_ROW = 	"XXXXXXXXXXXXXXXXXXXX";
		final String THIRTEENTH_ROW = 	"XXXXXXXXXXXXXXXXXXXX";
		final String FOURTEENTH_ROW = 	"XXXXXXXXXXXXXXXXXXXX";
		final String FIVETEENTH_ROW = 	"XXXXXXXXXXXXXXXXXXXX";
		final String SIXTHEENTH_ROW = 	"XXXXXXXXXXXXXXXXXXXX";
		final String SEVENTEENTH_ROW = 	"XXXXXXXXXXXXXXXXXXXX";
		final String EIGHTEENTH_ROW = 	"XXXXXXXXXXXXXXXXXXXX";
		final String NINETEENTH_ROW = 	"XXXXXXXXXXXXXXXXXXXX";
		final String TWENTYTH_ROW = 	"XXXXXXXXXXXXXXXXXXXX";
		
		final String MAZE = FIRST_ROW + SECOND_ROW + THIRD_ROW + FOURTH_ROW + FIFTH_ROW + SIXTH_ROW + SEVENTH_ROW + EIGHTH_ROW + NINETH_ROW + TENTH_ROW + ELEVENTH_ROW + TWELVETH_ROW + THIRTEENTH_ROW + FOURTEENTH_ROW + FIVETEENTH_ROW + SIXTHEENTH_ROW + SEVENTEENTH_ROW + EIGHTEENTH_ROW + NINETEENTH_ROW + TWENTYTH_ROW;  
		
		//Act
		
		String newMaze = pathfinder.pathToExit(MAZE);
		
		//Assert
		final String EXPECTED_FIRST_ROW = 		"XXXXXXXXXXXXXXXXXXXX";
		final String EXPECTED_SECOND_ROW = 		"XXXXXXXXXXXXXXXXXXXX";
		final String EXPECTED_THIRD_ROW = 		"XXXXXXXXXXXXXXXXXXXX";
		final String EXPECTED_FOURTH_ROW = 		"XXXXXXXXXXXXXEXXXXXX";
		final String EXPECTED_FIFTH_ROW = 		"XXXXXXXXXXXXXPXXXXXX";
		final String EXPECTED_SIXTH_ROW = 		"XXXXXPPPPSPPPPXXXXXX";
		final String EXPECTED_SEVENTH_ROW = 	"XXXXXPXXXPXXXXXXXXXX";
		final String EXPECTED_EIGHTH_ROW = 		"XXXXXPXXXPPXXXXXXXXX";
		final String EXPECTED_NINETH_ROW = 		"XXXXXPXXXXPXXXXXXXXX";
		final String EXPECTED_TENTH_ROW = 		"XXXXXPPPPPPXXXXXXXXX";
		final String EXPECTED_ELEVENTH_ROW = 	"XXXXXXXXXXXXXXXXXXXX";
		final String EXPECTED_TWELVETH_ROW = 	"XXXXXXXXXXXXXXXXXXXX";
		final String EXPECTED_THIRTEENTH_ROW = 	"XXXXXXXXXXXXXXXXXXXX";
		final String EXPECTED_FOURTEENTH_ROW = 	"XXXXXXXXXXXXXXXXXXXX";
		final String EXPECTED_FIVETEENTH_ROW = 	"XXXXXXXXXXXXXXXXXXXX";
		final String EXPECTED_SIXTHEENTH_ROW = 	"XXXXXXXXXXXXXXXXXXXX";
		final String EXPECTED_SEVENTEENTH_ROW = "XXXXXXXXXXXXXXXXXXXX";
		final String EXPECTED_EIGHTEENTH_ROW = 	"XXXXXXXXXXXXXXXXXXXX";
		final String EXPECTED_NINETEENTH_ROW = 	"XXXXXXXXXXXXXXXXXXXX";
		final String EXPECTED_TWENTYTH_ROW = 	"XXXXXXXXXXXXXXXXXXXX";
		
		final String EXPECTED_MAZE = EXPECTED_FIRST_ROW + EXPECTED_SECOND_ROW + EXPECTED_THIRD_ROW + EXPECTED_FOURTH_ROW + EXPECTED_FIFTH_ROW + EXPECTED_SIXTH_ROW + EXPECTED_SEVENTH_ROW + EXPECTED_EIGHTH_ROW + EXPECTED_NINETH_ROW + EXPECTED_TENTH_ROW + EXPECTED_ELEVENTH_ROW + EXPECTED_TWELVETH_ROW + EXPECTED_THIRTEENTH_ROW + EXPECTED_FOURTEENTH_ROW + EXPECTED_FIVETEENTH_ROW + EXPECTED_SIXTHEENTH_ROW + EXPECTED_SEVENTEENTH_ROW + EXPECTED_EIGHTEENTH_ROW + EXPECTED_NINETEENTH_ROW + EXPECTED_TWENTYTH_ROW;
		final String ACTUAL_MAZE = newMaze;
		assertEquals(EXPECTED_MAZE,ACTUAL_MAZE);
	}
	
	//PathFinderClockwise*****************************************************************************************************************************************
	
	package TP2;

import TP2_MAZE_SERVICES.*;

import java.util.ArrayDeque;
import java.util.ArrayList;
import java.util.List;
import java.util.Stack;

public class PathFinderClockwise extends APathFinder{
	
	 public static final String[] ARRAY_OF_DIRECTION = {"up","right","down","left"};
	 
	
	 public PathFinderClockwise() {
		 
		 super(ARRAY_OF_DIRECTION);
	 }
}

//PathFinderCounterClockwise ****************************************************************************************************************************************
package TP2;

import TP2_MAZE_SERVICES.*;
import java.util.ArrayList;
import java.util.List;
import java.util.Stack;
import java.util.ArrayDeque;

public class PathFinderCounterClockwise extends APathFinder{
	
	public static final String[] ARRAY_OF_DIRECTION = {"up","left","down","right"};
	 
	 public PathFinderCounterClockwise() {
		 
		 super(ARRAY_OF_DIRECTION);
	 }
}
