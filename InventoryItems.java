import java.time.*;
public class InventoryItems {
    private String ItemName;  
    private int ItemCount;
    private LocalDate ItemRequestDate= LocalDate.now();
    private String ItemDescription;

    public InventoryItems(){}

    public void setItemName(String Name){
        ItemName = Name;
    }

    public void setItemCount(int Count){
        ItemCount = Count;
    }

    public void setItemRequestDate(LocalDate Date){
        ItemRequestDate = Date;
    }

    public void setItemDescription(String Description){
        ItemDescription = Description;
    }

    public String getItemName(){
        return ItemName;
    }

    public int getItemCount(){
        return ItemCount;
    }

    public LocalDate getItemRequestDate(){
        return ItemRequestDate;
    }

     public String getItemDescription(){
        return ItemDescription;
    }

}
