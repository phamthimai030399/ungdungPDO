<?php


class ProductModel extends MyModel
{
    /**
     * @return array
     */
    public function getAll(): array
    {

        $stmt = $this->conn->prepare("SELECT id , product_code, product_name, price FROM products ");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    /**
     * @param $product_code
     * @param $product_name
     * @param $price
     * @return void
     */
    public function insert($product_code, $product_name, $price)
    {
        $sql = "INSERT INTO products (`product_code`, `product_name` , `price`)
    VALUES ('$product_code' , '$product_name', $price)";
        $this->conn->exec($sql);
    }

    public function getById($id){
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE id = $id LIMIT 1 ");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetchAll();
        return $arr;
    }

    public function update($id , $product_code , $product_name , $price){
        $sql = "UPDATE products SET product_code = '$product_code' , product_name = '$product_name' , price = $price WHERE id=$id";;
        $this->conn->exec($sql);
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM products WHERE id = $id");
        $stmt->execute();
    }

    public function seach($seachName){
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE product_name LIKE '%$seachName%'");
        $stmt->execute();
        $arr = $stmt->fetchAll();
        return $arr;
    }
}

