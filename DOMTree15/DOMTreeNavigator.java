import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.DocumentBuilder;
import org.w3c.dom.*;

import java.io.File;

public class DOMTreeNavigator {
    public static void main(String[] args) {
        try {
            // Step 1: Create Document Object
            File xmlFile = new File("priceList.xml");
            DocumentBuilderFactory factory = DocumentBuilderFactory.newInstance();
            DocumentBuilder builder = factory.newDocumentBuilder();
            Document document = builder.parse(xmlFile);
            document.getDocumentElement().normalize();

            // Step 2: Get Root Element
            Element root = document.getDocumentElement();
            System.out.println("Root Element: " + root.getNodeName());

            // Step 3: Traverse DOM Tree
            traverseNode(root, "  ");

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    // Recursive method to traverse nodes
    private static void traverseNode(Node node, String indent) {
        if (node.getNodeType() == Node.ELEMENT_NODE) {
            System.out.println(indent + "Node: " + node.getNodeName());

            if (node.hasChildNodes()) {
                NodeList children = node.getChildNodes();
                for (int i = 0; i < children.getLength(); i++) {
                    traverseNode(children.item(i), indent + "  ");
                }
            }
        } else if (node.getNodeType() == Node.TEXT_NODE) {
            String value = node.getNodeValue().trim();
            if (!value.isEmpty()) {
                System.out.println(indent + "Value: " + value);
            }
        }
    }
}
