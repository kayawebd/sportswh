<?php
require_once "CartItem.php";
require_once "DBAccess.php";

class ShoppingCart
{
    private $_cartItems = [];
    private $_shoppingOrderId;

    public function count()
    {
        return count($this->_cartItems);
    }

    public function setShoppingOrderID($id)
    {
        $this->_shoppingOrderId = (int)$id;
    }

    public function getItems()
    {
        return $this->_cartItems;
    }

    //add item to cart
    public function addItem($cartItem)
    {
        //if cartItem already exists update quatity
        $found = $this->inCart($cartItem);

        if ($found != null) {
            //update quantity
            $this->updateItem($cartItem);
        } else {
            //insert new cart item
            $this->_cartItems[] = $cartItem;
        }
    }

    //update quantity
    public function updateItem($cartItem)
    {
        $index = $this->itemIndex($cartItem);

        //get current quantity
        $oldQty = $this->_cartItems[$index]->getQuantity();
        $additionalQty = $cartItem->getQuantity();

        //calculate new quantity
        $newQty = $oldQty + $additionalQty;

        //update cart item with new quatity
        $this->_cartItems[$index]->setQuantity($newQty);
    }

    //remove item
    public function removeItem($cartItem)
    {
        // $index = array_search($cartItem, $this->_cartItems);
        $index = $this->itemIndex($cartItem);

        if ($index >= 0) {
            //remove array element
            unset($this->_cartItems[$index]);
            //reorganise values
            $this->_cartItems = array_values($this->_cartItems);
        }
    }

    //calculate total
    public function calculateTotal()
    {
        $total = 0.0;

        foreach ($this->_cartItems as $item) {
            $total += $item->getQuantity() * $item->getPrice();
        }
        return $total;
    }

    //save cart
    public function saveCart($firstName, $lastName, $address, $contactNumber, $email, $creditCardNumber, $expiryDate, $nameOnCard, $csv)
    {
        //database setup and connect
        include "settings/db.php";

        $db = new DBAccess($dsn, $username, $password);
        $pdo = $db->connect();

        //set up SQL statement to insert order
        $sql = "INSERT INTO shoppingorder(orderDate, firstName, lastName, address, contactNumber, email, creditCardNumber, expiryDate, nameOnCard,csv) VALUES(CURRENT_TIMESTAMP(), :firstName, :lastName, :address, :contactNumber, :email, :creditCardNumber, :expiryDate, :nameOnCard, :csv)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":firstName", $firstName, PDO::PARAM_STR);
        $stmt->bindValue(":lastName", $lastName, PDO::PARAM_STR);
        $stmt->bindValue(":address", $address, PDO::PARAM_STR);
        $stmt->bindValue(":contactNumber", $contactNumber, PDO::PARAM_STR);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":creditCardNumber", $creditCardNumber, PDO::PARAM_STR);
        $stmt->bindValue(":expiryDate", $expiryDate, PDO::PARAM_STR);
        $stmt->bindValue(":nameOnCard", $nameOnCard, PDO::PARAM_STR);
        $stmt->bindValue(":csv", $csv, PDO::PARAM_STR);

        $shoppingOrderID = $db->executeNonQuery($stmt, true);

        //loop through shopping cart, insert items
        foreach ($this->_cartItems as $item) {

            //set up insert statement
            $sql = "INSERT INTO orderitem(itemId, price, quantity, shoppingOrderId) values(:itemId, :price, :quantity, :shoppingOrderID)";

            //for each item insert a row in OrderItem
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":itemId", $item->getItemId(), PDO::PARAM_INT);
            $stmt->bindValue(":price", $item->getPrice(), PDO::PARAM_STR);
            $stmt->bindValue(":quantity", $item->getQuantity(), PDO::PARAM_INT);
            $stmt->bindValue(":shoppingOrderID", $shoppingOrderID, PDO::PARAM_INT);
            $db->executeNonQuery($stmt);
        }
        return $shoppingOrderID;
    }

    private function inCart($cartItem)
    {
        $found = null;

        foreach ($this->_cartItems as $item) {
            if ($item->getItemId() == $cartItem->getItemId()) {
                $found = $item;
            }
        }
        return $found;
    }

    private function itemIndex($cartItem)
    {
        $index = -1;

        for ($i = 0; $i < $this->count(); $i++) {
            if ($cartItem->getItemId() == $this->_cartItems[$i]->getItemId()) {
                $index = $i;
            }
        }
        return $index;
    }

    //display array testing purposes
    public function displayArray()
    {
        echo "<pre>";
        print_r($this->_cartItems);
        echo "</pre>";
    }
}
