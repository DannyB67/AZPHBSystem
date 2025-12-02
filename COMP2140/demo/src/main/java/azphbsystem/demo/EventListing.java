import java.util.ArrayList;
import java.io.*;

public class EventListing {
    
    private ArrayList<Event> eventList;
    private String filename;
    private String filepath;
    private String name;
    private String email;
    private String phoneNumber;
    private String eventDate;
    private String eventTime;
    private String eventLocation;
    private String eventDescription;

    public EventListing(String filename, String filepath) {
        this.filename = filename;
        this.filepath = filepath;
        this.eventList = new ArrayList<Event>();
    }
}
