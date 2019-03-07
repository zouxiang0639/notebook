##原型设计模式

```php
abstract class CloneMe
{
    public $name;
    public $picture;

    abstract function __clone();
}

class person extends CloneMe
{

    public function __construct()
    {
        $this->picture = "cloneMan.png";
        $this->name = "Original";
    }

    public function display()
    {
        echo "<img title='{$this->picture}' src='{$this->picture}'> <br />";
        echo "<br /> {$this->name}";
    }

    public function __clone()
    {
    }
}

$worker = new person();
$worker->display();

$slacker = clone $worker;
$slacker->name = 'Cloned';
$slacker->display();
```

##为原型模式增加OOP

```php
abstract class IAcmePrototype
{
    protected $name;
    protected $id;
    protected $employeePic;
    protected $dept;

    //dept
    abstract function setDept($orgCode);
    abstract function getDept();

    //name
    public function setName($emName)
    {
        $this->name = $emName;
    }

    public function getName()
    {
        return $this->name;
    }

    //ID
    public function setId($emId)
    {
        $this->id = $emId;
    }

    public function getId()
    {
        return $this->id;
    }

    //Employee Picture
    public function setPic($ePic)
    {
        $this->employeePic = $ePic;
    }

    public function getPic()
    {
        return $this->employeePic;
    }

    abstract function __clone();
}

class Marketing extends IAcmePrototype
{

    const UNIT = "Marketing";
    private $sales = 'sales';
    private $promotion = 'promotion';
    private $strategic = 'strategic';

    public function setDept($orgCode)
    {
        switch($orgCode) {
            case 101:
                $this->dept = $this->sales;
                break;
            case 102:
                $this->dept = $this->promotion;
                break;
            case 103:
                $this->dept = $this->strategic;
                break;
            default:
                $this->dept = "Unrecognized Marketing";

        }
    }

    public function getDept()
    {
        return $this->dept;
    }

    public function __clone()
    {
    }
}


class Management extends IAcmePrototype
{

    const UNIT = "Management";
    private $research = 'research';
    private $plan = 'planning';
    private $operations = 'operations';

    public function setDept($orgCode)
    {
        switch($orgCode) {
            case 201:
                $this->dept = $this->research;
                break;
            case 202:
                $this->dept = $this->plan;
                break;
            case 203:
                $this->dept = $this->operations;
                break;
            default:
                $this->dept = "Unrecognized Management";

        }
    }

    public function getDept()
    {
        return $this->dept;
    }

    public function __clone()
    {
    }
}

class Engineering extends IAcmePrototype
{

    const UNIT = "Engineering";
    private $development = 'development';
    private $design = 'design';
    private $sysAd = 'sysAd';

    public function setDept($orgCode)
    {
        switch($orgCode) {
            case 301:
                $this->dept = $this->development;
                break;
            case 302:
                $this->dept = $this->design;
                break;
            case 303:
                $this->dept = $this->sysAd;
                break;
            default:
                $this->dept = "Unrecognized Engineering";

        }
    }

    public function getDept()
    {
        return $this->dept;
    }

    public function __clone()
    {
    }
}

class Client
{
    private $market;
    private $manage;
    private $engineer;

    public function __construct()
    {
        $this->makeConProto();

        $tess = clone $this->market;
        $this->setEmployee($tess, 'Tess Smith', 101, "ts101-1234", 'tess.png');
        $this->showEmployee($tess);

        $jacob = clone $this->market;
        $this->setEmployee($jacob, 'Jacob Jones', 102, "jj101-2234", 'jacob.png');
        $this->showEmployee($jacob);

        $ricky = clone $this->manage;
        $this->setEmployee($ricky, 'Ricky Rodriguez', 203, "rr203-5634", 'ricky.png');
        $this->showEmployee($ricky);

        $olivia = clone $this->engineer;
        $this->setEmployee($olivia, 'Olivia Perez', 302, "op301-1278", 'olivia.png');
        $this->showEmployee($olivia);

        $john = clone $this->engineer;
        $this->setEmployee($john, 'John Jackson', 301, "jj302-1454", 'john.png');
        $this->showEmployee($john);
    }

    private function makeConProto()
    {
        $this->market = new Marketing();
        $this->manage = new Management();
        $this->engineer = new Engineering();
    }

    private function showEmployee(IAcmePrototype $employeeNow)
    {
        $px = $employeeNow->getpic();
        echo "<img src='{$px}' width='150' href='150'> <br />";
        echo $employeeNow->getName() . "<br />";
        echo $employeeNow->getDept() . ":" . $employeeNow::UNIT . "<br />";
        echo $employeeNow->getId() . "<br />";
    }

    private function setEmployee(IAcmePrototype $employeeNow, $nm, $dp, $id, $px)
    {
        $employeeNow->setName($nm);
        $employeeNow->setDept($dp);
        $employeeNow->setId($id);
        $employeeNow->setPic($px);
    }

}

$worke = new Client();
```