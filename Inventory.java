
import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Scanner;

public class Inventory {
    private static ArrayList<String> items = new ArrayList<>();

    private static ArrayList<String> loadItemsFromFile(String filename) {
        try {
            File file = new File(filename);
            Scanner scanner = null;
            scanner = new Scanner(file);
            while (scanner.hasNextLine()) {
                String item = scanner.nextLine();
                items.add(item);
            }
            scanner.close();
        } catch (IOException e) {
            System.out.println("An error occurred while reading the file: " + e.getMessage());
        }
        return items;
    }


    private static void displayItems() {
        System.out.println("Inventory Items:");
        for (String item : items) {
            System.out.println("- " + item);
        }
    }

    public static void main(String[] args) {
        javax.swing.SwingUtilities.invokeLater(new Runnable() {
            @Override
            public void run(){
                loadItemsFromFile("Test.txt");
                displayItems();
            }
        });
        
    }
}
