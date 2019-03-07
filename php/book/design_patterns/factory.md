##工厂方法设计模式

```php
//抽象类
abstract class Creator
{
    protected abstract function factoryMethod();

    public function startFactory()
    {
        $mfg = $this->factoryMethod();
        return $mfg;
    }
}

//文本工厂
class TextFactory extends Creator
{
    protected function FactoryMethod()
    {
        $product = new TextProduct();
        return ($product->getProperties());
    }
}

//图像工厂
class GraphicFactory extends Creator
{
    protected function FactoryMethod()
    {
        $product = new GraphicProduct();
        return ($product->getProperties());
    }
}

//产品接口
interface Product
{
    public function getProperties();
}

//文本
class TextProduct implements Product
{
    private $mfgProduct;

    public function getProperties()
    {
        $this->mfgProduct = 'This is text.';
        return $this->mfgProduct;
    }
}

//图像
class GraphicProduct implements Product
{
    private $mfgProduct;

    public function getProperties()
    {
        $this->mfgProduct = 'This is a graphic.<3';
        return $this->mfgProduct;
    }
}

class Client
{
    private $someGraphicObject;
    private $someTextObject;

    public function __construct()
    {
        $this->someGraphicObject = new GraphicFactory();
        echo $this->someGraphicObject->startFactory() . '<br />';
        $this->someTextObject = new TextFactory();
        echo $this->someTextObject->startFactory() . '<br />';

    }
}

$worker = new Client();
```