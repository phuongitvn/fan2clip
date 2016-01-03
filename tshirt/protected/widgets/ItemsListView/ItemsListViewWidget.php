<?php
/**
 * Created by PhpStorm.
 * User: NGUYEN NGOC BAO AN
 * Date: 1/3/2016
 * Time: 2:41 PM
 */
class ItemsListViewWidget extends CWidget
{
    public $view='default';
    public $data = null;
    public function init()
    {
        parent::init();
        if(empty($this->data)){
            $dataObjects = array();
            $object1 = new stdClass();
            $object1->name = "BATMAN/AMERICAN OVAL FLAG MERCHANDISE";
            $object1->url = "https://www.sunfrog.com/Geek-Tech/BATMANAMERICAN-OVAL-FLAG-MERCHANDISE.html";
            $object1->thumb = "https://images.sunfrogshirts.com/2015/09/09/m_bat.jpg";
            $dataObjects[] = $object1;
            $object2 = new stdClass();
            $object2->name = "GREEN ARROW SHIELD";
            $object2->description = "green arrow classic logo";
            $object2->url = "https://www.sunfrog.com/Geek-Tech/Batman-Be-Batman.html";
            $object2->thumb = "https://images.sunfrogshirts.com/2015/09/15/m_Batman-Arkham-Knight-Descending-Logo.jpg";
            $dataObjects[] = $object2;

            $object3 = new stdClass();
            $object3->name = "GREEN ARROW SHIELD";
            $object3->description = "green arrow classic logo";
            $object3->url = "https://www.sunfrog.com/Geek-Tech/Green-arrow-logo-.html";
            $object3->thumb = "https://images.sunfrogshirts.com/2015/09/10/m_green-arrow-M.jpg";
            $dataObjects[] = $object3;
            $object4 = new stdClass();
            $object4->name = "SUPER GRANDPA";
            $object4->description = "green arrow classic logo";
            $object4->url = "https://www.sunfrog.com/Geek-Tech/Super-Grandpa-63532594-Guys.html";
            $object4->thumb = "https://images.sunfrogshirts.com/2015/09/09/m_Singler_MensGhostedTshirt_Front-tweaked11.jpg";
            $dataObjects[] = $object4;

            $object5 = new stdClass();
            $object5->name = "SUPER GRANDPA";
            $object5->description = "green arrow classic logo";
            $object5->url = "https://www.sunfrog.com/Geek-Tech/Super-Grandpa-63532594-Guys.html";
            $object5->thumb = "https://images.sunfrogshirts.com/2015/09/09/m_Singler_MensGhostedTshirt_Front-tweaked11.jpg";
            $dataObjects[] = $object5;
            $object5 = new stdClass();
            $object5->name = "SUPER GRANDPA";
            $object5->description = "green arrow classic logo";
            $object5->url = "https://www.sunfrog.com/Geek-Tech/Super-Grandpa-63532594-Guys.html";
            $object5->thumb = "https://images.sunfrogshirts.com/2015/09/09/m_Singler_MensGhostedTshirt_Front-tweaked11.jpg";
            $dataObjects[] = $object5;
            $object5 = new stdClass();
            $object5->name = "THANK A VET CREST SHIRT";
            $object5->description = "green arrow classic logo";
            $object5->url = "https://www.sunfrog.com/Political/Thank-a-Vet-Crest-Shirt.html";
            $object5->thumb = "https://betaimages.sunfrogshirts.com/2015/11/04/m_Thank-a-Vet-Crest-Shirt.jpg";
            $dataObjects[] = $object5;
            $this->data = $dataObjects;
        }
    }
    public function run()
    {
        $view = $this->view;
        $data = $this->data;
        $this->render($view, compact('data'));
    }
}