<?php 
    /*
    TEMPLATE CLASS
    display views, alert, data
    */
class Template 
{
    private $data = [];
    private $alert_types;
    
    public function __construct()
    {
        $this->alert_types = ['success', 'warning', 'error'];        
    }

    public function load($url, $title = '')
    {
        if ($title != '') {
            $this -> setData('page title', '$title');
        }
        include($url);
    }
    
    public function redirectTo($url) 
    {
        header("Location: $url");
        exit();
    }
    
    public function setData($name, $value, $sanitize = false) 
    {
        $this->data[$name] = $sanitize ? htmlspecialchars($value, ENT_QUOTES, 'UTF-8') : $value;
    }

    public function getData($name, $echo = true) 
    {
        $value = $this->data[$name] ?? '';
        if ($echo) {
            echo $value;
        } else {
            return $value;
        }
    }
    
    public function setAlert($message, $type = 'success') 
    {
        if (in_array($type, $this->alert_types)) 
        {
            $_SESSION['alerts'][$type][] = $message;
        }
    }

    public function showAlerts() 
    {
        if (!empty($_SESSION['alerts'])) 
        {
            foreach ($this->alert_types as $type) 
            {
                if (!empty($_SESSION['alerts'][$type])) 
                {
                    foreach ($_SESSION['alerts'][$type] as $msg) 
                    {
                        echo "<div class='alert {$type}'>" . htmlspecialchars($msg, ENT_QUOTES, 'UTF-8') . "</div>";
                    }
                    unset($_SESSION['alerts'][$type]);
                }
            }
        }
    }
    
}
