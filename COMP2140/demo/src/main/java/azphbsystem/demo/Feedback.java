import java.util.Date;
public class Feedback {
    private String feedback;
    private Event event;
    private Date submissionDate;
    private String adminName;

public Feedback(){
    this.feedback = "";
    this. event = null;
    this.submissionDate = null;
    this.adminName = "";
}

public Feedback(Event e){
    this.event = e;
    this.feedback = "";
    this.submissionDate = new Date();
    this.adminName = "";
}

    public Feedback(Event e, String feedback, String adminName){
        this.event = e;
        this.feedback = feedback;
        this.adminName = adminName;
        this.submissionDate = new Date();
    }

    public boolean setFeedback(String feedback){
        if (feedback != null && !feedback.equals("")){
            this.feedback = feedback;
            this.submissionDate = new Date();
            if (event != null){
                event.setEventFeedback(feedback);
            }
            return true;
        }
        return false;
    }

    public String getFeedback(){
        return feedback;
    }
    public Event getEvent(){
        return event;
    }
    public void setEvent(Event e){
        this.event = e;
    }
    public void setAdminName(String name){
        if (name != null && ! name.equals("")){
            this.adminName = name;
        }
    }
    public String getAdminName(){
        return adminName;
    }

    public Date getSubmissionDate(){
        return submissionDate;
    }

    
}