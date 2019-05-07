package TP2;

import java.util.ArrayList;
import java.util.List;
import java.util.Stack;

import TP2_MAZE_SERVICES.*;
import TP2_MAZE_SERVICES.Room.Type;

public class PathFinderClockwise {
	private List<Room> listOfDoomedRooms;
	private Stack<Room> path;

	public PathFinderClockwise() {
		this.listOfDoomedRooms = new ArrayList<Room>();
		this.path = new Stack<Room>();
	}


	public String pathToExitClockwise(String maze) {
		try {
            Room[][] rooms = new Room[MazeCreator.NUMBER_OF_ROWS][MazeCreator.NUMBER_OF_COLUMNS];
            this.createMaze(maze,rooms);
            Room room = MazeCreator.getStartRoom(maze);
            this.path.push(room);

            while(room.type != Room.Type.Exit) {

                Room lastRoomVisited = null;
                if(!path.isEmpty()) {
                    lastRoomVisited = this.path.peek();
                }

                //room = getRoomToVerify(lastRoomVisited,rooms);
                boolean isMovedFromRoom = false;
                if(room.up.type != Room.Type.Wall) {
                    boolean isWrongPath = this.isRoomVisited(room.up, listOfDoomedRooms);
                    if(!isWrongPath && !room.up.equals(lastRoomVisited)) {
                        this.path.push(room);
                        room = room.up;
                        isMovedFromRoom = true;
                    }
                }
                if(room.right.type != Room.Type.Wall && !isMovedFromRoom ) {
                    boolean isRoomVisited = this.isRoomVisited(room.right, listOfDoomedRooms);
                    if(!isRoomVisited && !room.right.equals(lastRoomVisited)) {
                        this.path.push(room);
                         room = room.right;
                         isMovedFromRoom = true;
                    }
                }
                if(room.down.type != Room.Type.Wall && !isMovedFromRoom) {
                    boolean isRoomVisited = this.isRoomVisited(room.down, listOfDoomedRooms);
                    if(!isRoomVisited && !room.down.equals(lastRoomVisited)) {
                        this.path.push(room);
                        room = room.down;
                        isMovedFromRoom = true;
                    }
                }
                if(room.left.type != Room.Type.Wall && !isMovedFromRoom) {
                    boolean isRoomVisited = this.isRoomVisited(room.left, listOfDoomedRooms);
                    if(!isRoomVisited && !room.left.equals(lastRoomVisited)) {
                        this.path.push(room);
                        room = room.left;
                        isMovedFromRoom = true;
                    }
                }
                if(!isMovedFromRoom){
                    Room bannedRoom = this.path.pop();
                    this.listOfDoomedRooms.add(bannedRoom);
                    room = this.path.peek();
                    }
            }
		}
        catch(MazeLengthNotEqualToExpectedValuesException e) {
        }

        String newFileContent = this.createNewFileContent(path);
        return newFileContent;
    }

	private void createMaze (String fileContent, Room[][] rooms) {
        for (int i = 0; i < MazeCreator.NUMBER_OF_ROWS; i++) {
            for (int j = 0; j < MazeCreator.NUMBER_OF_COLUMNS; j++) {
                Room room =  new Room(fileContent.charAt(j + (i*MazeCreator.NUMBER_OF_ROWS)));
                rooms[i][j] = room;
            }
        }
        addRoomToEachDirection(rooms);
    }

	private void addRoomToEachDirection(Room[][] rooms) {
        for (int i = 0; i < MazeCreator.NUMBER_OF_ROWS; i++) {
            for (int j = 0; j < MazeCreator.NUMBER_OF_COLUMNS; j++) {
                Room roomBuffer = rooms[i][j];
                if(i != 0) {
                    roomBuffer.up = rooms[i - 1][j];
                }
                if(j != MazeCreator.NUMBER_OF_COLUMNS - 1) {
                    roomBuffer.right = rooms[i][j + 1];
                }
                if(i != MazeCreator.NUMBER_OF_ROWS - 1) {
                    roomBuffer.down = rooms[i + 1][j];
                }
                if(j != 0) {
                    roomBuffer.down = rooms[i][j - 1];
                }
                rooms[i][j] = roomBuffer;
            }
        }
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

    private Room getStartRoomInArray (Room room, Room[][] rooms) {
        Room startRoom = null;
        for (int i = 0; i < MazeCreator.NUMBER_OF_ROWS; i++) {
            for (int j = 0; j < MazeCreator.NUMBER_OF_COLUMNS; j++) {
                if(room.equals(rooms[i][j])) {
                    startRoom = room;
                }
            }
        }
        return startRoom;
    }
  }
