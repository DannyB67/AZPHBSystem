public class Notification {

    private String senderEmail, recipientEmail;


    public Notification(String sEmail, String rEmail){
        this.senderEmail = sEmail;
        this.recipientEmail = rEmail;
    }

    public String getSenderEmail(){
        return senderEmail;
    }

    public String getRecipientEmail(){
        return recipientEmail;
    }

    public String sysNotifiction(){
        return ("Email Sent");
    }
    
}
