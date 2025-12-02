import java.util.ArrayList;
import java.util.Date;

public class Event {
    private int eventID;
    private String clientName;
    private String clientEmail;
    private String clientPhoneNumber;
    private String eventName;
    private Date dateEventRequestCreated;
    private Date eventDate;
    private String clientSignature;
    private String eventStatus;
    private ArrayList<InventoryItem> ItemsRequested;
    private int itemcount;
    private String itemName;
    private String eventFeedback;
    private String eventCancellationDescription;

    public Event(String clientName, String clientEmail, String clientPhoneNumber, String eventName, Date dateEventRequestCreated, Date eventDate, String clientSignature, String eventStatus) {
        this.clientName = clientName;
        this.clientEmail = clientEmail;
        this.clientPhoneNumber = clientPhoneNumber;
        this.eventName = eventName;
        this.dateEventRequestCreated = dateEventRequestCreated;
        this.eventDate = eventDate;
        this.clientSignature = clientSignature;
        this.eventStatus = eventStatus;
        this.ItemsRequested = new ArrayList<InventoryItem>();
        this.itemcount = itemcount;
        this.itemName = itemName;
        this.eventFeedback = eventFeedback;
        this.eventCancellationDescription = eventCancellationDescription;
    }

    public void setName(String Name) {

    }

    public void setEmail(String Email) {

    }

    public void setPhoneNumber(String phoneNumber) {

    }

    public void setEventCreationDate(Date createDate) {

    }

    public void setEventDate(Date eventDate) {

    }

    public void setSignature(String sign) {

    }

    public void setStauts(String status) {

    }

    public void setItems(ArrayList<InventoryItem>items) {

    }

    public void setItemName(String name) {

    }

    public void setItemCount(int count) {

    }

    public void setEventFeedback(String feedback) {

    }

    public void setEventCancellationDescription(String cancel) {

    }

    public int getEventID() {
        return eventID;
    }

    public String getName () {
        return clientName;
    }

    public String getEmail () {
        return clientEmail;
    }

    public String getPhoneNumber () {
        return clientPhoneNumber;
    }

    public Date getEventCreationDate () {
        return dateEventRequestCreated;
    }

    public Date getEventDate () {
        return eventDate;
    }

    public String getSignature () {
        return clientSignature;
    }

    public String getStatus () {
        return eventStatus;
    }

    public ArrayList getItems () { //Check this
        return ItemsRequested;
    }

    public String getItemname () {
        return itemName;
    }

    public int getItemCount() {
        return itemcount;
    }

    public String getEventFeedback() {
        return eventFeedback;
    }

    public String getEventCancellationDescription() {
        return eventCancellationDescription;
    }
}
