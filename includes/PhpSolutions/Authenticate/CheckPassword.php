<?php
namespace PhpSolutions\Authenticate;

class CheckPassword {

    protected $password;
    protected $minimumChars;
    protected $mixedCase = false;
    protected $minimumNumbers = 0;
    protected $minimumSymbols = 0;
    protected $errors =array();

    public function __construct($password, $minimumChars = 6) {
        $this->password = $password;
        $this->minimumChars = $minimumChars;
    }

    public function requireMixedCase() {
        $this->mixedCase = true;
    }

    public function requireNumbers($num = 0) {
        if (is_numeric($num) && $num > 0) {
            $this->minimumNumbers = (int) $num;
        }
    }

    public function requireSymbols($num = 0) {
        if (is_numeric($num) && $num > 0) {
            $this->minimumSymbols = (int) $num;
        }
    }

    public function check() {
        if (preg_match('/\s/', $this->password)) {
            $this->errors[] = '密码中不要包含空格';
        }
        if (strlen($this->password) < $this->minimumChars) {
            $this->errors[] = "密码中至少包含
                $this->minimumChars 个字符";
        }
        if ($this->mixedCase) {
            $pattern = '/(?=.*[a-z])(?=.*[A-Z])/';
            if (!preg_match($pattern, $this->password)) {
                $this->errors[] = '密码中应该同时包含大小写字符';
            }
        }
        if ($this->minimumNumbers) {
            $pattern = '/\d/';
            $found = preg_match_all($pattern, $this->password, $matches);
            if ($found < $this->minimumNumbers) {
                $this->errors[] = "密码中至少包含
                    $this->minimumNumbers 个数字";
            }
        }
        if ($this->minimumSymbols) {
            $pattern = "/[-!$%^&*(){}<>[\]'" . '"|#@:;.,?+=_\/\~]/';
            $found = preg_match_all($pattern, $this->password, $matches);
            if ($found < $this->minimumSymbols) {
                $this->errors[] = "密码中至少包含
                    $this->minimumSymbols 个特殊符号";
            }
        }
        return $this->errors ? false : true;
    }

    public function getErrors() {
        return $this->errors;
    }

}
