<?php

class Product
{
    const SHOW_BY_DEFAULT=3;
    const SHOW_LAST_PRODUCTS=9;

    public static function getLatestProducts($count=self::SHOW_LAST_PRODUCTS)
    {
        $count=intval($count);

        $db=Db::getConnection();
        $productsList=array();

        $result=$db->query('SELECT id, name, price, image, is_new FROM product'
        .' WHERE status="1"'
        .' ORDER BY id DESC'
        .' LIMIT '.$count
          );

        $i=0; 
        while($row=$result->fetch())
        {
            $productsList[$i]['id']=$row['id'];
            $productsList[$i]['name']=$row['name'];
            $productsList[$i]['price']=$row['price'];
            $productsList[$i]['image']=$row['image'];
            $productsList[$i]['is_new']=$row['is_new'];
            $i++;
        }
       
        return $productsList;
    }

    public static function getProductDate($id)
    {
        $id=intval($id);
        $db=Db::getConnection();
        $productData= array();

        $result=$db->query('SELECT name, price, brand, image, description FROM product WHERE id="'.$id.'"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $productData=$result->fetch();
      
        return $productData;
    }

    public static function getProductsListCategory($id, $page)
    {
        $id=intval($id);
        $number_page=($page-1)*self::SHOW_BY_DEFAULT;

        $db=Db::getConnection();
        $CategoryProductList= array();

        $result=$db->query('SELECT id, name, price, brand, image, description, is_new FROM product WHERE category_id="'.$id.'" LIMIT '.self::SHOW_BY_DEFAULT.' OFFSET '.$number_page);

        $i=0; 
        while($row=$result->fetch())
        {
            $CategoryProductList[$i]['id']=$row['id'];
            $CategoryProductList[$i]['name']=$row['name'];
            $CategoryProductList[$i]['price']=$row['price'];
            $CategoryProductList[$i]['image']=$row['image'];
            $CategoryProductList[$i]['is_new']=$row['is_new'];
            $i++;
        }
       
        return $CategoryProductList;

    }

    public static function getTotalProductsInCategory($category_id)
    {
        $category_id=intval($category_id);
        $db=Db::getConnection();
        $totalNumberProduct=array();

        $result=$db->query("SELECT  id FROM product WHERE category_id=".$category_id);
        $i=0;
        while($row=$result->fetch())
        {
            $totalNumberProduct[$i]["id"]=$row["id"];
            $i++;
        }
       
        return count($totalNumberProduct);
    }

    public static function getProductsByIds($idsArray)
    {
        $products=array();
        $db= Db::getConnection();
        $idsString=implode(",", $idsArray);

        $sql="SELECT * FROM product WHERE status='1' AND id In ($idsString)";

        $result=$db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i=0;
        while ($row=$result->fetch())
        {
            $products[$i]["id"]=$row["id"];
            $products[$i]["name"]=$row["name"];
            $products[$i]["price"]=$row["price"];
            $i++;
        }
        return $products;
    } 
}