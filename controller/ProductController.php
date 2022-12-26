<?php

class ProductController extends MyController
{
    private $productModel;

    public function __construct()
    {
        $this->loadModel("ProductModel");
        $this->productModel = new ProductModel();
    }

//    public function list()
//    {
//        $data['arr'] = $this->productModel->getAll();
//        $this->loadView('products/list', $data);
//    }

    public function insert()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $this->loadView('products/insert');
        } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->validate();
            import('core/Image');
            $image = new Image($_FILES['image']);
            $imageUrl = $image->move('public/uploads');
            $inputCode = $_POST["product_code"];
            $inputName = $_POST["product_name"];
            $inputPrice = $_POST["price"];
            $inputImage = $imageUrl === false ? '' : $imageUrl;
            $this->productModel->insert($inputCode, $inputName, $inputPrice, $inputImage);
            redirect(route('products list'));
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $productId = $_GET["product_id"];
            $data['product'] = $this->productModel->getById($productId);
            if (empty($data['product'])) {
                die("Không tồn tại product này");
            }
            $this->loadView('products/update', $data);
        } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->validate();
            import('core/Image');
            $image = new Image($_FILES['image']);
            if ($image->isImage()) {
                $imageUrl = $image->move('public/uploads');
            } else {
                $imageUrl = false;
            }
            $id = $_POST["product_id"];
            $inputCode = $_POST["product_code"];
            $inputName = $_POST["product_name"];
            $inputPrice = $_POST["price"];
            $oldProduct = $this->productModel->getById($id);
            $inputImage = $imageUrl === false ? $oldProduct['image'] : $imageUrl; 
            $this->productModel->update($id, $inputCode, $inputName, $inputPrice, $inputImage);
            redirect(route('products list'));
        }
    }


    public function delete()
    {
        if (isset($_GET["product_id"])) {
            $productId = $_GET["product_id"];
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                $this->productModel->delete($productId);
                redirect(route('products list'));
            }
        }
    }

    public function list()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (!isset($_GET['searchName'])){
                $data['searchName'] = "";
                $data['arr'] = $this->productModel->getAll();
            } else {
                $data['searchName'] = $_GET['searchName'];
                $data['arr'] = $this->productModel->seach($data['searchName']);
            }
            $this->loadView('products/list', $data);
        }
    }

    public function validate(){
        if ($_POST['product_code']== "" || $_POST['product_name'] =="" || $_POST['price']==""){
            // redirect(route($_SERVER['HTTP_REFERER']));  
            // header($_SERVER['HTTP_REFERER']); 
            //Lấy được ulr trước đó.
            //Redirect về ulr đó
            redirectBack(['errMessage' => 'Data invalid.']);
        } 
    }

}
