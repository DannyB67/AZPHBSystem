import java.time.LocalDate;

public class Request {
    private static int nextToken = 1;
    private int token;
    private String name, pNum, email;
    private String eventName;
    private String eventDescription;
    private String venue;
    private String equipName;
    private int equipCount;
    private LocalDate currDate, reserveDate;

    public Request(){

    }

    public Request(String name, String pNum, String email, String eventName, String eventDescription, 
        String venue, String equipName){
        this.name = name;
        this.pNum = pNum;
        this.email = email;
        this.eventName = eventName;
        this. eventDescription = eventDescription;
        this.venue = venue;
        this.equipName = equipName;
        token = nextToken;
        nextToken++;
    }

    public void setName(String name){
        this.name = name;
    }

    public String getName(){
        return name;
    }

    public void setPhoneNum(String pNum){
        this.pNum = pNum;
    }

    public String getPhoneNum(){
        return pNum;
    }

    public void setEmail(String email){
        this.email = email;
    }

    public String getEmail(){
        return email;
    }

    public void setEventName(String eventName){
        this.eventName = eventName;
    }

    public String getEventName(){
        return eventName;
    }

    public void setEventDescription(String eventDescription){
        this.eventDescription = eventDescription;
    }

    public String getEventDescription(){
        return eventDescription;
    }

    public void setVenue(String venue){
        this.venue = venue;
    }

    public String getVenue(){
        return venue;
    }

    public void setToken(int token){
        this.token = token;
    }

    public String getToken(){
        return "00" + token;
    }
    
    public static void resetToken(){
       nextToken = 1;   
    }

    public String toString(){
        return "\n" + getToken() + " . " + getName() + " . " + getPhoneNum() + " . " + getEmail() + " . " + getEventName() + " . " + 
        getEventDescription() + " . "+ " . " + getVenue() + " . ";
    }

}
