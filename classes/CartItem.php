<?php
class CartItem
{
    private $_itemName;
    private $_quantity;
    private $_itemPrice;
    private $_salePrice;
    private $_itemId;
    private $_productPhoto;
    public function __construct($itemName, $quantity, $itemPrice, $salePrice, $itemId, $productPhoto)
    {
        $this->_itemName = $itemName;
        $this->_quantity = (int)$quantity;
        $this->_itemPrice = (float)$itemPrice;
        $this->_salePrice = (float)$salePrice;
        $this->_itemId = (int)$itemId;
        $this->_productPhoto = $productPhoto;
    }
    public function getItemName()
    {
        return $this->_itemName;
    }
    public function getQuantity()
    {
        return $this->_quantity;
    }
    public function setQuantity($value)
    {
        if ($value >= 0) {
            $this->_quantity = (int)$value;
        } else {
            throw new Exception("Quantity must be positive");
        }
    }
    public function getPrice()
    {
        return $this->_itemPrice;
    }
    public function getSalePrice()
    {
        return $this->_salePrice;
    }
    public function getItemId()
    {
        return $this->_itemId;
    }
    public function getProductPhoto()
    {
        return $this->_productPhoto;
    }
}
