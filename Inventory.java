
import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Date;
import java.util.Scanner;

public class Inventory {
    private static ArrayList<String> items;
    private static ArrayList<String> CurrentItems;
    private static final String FILENAME ="";

    public Inventory(){
        String FILENAME = "Test.txt";
        ArrayList<String> items = new ArrayList<>();
        ArrayList<String> CurrentItems = new ArrayList<>();
    }

    /*
    
    /////////////////// a valid try for date input from user ///////////////////////
    
    import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.time.format.DateTimeParseException;
import java.util.Scanner;

public class UserDateInput {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        // Define the expected date format
        DateTimeFormatter formatter = DateTimeFormatter.ofPattern("dd-MM-yyyy");
        LocalDate userDate = null;

        System.out.print("Enter a date (in dd-MM-yyyy format): ");
        String inputDateString = scanner.nextLine();

        try {
            // Parse the input string into a LocalDate object
            userDate = LocalDate.parse(inputDateString, formatter);
            System.out.println("Date successfully parsed: " + userDate);
        } catch (DateTimeParseException e) {
            // Handle cases where the input doesn't match the format
            System.err.println("Invalid date format! Please use dd-MM-yyyy.");
        } finally {
            scanner.close();
        }
    }
} */

    // try adding a header to the list with a string that lists the attributes of the items and then list each item on a new line with that ammount of spacing.
    private static ArrayList<String> loadItemsFromFile(String FILENAME) {
        try {
            File file = new File(FILENAME);
            Scanner scanner = null;
            scanner = new Scanner(file);
            while (scanner.hasNextLine()) {
                String item = scanner.nextLine();
                items.add(item);
            }
            if (items.isEmpty()) {
                System.out.println("No items found in the file.\n");
            }
            scanner.close();
        } catch (IOException e) {
            System.out.println("An error occurred while reading the file: " + e.getMessage());
        }
        return items;
    }

    //implement a function to the items currently on hand based on a day entered. An item needs to have a date requeted attribute that can either can be Null or has a value that can be compared to.
    private static ArrayList<String> loadCurrentItemsFromFile(String FILENAME, Date currentDate) {
        // Nov 28, Consider using an Array of dates for each item so that to check if an item is available on a day. we just check if its in the list
        return CurrentItems;
    }




    private static void displayItems() {
        // Consider display an "at a glance table" that doesnt have a description but upon clicking a selection, then a detailed description of the item will com up in a section for itself
        System.out.println("Inventory Items:");
        System.out.println("----------------------------------------");
        System.out.println("Item Name + | Item Count | Date Booked | Item Description");
        for (String item : items) {
            System.out.println("- " + item);
        }
    }

    public static void main(String[] args) {
        javax.swing.SwingUtilities.invokeLater(new Runnable() {
            @Override
            public void run(){
                loadItemsFromFile(FILENAME);
                displayItems();
            }
        });
        
    }
}
    

