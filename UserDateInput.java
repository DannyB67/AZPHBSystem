import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.time.format.DateTimeParseException;
import java.util.Scanner;
public class UserDateInput 
{

public UserDateInput()
    {
        main();
    }

    public static void main() 
    {
        Scanner scanner = new Scanner(System.in);
        // Define the expected date format
        DateTimeFormatter formatter = DateTimeFormatter.ofPattern("dd-MM-yyyy");
        LocalDate userDate = null;
        System.out.println("Enter a date (in dd-MM-yyyy format): ");
        String inputDateString = scanner.nextLine();

        try 
        {
            // Parse the input string into a LocalDate object
            userDate = LocalDate.parse(inputDateString, formatter);
            System.out.println("Date successfully parsed: " + userDate);
        } catch (DateTimeParseException e) 
        {
            // Handle cases where the input doesn't match the format
            System.err.println("Invalid date format! Please use dd-MM-yyyy.");
        } finally 
        {
            scanner.close();
        }
    
}
}


